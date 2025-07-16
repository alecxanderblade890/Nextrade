<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AddItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ItemDetailsController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
   Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('show.login');
    Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('show.register');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
});


Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('pages.home');
    Route::get('/show-add-item', [AddItemController::class, 'showAddItem'])->name('show.add.item');
    Route::get('/show-inbox', [InboxController::class, 'showInbox'])->name('show.inbox');
    Route::get('/show-item-details/{id}', [ItemDetailsController::class, 'index'])->name('show.item.details');
    Route::post('/add-item', [AddItemController::class, 'addItem'])->name('add.item');

});