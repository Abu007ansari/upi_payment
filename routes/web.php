<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return "Hello World";
});


Route::get('/payment', function () {
    return view('payment');
});