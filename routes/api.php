<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\PaymentController;

Route::apiResource('properties', PropertyController::class);
Route::apiResource('units', UnitController::class);
Route::apiResource('tenants', TenantController::class);
Route::apiResource('leases', LeaseController::class);
Route::apiResource('payments', PaymentController::class);