<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PartnerController;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EventController::class, 'index']);
    Route::resource('events', EventController::class);
});

Route::patch('update-cart', [TicketController::class, 'update']);
Route::delete('remove-from-cart', [TicketController::class, 'destroy']);

//prima pagina//
Route::get('/', [HomeController::class, 'index']);

//pagini ticket//
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

Route::resource('speakers', SpeakerController::class);
Route::get('/speakers/create', [SpeakerController::class, 'create'])->name('speakers.create');
Route::post('/speakers', [SpeakerController::class, 'store'])->name('speakers.store');

Route::resource('sponsors', SponsorController::class);
Route::get('/sponsors/create', [SponsorController::class, 'create'])->name('sponsors.create');
Route::post('/sponsors', [SponsorController::class, 'store'])->name('sponsors.store');

Route::resource('partners', PartnerController::class);
Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');
Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');
