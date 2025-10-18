<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FlightController as AdminFlightController;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
Route::get('/flights/{flight}', [FlightController::class, 'show'])->name('flights.show');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// User Routes (Authenticated)
Route::middleware(['auth'])->group(function () {
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::post('/flights/{flight}/apply', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    
    Route::get('/applications/{application}/documents', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('/applications/{application}/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    
    Route::get('/applications/{application}/payment', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/applications/{application}/payment', [PaymentController::class, 'store'])->name('payments.store');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Flights Management
    Route::resource('flights', AdminFlightController::class);
    Route::post('/flights/{flight}/toggle-status', [AdminFlightController::class, 'toggleStatus'])->name('flights.toggle-status');
    
    // Applications Management
    Route::get('/applications', [AdminApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{application}', [AdminApplicationController::class, 'show'])->name('applications.show');
    Route::post('/applications/{application}/shortlist', [AdminApplicationController::class, 'shortlist'])->name('applications.shortlist');
    Route::post('/applications/{application}/finalize', [AdminApplicationController::class, 'finalize'])->name('applications.finalize');
    Route::post('/flights/{flight}/publish-shortlist', [AdminApplicationController::class, 'publishShortlist'])->name('flights.publish-shortlist');
    Route::post('/flights/{flight}/publish-final', [AdminApplicationController::class, 'publishFinalList'])->name('flights.publish-final');
    Route::get('/flights/{flight}/export', [AdminApplicationController::class, 'export'])->name('flights.export');
    
    // Payments Management
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments/{payment}/approve', [AdminPaymentController::class, 'approve'])->name('payments.approve');
    Route::post('/payments/{payment}/reject', [AdminPaymentController::class, 'reject'])->name('payments.reject');
});