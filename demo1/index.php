<?php

$books = [
    [
        'name' => 'Do Androids Dream of Electric Sheep',
        'author' => 'Philip K. Dick',
        'releaseYear' => 1968,
        'purchaseUrl' => 'html://example.com' 
    ],
    [
        'name' => 'Project Hail Mary',
        'author' => 'Andy Weir',
        'releaseYear' => 2021,
        'purchaseUrl' => 'html://example.com' 
    ],
    [
        'name' => 'Rhe Martian',
        'author' => 'Andy Weir',
        'releaseYear' => 2011,
        'purchaseUrl' => 'html://example.com' 
    ]
];

$filteredBoocks = array_filter($books, function ($book) { 
    
    return $book['releaseYear'] >= 1950 && $book['releaseYear'] <= 2020;

});

require "index.view.php";