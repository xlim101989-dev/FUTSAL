<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\KaryawanController;

Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');

// Route CRUD Data Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// 1. Redirect halaman utama (/) ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Route Autentikasi (Login, Register, Logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// 3. Route Khusus Karyawan / Kelola Reservasi
Route::get('/karyawan/dashboard', [ReservasiController::class, 'index'])->name('karyawan.dashboard');
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');

// 4. Route CRUD Reservasi (Simpan, Edit, Update, Hapus)
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
Route::get('/reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
Route::put('/reservasi/{id}', [ReservasiController::class, 'update'])->name('reservasi.update');
Route::delete('/reservasi/{id}', [ReservasiController::class, 'destroy'])->name('reservasi.destroy');

// 5. Route Khusus Pelanggan (Halaman Booking)
Route::get('/pelanggan/booking', function () {
    return view('booking');
})->name('pelanggan.booking');

// 6. Route Pembuatan & Perbaikan Akun Pegawai / Pelanggan
Route::get('/fix-login', function () {
    // Buat atau update Akun Pegawai / Karyawan
    User::updateOrCreate(
        ['email' => 'karyawan@gmail.com'],
        [
            'name' => 'Pegawai Futsal',
            'password' => Hash::make('12345678'),
            'role' => 'karyawan'
        ]
    );

    // Buat atau update Akun Pelanggan
    User::updateOrCreate(
        ['email' => 'pelanggan@gmail.com'],
        [
            'name' => 'Pelanggan Futsal',
            'password' => Hash::make('12345678'),
            'role' => 'pelanggan'
        ]
    );

    return "Akun Pegawai (karyawan@gmail.com) dan Pelanggan berhasil dibuat!";
});