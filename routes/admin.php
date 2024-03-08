<?php

use Illuminate\Support\Facades\Route;
//routes for admin

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Organizer\EventController;

Route::middleware(['auth', 'verified', 'checkrole:admin'])->prefix('/admin')->group(function () {

    Route::resource('/', AdminDashboardController::class)->except(['show']);
    Route::resource('/categories', CategoriesController::class)->except(['show']);
    Route::resource('/users', UsersController::class)->except(['show']);
    Route::patch('/events/{event}', [EventController::class, 'accept'])->name('events.accept');
});
