<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello',function() {
     return view('hello');
});

Route::get('/contect',function() {
    return view('contect');
});

Route::get('/property',function() {
    return view('Property.index');
});