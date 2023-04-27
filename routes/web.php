<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DeviceGroupController;
use App\Http\Controllers\DeviceModelController;
use App\Http\Controllers\DeviceVendorController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# Location configuration routes
Route::middleware('auth')->group(function () {
    Route::get('/location', [LocationController::class, 'index'])->name('location.index');
    Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
    Route::post('/location', [LocationController::class, 'store'])->name('location.store');
    Route::get('/location/{location}', [LocationController::class, 'show'])->name('location.show');
    Route::get('/location/{location}/edit', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('/location/{location}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('/location/{location}', [LocationController::class, 'destroy'])->name('location.destroy');
});

# Tickets configuration routes
Route::middleware('auth')->group(function () {
    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/ticket/{ticket}', [TicketController::class, 'show'])->name('ticket.show');
    Route::get('/ticket/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
    Route::put('/ticket/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
    Route::delete('/ticket/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');
});

# Comments configuration routes
Route::middleware('auth')->group(function () {
    Route::post('/comment/{ticket}', [CommentController::class, 'store'])->name('comment.store');
});

# Devices configuration routes
Route::middleware('auth')->group(function () {
    # Index Page
    Route::get('/device', [DeviceController::class, 'index'])->name('device.index');
    Route::get('/device/group', [DeviceGroupController::class, 'index'])->name('device.group.index');
    Route::get('/device/vendor', [DeviceVendorController::class, 'index'])->name('device.vendor.index');
    Route::get('/device/model', [DeviceModelController::class, 'index'])->name('device.model.index');

    # Create Page
    Route::get('/device/create', [DeviceController::class, 'create'])->name('device.create');
    Route::get('/device/group/create', [DeviceGroupController::class, 'create'])->name('device.group.create');
    Route::get('/device/vendor/create', [DeviceVendorController::class, 'create'])->name('device.vendor.create');
    Route::get('/device/model/create', [DeviceModelController::class, 'create'])->name('device.model.create');

    # Store Page
    Route::post('/device', [DeviceController::class, 'store'])->name('device.store');
    Route::post('/device/group', [DeviceGroupController::class, 'store'])->name('device.group.store');
    Route::post('/device/vendor', [DeviceVendorController::class, 'store'])->name('device.vendor.store');
    Route::post('/device/model', [DeviceModelController::class, 'store'])->name('device.model.store');

    # Show Page
    Route::get('/device/{device}', [DeviceController::class, 'show'])->name('device.show');
    Route::get('/device/group/{group}', [DeviceGroupController::class, 'show'])->name('device.group.show');
    Route::get('/device/vendor/{vendor}', [DeviceVendorController::class, 'show'])->name('device.vendor.show');
    Route::get('/device/model/{model}', [DeviceModelController::class, 'show'])->name('device.model.show');
    
    # Edit Page
    Route::get('/device/{device}/edit', [DeviceController::class, 'edit'])->name('device.edit');
    Route::get('/device/group/{group}/edit', [DeviceGroupController::class, 'edit'])->name('device.group.edit');
    Route::get('/device/vendor/{vendor}/edit', [DeviceVendorController::class, 'edit'])->name('device.vendor.edit');
    Route::get('/device/model/{model}/edit', [DeviceModelController::class, 'edit'])->name('device.model.edit');

    # Update Page
    Route::put('/device/{device}', [DeviceController::class, 'update'])->name('device.update');
    Route::put('/device/group/{group}', [DeviceGroupController::class, 'update'])->name('device.group.update');
    Route::put('/device/vendor/{vendor}', [DeviceVendorController::class, 'update'])->name('device.vendor.update');
    Route::put('/device/model/{model}', [DeviceModelController::class, 'update'])->name('device.model.update');
    
    # Delete Page
    Route::delete('/device/{device}', [DeviceController::class, 'destroy'])->name('device.destroy');
    Route::delete('/device/group/{group}', [DeviceGroupController::class, 'destroy'])->name('device.group.destroy');
    Route::delete('/device/vendor/{vendor}', [DeviceVendorController::class, 'destroy'])->name('device.vendor.destroy');    
    Route::delete('/device/model/{model}', [DeviceModelController::class, 'destroy'])->name('device.model.destroy');
});

require __DIR__.'/auth.php';
