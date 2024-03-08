<?php

use App\Http\Controllers\Organizer\EventController;
use App\Http\Controllers\Organizer\OrganizerDashboardController;
use App\Http\Controllers\Organizer\ReservationController;
use App\Mail\ReservationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


//routes for  organizer
Route::middleware(['auth', 'verified', 'checkrole:organizer'])->prefix('/organizer')->group(function () {

    Route::resource('/', OrganizerDashboardController::class)->except(['show']);

    Route::resource('/events', EventController::class)->except(['show']);
    Route::resource('/reservations', ReservationController::class)->except(['show']);
    Route::patch('/reservationscon/{reservation}', [ReservationController::class, 'confirmed'])->name('reservations.confirmed');
    Route::patch('/reservations/{reservation}', [ReservationController::class, 'canceled'])->name('reservations.canceled');
});


Route::get('/email', function () {
    Mail::to('sisko4dev@gmail.com')->send(new ReservationMail('hols'));
    return 'send';
});
