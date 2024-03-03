<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
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





//routes for admin and oranied
Route::middleware(['auth', 'verified', 'checkrole:admin|organizer'])->prefix('/dashboard')->group(function () {

    Route::resource('/', DashboardController::class)->except(['show']);
    Route::resource('/categories', CategoriesController::class)->except(['show']);
});

//routes for users
Route::middleware(['auth', 'verified', 'checkrole:user'])->prefix('/user')->group(function () {

    Route::resource('/', DashboardController::class)->except(['show']);
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
