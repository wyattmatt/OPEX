<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AuthController;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('departments', DepartmentController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::post('/stock/search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/stock/scan/{barcode}', [ProductController::class, 'scan'])->name('products.scan');
    Route::view('/scanner', 'scanner.index')->name('scanner');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function() { return redirect()->route('auth.sign-in'); })->name('login');
    Route::get('/auth/sign-in', [AuthController::class, 'showLogin'])->name('auth.sign-in');
    Route::post('/auth/sign-in', [AuthController::class, 'login'])->name('auth.sign-in.post');
    Route::get('/auth/forgot-password', [AuthController::class, 'showForgotPassword'])->name('auth.forgot-password');
    Route::post('/auth/forgot-password', [AuthController::class, 'sendOtp'])->name('auth.forgot-password.post');
    Route::get('/auth/otp-verification', [AuthController::class, 'showOtpVerification'])->name('auth.otp-verification');
    Route::post('/auth/otp-verification', [AuthController::class, 'verifyOtp'])->name('auth.otp-verification.post');
    Route::get('/auth/reset-password', [AuthController::class, 'showResetPassword'])->name('auth.reset-password');
    Route::post('/auth/reset-password', [AuthController::class, 'resetPassword'])->name('auth.reset-password.post');
});

Route::get('/blank', function () { return view('blank'); })->name('blank');
Route::get('/errors/404', function () { return view('errors.404'); })->name('errors.404');
Route::get('/errors/maintenance', function () { return view('errors.maintenance'); })->name('errors.maintenance');
