<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tenant\DashboardController;
use App\Http\Controllers\Tenant\PropertyController;
use App\Http\Controllers\Tenant\LeaseController;
use App\Http\Controllers\Tenant\UnitController;
use App\Http\Controllers\Tenant\PaymentController;
use App\Http\Controllers\Tenant\MaintenanceController;
use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\ManagerPropertyController;
use App\Http\Controllers\Manager\ManagerTenantController;
use App\Http\Controllers\Manager\ManagerReportController;
use App\Http\Controllers\Manager\LeaseRequestController;
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
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', function () { return view('admin.users'); })->name('users');
    Route::get('/activity-logs', [App\Http\Controllers\Admin\ActivityLogController::class, 'index'])->name('activity-logs');
    Route::get('/settings', function () { return view('admin.settings'); })->name('settings');
});

// ========== MANAGER ROUTES ==========
Route::middleware(['auth'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/dashboard', [ManagerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/properties', [ManagerPropertyController::class, 'index'])->name('properties');
    Route::get('/tenants', [ManagerTenantController::class, 'index'])->name('tenants');
    Route::get('/reports', [ManagerReportController::class, 'index'])->name('reports');
    
    // Lease Request Routes
    Route::get('/requests', [LeaseRequestController::class, 'index'])->name('requests');
    Route::post('/requests/approve/{id}', [LeaseRequestController::class, 'approve'])->name('requests.approve');
    Route::post('/requests/reject/{id}', [LeaseRequestController::class, 'reject'])->name('requests.reject');
});

// ========== TENANT ROUTES ==========
Route::middleware(['auth'])->prefix('tenant')->name('tenant.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Unit routes
    Route::get('/my-unit', [UnitController::class, 'myUnit'])->name('my-unit');
    Route::get('/my-all-units', [UnitController::class, 'myUnits'])->name('my-all-units');
    Route::get('/available-units', [UnitController::class, 'available'])->name('available-units');
    
    // Lease routes
    Route::get('/my-lease', [LeaseController::class, 'show'])->name('my-lease');
    Route::get('/my-requests', [LeaseController::class, 'requests'])->name('my-requests');
    Route::post('/request-lease/{unit}', [LeaseController::class, 'request'])->name('request-lease');
    
    // Property routes
    Route::get('/properties', [PropertyController::class, 'index'])->name('properties');
    Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('property.show');
    
    // Payment routes
    Route::get('/my-payments', [PaymentController::class, 'index'])->name('my-payments');
    
    // Maintenance routes
    Route::get('/my-maintenance', [MaintenanceController::class, 'index'])->name('my-maintenance');
    Route::get('/maintenance/create', [MaintenanceController::class, 'create'])->name('maintenance.create');
    Route::post('/maintenance', [MaintenanceController::class, 'store'])->name('maintenance.store');
    
});

// ========== PROFILE ROUTE ==========
Route::middleware(['auth'])->get('/profile', function () { return view('profile'); })->name('profile');

require __DIR__.'/auth.php';