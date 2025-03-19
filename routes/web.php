<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;

// Home Page
Route::get('/', function () {
    return view('home');
});

// Event Routes
Route::resource('events', EventController::class);

// Ticket Routes
Route::resource('tickets', TicketController::class);

Route::get('/tickets/{ticket}/download', [TicketController::class, 'downloadTicket'])
    ->name('tickets.download');
