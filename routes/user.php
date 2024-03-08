<?php

use Illuminate\Support\Facades\Route;
//routes for users

use App\Http\Controllers\Organizer\ReservationController;
use App\Http\Controllers\User\UserController;

Route::middleware(['auth', 'verified', 'checkrole:user'])->prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/eventDetails', [ReservationController::class, 'store'])->name('user.booking');

    Route::post('/session/{event}', [ReservationController::class, 'session'])->name('user.session');
    Route::get('/checkout', function () {
        $reservationData = session('reservation_data');
        dd($reservationData);
        return 'n';
    })->name('checkout');

    //thi is when scan qrcode display details of tickets

    //thi is for generate pdf
    Route::get('ticket-pdf/{reservation}', [UserController::class, 'generatePdf'])->name('downloadTicket');
});
