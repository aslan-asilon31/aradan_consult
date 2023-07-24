<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function update(Request $request, User $user)
{
    $this->validate($request, [
        'phone'     => 'required',
        'address'   => 'required',
        'description'   => 'required'
    ]);

    //get data User by ID
    $user = User::findOrFail($user->id);


    $user->update([
        'phone'     => $request->phone,
        'address'   => $request->address,
        'description'   => $request->description,
    ]);

   
    if($user){
        //redirect dengan pesan sukses
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('blog.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}
}
