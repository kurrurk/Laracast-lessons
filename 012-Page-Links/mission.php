<?php

$books = [

    [
        'name' => "Project Hail Mary",
        'author' => "Andy Weir",
        'purchaseUrl' => "https://en.wikipedia.org/wiki/Project_Hail_Mary",
        'releaseYear' => 2021
    ],
    [
        'name' => "Artemis",
        'author' => "Andy Weir",
        'purchaseUrl' => "https://en.wikipedia.org/wiki/Artemis_(novel)",
        'releaseYear' => 2017
    ],
    [
        'name' => "Lord of Light",
        'author' => "Roger Zelazny",
        'purchaseUrl' => "https://en.wikipedia.org/wiki/Lord_of_Light",
        'releaseYear' => 1967
    ],
    [
        'name' => "Nine Princes in Amber",
        'author' => "Roger Zelazny",
        'purchaseUrl' => "https://de.wikipedia.org/wiki/Corwin_von_Amber",
        'releaseYear' => 1970
    ]

];

define("FILTER_AUTOR", "Roger Zelazny");
define("YEAR_BEFORE", 2020);
define("YEAR_AFTER", 1950);

function filter ($items, $fn) {
    $filteredItems = [];
    foreach ($items as $item) :
        if ($fn($item)) :
            $filteredItems[] = $item;
        endif;
    endforeach;
    return $filteredItems;
}

// array_filter ist eine Standard-PHP-Funktion, die dasselbe macht, als die obige funktion "filter"

$filteredBooks = array_filter($books, function ($item) {
    return $item['author'] === FILTER_AUTOR;
});

$filteredBooks2 = array_filter($books, function ($item) {
    return $item['releaseYear'] >= YEAR_AFTER && $item['releaseYear'] <= YEAR_BEFORE;
});

require "mission.view.php";