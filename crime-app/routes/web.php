<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::resource('reports', App\Http\Controllers\ReportController::class)->middleware('auth');
Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/create', [App\Http\Controllers\ReportController::class, 'create'])->name('reports.create');
Route::post('/reports', [App\Http\Controllers\ReportController::class, 'store'])->name('reports.store');
Route::get('/reports/{report}', [App\Http\Controllers\ReportController::class, 'show'])->name('reports.show');
Route::get('/reports/{report}/edit', [App\Http\Controllers\ReportController::class, 'edit'])->name('reports.edit');



Route::get('/gethelp', function () {
    return view('gethelp');
})->name('gethelp');

require __DIR__.'/auth.php';
