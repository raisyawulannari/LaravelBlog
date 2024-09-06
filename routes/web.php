<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\JobLocationController;


Route::get('/', function () {
    return view('welcome');
});

// Rute untuk Post
Route::resource('posts', PostController::class);

// Rute untuk Job
Route::resource('jobs', JobController::class);

// Rute untuk Location
Route::resource('locations', LocationController::class);

Route::resource('job_locations', JobLocationController::class);

