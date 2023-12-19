<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EventController::class, 'index']);
    Route::resource('events', EventController::class);
});

Route::patch('update-cart', [TicketController::class, 'update']);
Route::delete('remove-from-cart', [TicketController::class, 'destroy']);

Route::get('/', [TicketController::class, 'index']);
Route::get('cart', [TicketController::class, 'cart']);
Route::get('add-to-cart/{id}', [TicketController::class, 'addToCart']);
Route::patch('update-cart', [TicketController::class, 'update']);
Route::delete('remove-from-cart', [TicketController::class, 'destroy']);
Route::post('/checkout', [TicketController::class, 'checkout'])->name('checkout.process');
Route::get('/checkout', [TicketController::class, 'checkout'])->name('checkout');
Route::get('/success', [TicketController::class, 'success'])->name('checkout.success');



Route::get('/events/create', [TicketController::class, 'createTicket'])->name('events.create');

Route::get('/cart', [TicketController::class, 'cart'])->name('cart');

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::resource('contacts', ContactController::class);
