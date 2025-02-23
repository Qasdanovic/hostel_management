<?php

use App\Http\Controllers\CapaciteChambreController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarifChambreController;
use App\Http\Controllers\TypeChambreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('types', TypeChambreController::class);
    Route::resource("capacite", CapaciteChambreController::class);
    Route::resource("tarifs", TarifChambreController::class);
    Route::resource("chambres", ChambreController::class);
});



require __DIR__ . '/auth.php';
