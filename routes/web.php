<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

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


Route::resource('post', PostController::class);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('create', [AuthController::class, 'create'])->name('auth.create');
Route::post('auth-login', [AuthController::class, 'authLogin'])->name('auth.login');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');

Route::middleware(['auth'])->group(function () {
    // Rute yang perlu dilindungi
    Route::get('/', [Controller::class, 'index'])->name('index');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});



// Route::get('/login', [])