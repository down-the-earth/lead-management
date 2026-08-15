<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadNoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicLeadController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicLeadController::class, 'create'])->name('home');
Route::post('/lead-submit', [PublicLeadController::class, 'store'])->name('lead.submit');
Route::post('/leads/{lead}/notes',[LeadNoteController::class,'store'])->name('notes.store');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
        Route::resource('leads', LeadController::class);
});
require __DIR__.'/auth.php';
