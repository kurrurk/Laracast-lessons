<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast 1 - 007-Associative Arrays</title>
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

]

?>

<ul>
    <?php foreach ($books as $book) : ?>
        <?php if ( $book['author'] === "Roger Zelazny" ) : ?>
            <li>
                <a href="#">
                    <?= $book['name']." (". $book['releaseYear'] .")"; ?> - By <?= $book['author']; ?>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

</body>
</html>