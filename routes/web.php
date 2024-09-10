<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\JobLocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Route untuk halaman welcome (tampilan pertama kali saat mengakses '/')
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route untuk halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

// Route untuk halaman register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

// Route untuk forgot password
Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

// Route untuk validasi forgot password
Route::get('/validasi-forgot-password/{token}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [LoginController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk home (halaman setelah login)
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

// Rute untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Rute untuk User (CRUD)
Route::resource('users', UserController::class)->middleware('auth');

// Rute untuk Post
Route::resource('posts', PostController::class)->middleware('auth');

// Rute untuk Job
Route::resource('jobs', JobController::class)->middleware('auth');

// Rute untuk Location
Route::resource('locations', LocationController::class)->middleware('auth');

// Rute untuk JobLocation
Route::resource('job_locations', JobLocationController::class)->middleware('auth');
