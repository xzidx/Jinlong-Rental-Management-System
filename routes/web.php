<?php
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view('welcome');
});





Route::get('/property',function() {
    return view('Property.index');
});

Route::get('/lease', [LeaseController::class, 'index']);


// Route::get('/property', [PropertyController::class, 'index']);


Route::post('/property', [PropertyController::class, 'index']);
