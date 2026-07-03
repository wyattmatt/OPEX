<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::view('/blank', 'blank');
Route::view('/auth/sign-in', 'auth.sign-in');
Route::view('/auth/sign-up', 'auth.sign-up');
Route::view('/auth/forget-password', 'auth.forget-password');
Route::view('/auth/reset-password', 'auth.reset-password');
Route::view('/auth/otp-verification', 'auth.otp-verification');
Route::view('/errors/404', 'errors.404');
Route::view('/errors/maintenance', 'errors.maintenance');
