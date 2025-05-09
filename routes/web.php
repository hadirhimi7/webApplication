<?php

use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
require __DIR__.'/auth.php';

// Profile Routes (shared by all users)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --------------------
// CLIENT ROUTES
// --------------------
Route::middleware(['auth', 'verified'])->prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class, 'dashboard'])->name('dashboard');
    // In web.php (you already have this, but double-check)
    Route::get('/create-delivery', [ClientDashboardController::class, 'createDelivery'])->name('createDelivery');
    //Route::get('/create-delivery', [ClientDashboardController::class, 'createDelivery'])->name('createDelivery');
    //Route::get('/browse-drivers', [ClientDashboardController::class, 'browseDrivers'])->name('client.browseDrivers');
    Route::get('/browse-drivers/{delivery?}', [ClientDashboardController::class, 'browseDrivers'])->name('browseDrivers');

    Route::get('/my-deliveries', [ClientDashboardController::class, 'myDeliveries'])->name('myDeliveries');
    Route::post('/create-delivery', [ClientDashboardController::class, 'storeDelivery'])->name('storeDelivery');
    Route::get('/assign-driver/{delivery}', [ClientDashboardController::class, 'assignDriverForm'])->name('assignDriverForm');
    Route::post('/assign-driver/{delivery}', [ClientDashboardController::class, 'assignDriver'])->name('assignDriver');
    Route::post('/update-location', [ClientDashboardController::class, 'updateLocation'])->name('updateLocation');

}); // ✅ properly closed client group

// --------------------
// DRIVER ROUTES
// --------------------
Route::middleware(['auth', 'verified'])->prefix('driver')->name('driver.')->group(function () {
    Route::get('/dashboard', [DriverDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/active-deliveries', [DriverDashboardController::class, 'inProgressDeliveries'])->name('activeDeliveries');
    Route::get('/delivery-history', [DriverDashboardController::class, 'deliveryHistory'])->name('deliveryHistory');
    Route::get('/map', [DriverDashboardController::class, 'map'])->name('map');
    Route::get('/profile', [DriverDashboardController::class, 'profile'])->name('profile');
    Route::get('/performance', [DriverDashboardController::class, 'performance'])->name('performance');
    Route::get('/notifications', [DriverDashboardController::class, 'notifications'])->name('notifications');
    Route::get('/payments', [DriverDashboardController::class, 'payments'])->name('payments');
    Route::get('/support', [DriverDashboardController::class, 'support'])->name('support');
    Route::post('/update-pricing', [DriverDashboardController::class, 'updatePricing'])->name('updatePricing');
    Route::post('/change-pricing-model', [DriverDashboardController::class, 'changePricingModel'])->name('changePricingModel');
    Route::post('/update-vehicle', [DriverDashboardController::class, 'updateVehicle'])->name('updateVehicle');
    Route::get('/delivery/{delivery}', [DriverDashboardController::class, 'showDelivery'])->name('showDelivery');
    Route::patch('/delivery/{delivery}/status', [DriverDashboardController::class, 'updateDeliveryStatus'])->name('updateDeliveryStatus');
    Route::post('/update-location', [DriverDashboardController::class, 'updateLocation'])->name('updateLocation');


});
