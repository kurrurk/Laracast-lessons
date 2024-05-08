<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast - 006-Arrays</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: sans-serif;
    }
</style>

<body>

<?php

 $books = [  "Project Hail Mary", "Artemis", "Lord of Light", "Nine Princes in Amber" ]

?>

<h1>Vorgeschlagene Bücher:</h1>

<ul>
    <?php foreach ($books as $book) : ?>
            <li> <?= "{$book}."; ?> </li>
    <?php endforeach; ?>
</ul>

</body>
</html>