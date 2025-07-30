<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AddItemController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemDetailsController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

// Authentication Routes (for guests only)
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('show.login');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
    
    // Registration Routes
    Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('show.register');
    Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
});

// Logout Route (must be outside guest middleware)
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', [App\Http\Controllers\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class, 'verify'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('/email/resend', [App\Http\Controllers\VerificationController::class, 'resend'])
        ->middleware('throttle:6,1')
        ->name('verification.resend');
});

// Authenticated and Verified Routes
Route::middleware(['auth', 'verified', 'cache.nocache'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('pages.home');
    Route::get('/show-add-item', [AddItemController::class, 'showAddItem'])->name('show.add.item');
    Route::get('/show-item-details/{id}', [ItemDetailsController::class, 'index'])->name('show.item.details');
    Route::post('/add-item', [AddItemController::class, 'addItem'])->name('add.item');
    Route::post('/send-message/{email}', [EmailController::class, 'sendMessage'])->name('send.message');
    Route::get('/show-my-items', [ItemDetailsController::class, 'showMyItems'])->name('show.my.items');
    Route::delete('/delete-item/{id}', [ItemDetailsController::class, 'deleteItem'])->name('delete.item');
    Route::put('/edit-item/{id}', [ItemDetailsController::class, 'editItem'])->name('edit.item');
});