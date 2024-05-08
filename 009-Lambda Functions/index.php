<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast - 009-Lambda Functions</title>
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

?>

<h3>Vorgeschlagene Bücher von <em><?= FILTER_AUTOR; ?></em>:</h3>

<ul>
    <?php foreach ($filteredBooks as $book) : ?>
        <li>
            <a href="<?= $book['purchaseUrl']; ?>" target="_blank">
                <?= $book['name']." (". $book['releaseYear'] .") - ". $book['author']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<hr>

<h3>Empfohlene Bücher zwischen <em><?= YEAR_AFTER; ?></em> und <em><?= YEAR_BEFORE; ?></em>:</h3>

<ul>
    <?php foreach ($filteredBooks2 as $book) : ?>
        <li>
            <a href="<?= $book['purchaseUrl']; ?>" target="_blank">
                <?= $book['name']." (". $book['releaseYear'] .") - ". $book['author']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>

