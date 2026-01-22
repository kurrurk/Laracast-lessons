<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'greeting' => 'Hello',
        'person' => request('person', 'World'),
        'tasks' => [
            'Go to the market',
            'Walk the dog',
            'Watch a video tutorial'
        ]
    ]);
});

// Route::view('/', 'welcome', [
//     'greeting' => 'Hello',
//     'person' => request('person', 'World')
// ]);

Route::view('/about', 'about');

Route::view('/contact', 'contact');
