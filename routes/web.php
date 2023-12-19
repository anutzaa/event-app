<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PartnerController;

Auth::routes();

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/', [EventController::class, 'index']);
    Route::resource('events', EventController::class);

    // Other routes go here
    Route::patch('update-cart', [TicketController::class, 'update']);
    Route::delete('remove-from-cart', [TicketController::class, 'destroy']);
    // ...

    Route::get('/cart', [TicketController::class, 'cart'])->name('cart');

    Route::post('/checkout', [TicketController::class, 'checkout'])->name('checkout');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::resource('contact', ContactController::class);
});

// Unauthenticated routes
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
});
