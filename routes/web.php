<?php

use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
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

// CLIENT ROUTES
Route::prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/create-delivery', [ClientDashboardController::class, 'createDelivery'])->name('createDelivery');
    Route::get('/browse-drivers/{delivery?}', [ClientDashboardController::class, 'browseDrivers'])->name('browseDrivers');
    Route::get('/my-deliveries', [ClientDashboardController::class, 'myDeliveries'])->name('myDeliveries');
    Route::post('/create-delivery', [ClientDashboardController::class, 'storeDelivery'])->name('storeDelivery');
    Route::get('/assign-driver/{delivery}', [ClientDashboardController::class, 'assignDriverForm'])->name('assignDriverForm');
    Route::post('/assign-driver/{delivery}', [ClientDashboardController::class, 'assignDriver'])->name('assignDriver');
    Route::post('/update-location', [ClientDashboardController::class, 'updateLocation'])->name('updateLocation');
});

// DRIVER ROUTES
Route::prefix('driver')->name('driver.')->group(function () {
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

// ADMIN ROUTES 
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/manage-drivers', [AdminDashboardController::class, 'manageDrivers'])->name('manageDrivers');
    Route::post('/update-driver-status/{driver}/{status}', [AdminDashboardController::class, 'updateDriverStatus'])->name('updateDriverStatus');
    Route::get('/deliveries', [AdminDashboardController::class, 'deliveries'])->name('deliveries');
    Route::get('/deliveries/{id}', [AdminDashboardController::class, 'viewDelivery'])->name('viewDelivery');
});
