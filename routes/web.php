<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;

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
