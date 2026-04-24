<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\MaintenanceReportController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\OccupancyReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RevenueReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index'); 
});

Route::get('/activity', [ActivityLogController::class, 'index']);
Route::get('/lease', [LeaseController::class, 'index']);
Route::get('/maintenance_report', [MaintenanceReportController::class, 'index']);
Route::get('/maintenance', [MaintenanceController::class, 'index']);
Route::get('/my_profile', [MyProfileController::class, 'index']);
Route::get('/occupancy_report', [OccupancyReportController::class, 'index']);
Route::get('/payment', [PaymentController::class, 'index']);
Route::get('/property', [PropertyController::class, 'index']);
Route::get('/rent', [RentController::class, 'index']);
Route::get('/revenue_report', [RevenueReportController::class, 'index']);
Route::get('/setting', [SettingController::class, 'index']);
Route::get('/tenant', [TenantController::class, 'index']);
Route::get('/unit', [UnitController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user_management', [UserManagementController::class, 'index']);




















Route::post('/rent', [RentController::class, 'store'])->name('rent.store');