<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PartnerController;


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'admin'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/events', [EventController::class, 'index']);
    Route::resource('events', EventController::class);

    Route::get('/speakers', [SpeakerController::class, 'index']);
    Route::resource('speakers', SpeakerController::class);

    Route::get('/contacts', [ContactController::class, 'index']);
    Route::resource('contacts', ContactController::class);

    Route::get('/contacts', [ContactController::class, 'index']);
    Route::resource('contacts', ContactController::class);

    Route::get('/partners', [PartnerController::class, 'index']);
    Route::resource('partners', PartnerController::class);

    Route::get('/sponsors', [SponsorController::class, 'index']);
    Route::resource('sponsors', SponsorController::class);

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('cart', [TicketController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [TicketController::class, 'addToCart']);
    Route::patch('update-cart', [TicketController::class, 'update']);
    Route::delete('remove-from-cart', [TicketController::class, 'destroy']);
    Route::post('/checkout', [TicketController::class, 'checkout'])->name('checkout.process');
    Route::get('/checkout', [TicketController::class, 'checkout'])->name('checkout');
    Route::get('/success', [TicketController::class, 'success'])->name('checkout.success');
});

