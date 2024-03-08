<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Organizer\EventController;
use App\Http\Controllers\Organizer\OrganizerDashboardController;
use App\Http\Controllers\Organizer\ReservationController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Mail\ReservationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});











Route::get('ticketPreview/{reservation}', [UserController::class, 'ticketPreview'])->name('ticketPreview');


// Routes for guests
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/eventDetails/{event}', [HomeController::class, 'eventDetails'])->name('home.eventDetails');

    Route::middleware('guest')->group(function () {
        Route::get('registerUser', [HomeController::class, 'registerUser']);
    });
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//this route for not authrized users
Route::get('not_authorized', fn () => view('not_authorized'))->name('not_authorized');

Route::fallback(fn () => 'error  4040');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/organizer.php';
require __DIR__ . '/user.php';
