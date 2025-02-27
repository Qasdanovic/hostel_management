<?php

use App\Http\Controllers\CapaciteChambreController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TarifChambreController;
use App\Http\Controllers\TypeChambreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard',DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function (): void {
    Route::resource('types', TypeChambreController::class);
    Route::resource("capacite", CapaciteChambreController::class);
    Route::resource("tarifs", TarifChambreController::class);
    Route::resource("chambres", ChambreController::class);
    Route::resource("reservations", ReservationController::class);
    Route::resource("clients", ClientController::class);
});



require __DIR__ . '/auth.php';
