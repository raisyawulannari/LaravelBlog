<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Rute utama mengarahkan ke welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});

// Rute resource untuk PostController
Route::resource('posts', PostController::class);
