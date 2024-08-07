<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route Report
Route::post('/submit-report', [ReportController::class, 'submitReport'])->name('submit.report');
// Registration report
Route::get('/daftar', [ReportRegistrationController::class, 'showRegistrationForm'])->name('report.form');
Route::post('/daftar', [ReportRegistrationController::class, 'register'])->name('report');

 // Route Admin Report
 Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
 Route::get('/admin/report/{id}', [AdminController::class, 'show'])->name('report.show');
 Route::delete('/admin/report/{id}', [AdminController::class, 'destroy'])->name('report.destroy');