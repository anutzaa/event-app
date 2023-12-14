<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth::routes();

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EventController::class, 'index']);
    Route::resource('events', EventController::class);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::patch('update-cart', [TicketController::class, 'update']);
Route::delete('remove-from-cart', [TicketController::class, 'remove']);

Route::get('/', [TicketController::class, 'index']);
Route::get('cart', [TicketController::class, 'cart']);
Route::get('add-to-cart/{id}', [TicketController::class, 'addToCart']);
Route::patch('update-cart', [TicketController::class, 'update']);
Route::delete('remove-from-cart', [TicketController::class, 'destroy']);
