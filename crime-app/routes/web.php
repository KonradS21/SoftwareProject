<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Models\Report;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    $reports = Report::all();

    return view('dashboard', compact('reports'));
 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/create', [ReportController::class, 'create'])->name('create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
Route::middleware('auth')->group(function() {
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
});
Route::get('/reports/{report}', [ReportController::class, 'show'])->name('reports.show');
Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');
Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
Route::get('/gethelp', function () {
    return view('gethelp');
})->name('gethelp');

require __DIR__.'/auth.php';
