<?php

use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PenggunaController;
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
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('Admin.dashboard');
    });

    Route::resource('/dokumen', DokumenController::class);
    Route::get('/aktif', [DokumenController::class, 'documentActiv']);
    Route::get('/arsip', [DokumenController::class, 'documentArsip']);
    Route::get('/create', [DokumenController::class, 'create']);
    Route::get('/dokumen/{id}/versi', [DokumenController::class, 'version']);
    Route::put('/dokumen/{id}/revisi-dokumen', [DokumenController::class, 'revisiDokumen']);
    Route::put('/dokumen/{id}/update-status', [DokumenController::class, 'updateStatus']);

    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/tambah-kategori', [KategoriController::class, 'create']);
    Route::post('/tambah-kategori', [KategoriController::class, 'store']);

    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::get('/hak-akses', [PenggunaController::class, 'hakAkses']);
    Route::post('/hak-akses', [PenggunaController::class, 'hakStore']);

});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', function () {
        return view('User.home');
    });
});
