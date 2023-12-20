<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\StripeController;


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


Route::middleware(['auth'])->group(function () {
    Route::get('/view/{id}', [HomeController::class, 'view'])->name('view');

    Route::resource('tickets', TicketController::class);
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');

    //stripe
    Route::any('/session', [StripeController::class, 'session'])->name('session');
    Route::get('/success', [StripeController::class, 'success'])->name('success');
    Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');

    //cos
    Route::get('/ticket', [TicketController::class, 'index']);
    Route::get('cart', [TicketController::class, 'cart']);
    Route::get('add-to-cart/{id}', [TicketController::class, 'addToCart']);
    Route::patch('update-cart', [TicketController::class, 'update']);
    Route::delete('remove-from-cart', [TicketController::class, 'remove']);
});

