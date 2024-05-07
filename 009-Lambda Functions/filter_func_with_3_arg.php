<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast 1 - 009-Lambda Functions</title>
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

$filterAuthor = "Roger Zelazny";

function filter ($items, $key, $value) {
    $filteredItems = [];
    foreach ($items as $item) :
        if ($item[$key] === $value) :
            $filteredItems[] = $item;
        endif;
    endforeach;
    return $filteredItems;
}

$filteredBooks = filter($books, 'author', $filterAuthor);

?>

<h3>Vorgeschlagene Bücher von <em><?= $filterAuthor; ?></em>:</h3>

<ul>
    <?php foreach ($filteredBooks as $book) : ?>
        <li>
            <a href="<?= $book['purchaseUrl']; ?>" target="_blank">
                <?= $book['name']." (". $book['releaseYear'] .")"?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>

