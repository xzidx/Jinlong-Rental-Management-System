<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index'); 
});

Route::get('/rent', [RentController::class, 'index']);


Route::post('/rent', [RentController::class, 'store'])->name('rent.store');