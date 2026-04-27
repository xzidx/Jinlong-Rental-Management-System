<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tenant\DashboardController;  // ← ADD THIS!
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

// ========== ADMIN ROUTES ==========
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', function () { return view('admin.users'); })->name('admin.users');
    Route::get('/activity-logs', [App\Http\Controllers\Admin\ActivityLogController::class, 'index'])->name('admin.activity-logs');
    Route::get('/settings', function () { return view('admin.settings'); })->name('admin.settings');
});

// ========== MANAGER ROUTES ==========
Route::middleware(['auth'])->prefix('manager')->group(function () {
    Route::get('/dashboard', function () { return view('manager.dashboard'); })->name('manager.dashboard');
    Route::get('/properties', function () { return view('manager.properties'); })->name('manager.properties');
    Route::get('/tenants', function () { return view('manager.tenants'); })->name('manager.tenants');
    Route::get('/reports', function () { return view('manager.reports'); })->name('manager.reports');
});

// ========== TENANT ROUTES ==========
Route::middleware(['auth'])->prefix('tenant')->group(function () {
    Route::get('/dashboard', function () { return view('tenant.dashboard'); })->name('tenant.dashboard');
    Route::get('/my-unit', function () { return view('tenant.my-unit'); })->name('tenant.my-unit');
    Route::get('/my-lease', function () { return view('tenant.my-lease'); })->name('tenant.my-lease');
    Route::get('/my-payments', function () { return view('tenant.my-payments'); })->name('tenant.my-payments');
    Route::get('/my-maintenance', function () { return view('tenant.my-maintenance'); })->name('tenant.my-maintenance');
    Route::get('/properties', [App\Http\Controllers\Tenant\PropertyController::class, 'index'])->name('tenant.properties');
    Route::get('/properties/{id}', [App\Http\Controllers\Tenant\PropertyController::class, 'show'])->name('tenant.property.show');
    Route::get('/my-lease', [App\Http\Controllers\Tenant\LeaseController::class, 'show'])->name('tenant.my-lease');
    Route::post('/request-lease/{unit}', [App\Http\Controllers\Tenant\LeaseController::class, 'request'])->name('tenant.request-lease');
    Route::post('/request-lease/{unit}', [App\Http\Controllers\Tenant\LeaseController::class, 'request'])->name('tenant.request-lease');
});

// ========== PROFILE ROUTE ==========
Route::middleware(['auth'])->get('/profile', function () { return view('profile'); })->name('profile');

require __DIR__.'/auth.php';

