<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChirpController;

Route::get('/', [ChirpController::class, 'index']);

// Route::post('/chirps', [ChirpController::class, 'store']);



Route::middleware('auth')->group(function () {
    // هذا السطر يختصر ويعوض عن الأربعة أسطر السابقة بالكامل!
    Route::resource('chirps', ChirpController::class)->only(['store', 'edit', 'update', 'destroy']);
});

// registration routes

Route::view(
    '/register',
    'auth.register'
)->middleware('guest')->name('register');

Route::post('/register', Register::class)->middleware('guest');


// login routes
Route::view('/login', 'auth.login')->middleware('guest')->name('login');

Route::post('login', Login::class)->middleware('guest');

//Logout route
Route::post('/logout', Logout::class)->middleware('auth')->name('logout');
