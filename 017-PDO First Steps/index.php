<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast - 017 PDO First Steps</title>
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
        text-align: center;
    }
    ul {
        line-height: 1.5em;
        padding: 0;
    }
</style>

<body>

<h1>PDO First Steps:</h1>

<?php

require "functions.php";

const QUERY1 = "select * from posts";
const QUERY2 = "select * from posts where id = 1"; // für Hausaufgabe

// Connect to the database, and execute a query.

$dsn="mysql:host=127.0.0.1;port=3306;dbname=myapp;user=kurrurk;password=L@rAca$7_sql;charset=utf8mb4";

$pdo = new PDO($dsn);

$statement = $pdo->prepare(QUERY1);

$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC); // FETCH_ASSOC -> Gib mir das Ergebnis als assoziatives Array


echo '<h2>'.QUERY1.' :</h2>';

echo '<ul>';
foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}
echo '</ul>';


// Hausaufgabe


$statement = $pdo->prepare(QUERY2);

$statement->execute();

$post2 = $statement->fetch(PDO::FETCH_ASSOC);



echo '<h2>'.QUERY2.' :</h2>';

echo '<ul>';
    echo "<li>" . $post2['title'] . "</li>";
echo '</ul>';

?>

</body>
</html>