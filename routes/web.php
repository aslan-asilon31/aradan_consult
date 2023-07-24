<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

/**
 * socialite auth
 */
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

// Route::resource('users', UserController::class);
// Route::resource('users', RegisterController::class);

// Route::post('/update_user', [RegisterController::class, 'update'])->name('update_user');

Route::post('/phone-form', [App\Http\Controllers\HomeController::class, 'storeOrUpdatePhone'])->name('store-or-update-phone');
Route::get('/users/datatables', [App\Http\Controllers\HomeController::class, 'getUsersData'])->name('users.datatables');

Route::get('/generate-pdf', [App\Http\Controllers\HomeController::class, 'generatePdf'])->name('generate-pdf');

