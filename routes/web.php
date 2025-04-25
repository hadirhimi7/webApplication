<?php

use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. 
| These routes are loaded by the RouteServiceProvider.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes (Login, Register, Forgot Password, etc.)
require __DIR__.'/auth.php';

// Profile Management - only needs auth
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CLIENT DASHBOARD ROUTES
Route::middleware(['auth', 'verified'])->prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/create-delivery', [ClientDashboardController::class, 'createDelivery'])->name('createDelivery');
    Route::get('/browse-drivers', [ClientDashboardController::class, 'browseDrivers'])->name('browseDrivers');
    Route::get('/my-deliveries', [ClientDashboardController::class, 'myDeliveries'])->name('myDeliveries');
    Route::post('/create-delivery', [ClientDashboardController::class, 'storeDelivery'])->name('storeDelivery');
});

// IMPORTANT: Fallback for Breeze's hardcoded /dashboard route
Route::get('/dashboard', function () {
    return redirect()->route('client.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/driver', function () {
    return view('driver.dashboard');
});
