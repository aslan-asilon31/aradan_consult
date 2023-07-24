<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTicket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Dompdf\Dompdf;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUsersData(Request $request)
    {
        $users = User::with('userTickets')->get();

        return DataTables::of($users)
            ->addColumn('ticket', function ($user) {
                $tickets = $user->userTickets->pluck('ticket')->implode('<br>');
                return $tickets;
            })
            ->addColumn('queue_number', function ($user) {
                $queueNumbers = $user->userTickets->pluck('queue_number')->implode('<br>');
                return $queueNumbers;
            })
            ->rawColumns(['ticket', 'queue_number'])
            ->make(true);
    }

    public function index()
    {
        // $users = User::whereNotIn('role', ['admin', 'superadmin'])->get();
        $users = User::all();
        return view('home', compact('users'));
    }

    public function updateUser(Request $request)
    {
        $userId = // Replace this with the actual user ID you want to update;
        $user = User::findOrFail($userId);

        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->description = $request->input('description');

        $user->save();

        return response()->json($user);
    }

    public function storeOrUpdatePhone(Request $request)
    {
        $user = auth()->user();
    
        if ($user) {
            $phone = $request->input('phone');
            $description = $request->input('description'); // Add this line to get the description from the form
    
            // Check if the phone number already exists for other users
            $existingUser = User::where('phone', $phone)->where('id', '!=', $user->id)->first();
    
            if ($existingUser) {
                return redirect()->route('home')->with('message', 'Phone number already exists for another user.');
            }
    
            // Update or insert the phone number and description
            $user->phone = $phone;
            $user->description = $description; // Add this line to update the description
            $user->save();

            // Generate 16 digit angka dan huruf acak untuk tiket
            $ticket = Str::random(16);

            // Generate queue_number dengan format tahun-bulan-tanggal-jam
            $queueNumber = date('YmdHis');

            // Buat UserTicket untuk pengguna yang baru saja terdaftar
            $userTicket = new UserTicket([
                'ticket' => $queueNumber.'-'.$ticket,
                'queue_number' => $user->id,
            ]);

            // Simpan UserTicket ke database dengan mengaitkannya dengan pengguna yang baru dibuat
            $user->userTickets()->save($userTicket);
    
        }
    
        return redirect()->route('home')->with('message', 'User data not found.');
    }

    public function generatePdf()
    {
       
        $data = PDF::loadview('pdf_ticket', ['data' => 'ini adalah contoh laporan PDF']);
        //mendownload laporan.pdf
    	return $data->download('ticket.pdf');
    }
}
