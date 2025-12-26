<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (! Auth::check()) {
        return redirect('/login');
    }

    if (Auth::user()->role === 'admin') {
        return redirect('/admin');
    }

    return redirect('/user/home');
});

// register route
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

// login route
Route::get('/login', function () {
    return view('Auth.Login');
});
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('Admin.dashboard');
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/home', function () {
        return view('User.home');
    });
});
