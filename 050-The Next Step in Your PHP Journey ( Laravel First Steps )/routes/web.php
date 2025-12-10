<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\HomeController::class);

Route::get('/json_test', function () {
    return ['message' => 'json test.' ];
});

Route::get('/string_test', function () {
    return 'String test.';
});

Route::get('/welcome', function () {
    return view('pages.welcome');
});

