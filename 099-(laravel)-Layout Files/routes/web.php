<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'welcome');

Route::view('/about', 'about');

Route::view('/contact', 'contact');
