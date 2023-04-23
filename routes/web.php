<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DeviceTypeController;
use App\Http\Controllers\RouterboardController;
use App\Http\Controllers\IpFirewallAddressListController;

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

# Device type configuration routes
Route::middleware('auth')->group(function () {
    Route::get('/devicetype', [DeviceTypeController::class, 'index'])->name('devicetype.index');
    Route::get('/devicetype/create', [DeviceTypeController::class, 'create'])->name('devicetype.create');
    Route::post('/devicetype', [DeviceTypeController::class, 'store'])->name('devicetype.store');
    Route::get('/devicetype/{location}', [DeviceTypeController::class, 'show'])->name('devicetype.show');
    Route::get('/devicetype/{location}/edit', [DeviceTypeController::class, 'edit'])->name('devicetype.edit');
    Route::put('/devicetype/{location}', [DeviceTypeController::class, 'update'])->name('devicetype.update');
    Route::delete('/devicetype/{location}', [DeviceTypeController::class, 'destroy'])->name('devicetype.destroy');
});

# Automations configuration routes
Route::middleware('auth')->group(function () {
    Route::get('/automation', [AutomationController::class, 'index'])->name('automation.index');
    Route::get('/automation/create', [AutomationController::class, 'create'])->name('automation.create');
    Route::post('/automation', [AutomationController::class, 'store'])->name('automation.store');
    Route::get('/automation/{automation:id}', [AutomationController::class, 'show'])->name('automation.show');
    Route::get('/automation/{automation:id}/edit', [AutomationController::class, 'edit'])->name('automation.edit');
    Route::put('/automation/{automation:id}', [AutomationController::class, 'update'])->name('automation.update');
    Route::delete('/automation/{automation:id}', [AutomationController::class, 'destroy'])->name('automation.destroy');
});

# Routerboard configuration routes
Route::middleware('auth')->group(function () {
    Route::get('/routerboard', [RouterboardController::class, 'index'])->name('routerboard.index');
    Route::post('/routerboard', [RouterboardController::class, 'store'])->name('routerboard.store');
    Route::get('/routerboard/create', [RouterboardController::class, 'create'])->name('routerboard.create');
    Route::get('/routerboard/{routerboard:id}', [RouterboardController::class, 'show'])->name('routerboard.show');
});

# Routerboard local configuration routes - ip/firewall/address-list
Route::middleware('auth')->group(function () {
    Route::get('/routerboard/ip/firewall/address-list/{routerboard:id}', [IpFirewallAddressListController::class, 'create'])->name('routerboard.ip.firewall.address-list.create');
    Route::post('/routerboard/ip/firewall/address-list/{routerboard:id}', [IpFirewallAddressListController::class, 'store'])->name('routerboard.ip.firewall.address-list.store');
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

require __DIR__.'/auth.php';
