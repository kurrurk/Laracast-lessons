<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast - 008-Functions and Filters</title>
</head>

<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
        margin: 0;
        font-family: sans-serif;
        padding: 10px;
        box-sizing: border-box;
    }
    hr {
        width: 100%;
    }
    em {
        font-weight: 200;
    }
</style>

<body>
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

$films = [

    [
        'name' => "Dungeons & Dragons: Honor Among Thieves",
        'releaseYear' => 2023,
        'purchaseUrl' => "https://de.wikipedia.org/wiki/Dungeons_%26_Dragons:_Ehre_unter_Dieben",
    ],
    [
        'name' => "Labyrinth",
        'releaseYear' => 1986,
        'purchaseUrl' => "https://de.wikipedia.org/wiki/Die_Reise_ins_Labyrinth",
    ],
    [
        'name' => "Teenage Mutant Ninja Turtles",
        'releaseYear' => 1990,
        'purchaseUrl' => "https://de.wikipedia.org/wiki/Turtles_(Film)",
    ],
    [
        'name' => "The Lord of the Rings: The Fellowship of the Ring",
        'releaseYear' => 2001,
        'purchaseUrl' => "https://en.wikipedia.org/wiki/The_Lord_of_the_Rings:_The_Fellowship_of_the_Ring",
    ]

];

$filterAuthor = "Roger Zelazny";

function filterByAuthor ($books, $author) {
    $filteredBooks = [];
    foreach ($books as $book) :
        if ($book['author'] === $author) :
            $filteredBooks[] = $book;
        endif;
    endforeach;
    return $filteredBooks;
}

$filterReleaseYear = 2000;

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

<h3>Vorgeschlagene Bücher von <em><?= $filterAuthor; ?></em>:</h3>

<ul>
    <?php foreach (filterByAuthor($books, $filterAuthor) as $book) : ?>
        <li>
            <a href="<?= $book['purchaseUrl']; ?>" target="_blank">
                <?= $book['name']." (". $book['releaseYear'] .")"?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<hr>
<br>

<h3>Vorgeschlagene Bücher in Jahr <em><?= $filterReleaseYear; ?></em>:</h3>

<ul>
    <?php foreach (filterByReleaseYear($films, $filterReleaseYear) as $film) : ?>
        <li>
            <a href="<?= $film['purchaseUrl']; ?>" target="_blank">
                <?= $film['name']." (". $film['releaseYear'] .")"?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>

