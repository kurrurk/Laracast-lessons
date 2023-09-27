<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast 1 - 008-Functions and Filters</title>
</head>
<body>
<?php

$books = [

    [
        'name' => "Project Hail Mary",
        'author' => "Andy Weir",
        'purchaseUrl' => "https://google.com",
        'releaseYear' => 2021
    ],
    [
        'name' => "Artemis",
        'author' => "Andy Weir",
        'purchaseUrl' => "https://google.com",
        'releaseYear' => 2017
    ],
    [
        'name' => "Lord of Light",
        'author' => "Roger Zelazny",
        'purchaseUrl' => "https://google.com",
        'releaseYear' => 1967
    ],
    [
        'name' => "Nine Princes in Amber",
        'author' => "Roger Zelazny",
        'purchaseUrl' => "https://google.com",
        'releaseYear' => 1970
    ]

];

$films = [

    [
        'name' => "Dungeons & Dragons: Honor Among Thieves",
        'releaseYear' => 2023
    ],
    [
        'name' => "Labyrinth",
        'releaseYear' => 1986
    ],
    [
        'name' => "Teenage Mutant Ninja Turtles",
        'releaseYear' => 1990
    ],
    [
        'name' => "The Lord of the Rings: The Fellowship of the Ring",
        'releaseYear' => 2001
    ]

];

function filterByAuthor ($books, $author) {
    $filteredBooks = [];
    foreach ($books as $book) :
        if ($book['author'] === $author) :
            $filteredBooks[] = $book;
        endif;
    endforeach;
    return $filteredBooks;
}

function filterByReleaseYear ($films, int $releaseYear = 2000) {
    $filteredFilms = [];
    foreach ($films as $film) :
        if ($film['releaseYear'] >= $releaseYear) :
            $filteredFilms[] = $film;
        endif;
    endforeach;
    return $filteredFilms;
}

?>

<h3>Books</h3>

<ul>
    <?php foreach (filterByAuthor($books, "Roger Zelazny") as $book) : ?>
        <li>
            <a href="#">
                <?= $book['name']." (". $book['releaseYear'] .")"?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<hr>
<br>

<h3>Films</h3>

<ul>
    <?php foreach (filterByReleaseYear($films) as $film) : ?>
        <li>
            <a href="#">
                <?= $film['name']." (". $film['releaseYear'] .")"?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>

