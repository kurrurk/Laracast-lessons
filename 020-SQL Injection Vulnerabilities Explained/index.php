<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast - 020-SQL Injection Vulnerabilities Explained</title>
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
    ul {
        line-height: 1.5em;
        padding: 0;
    }
</style>

<body>

<h1>Extract a PHP Database Class:</h1>
<?php

require "functions.php";

// Connect to the database, and execute a query.

require "Database.php";

const QUERY1 = "select * from posts";

$id = $_GET['id'];

const QUERY2 = "select * from posts where id = :id"; // für Hausaufgabe

$config = require('config.php');

$db = new Database($config['database'],'kurrurk','L@rAca$7_sql');

$posts = $db->query(QUERY1)->fetchAll(); // FETCH_ASSOC -> Gib mir das Ergebnis als assoziatives Array

echo '<h2>'.QUERY1.' :</h2>';

echo '<ul>';
foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}
echo '</ul>';


// Hausaufgabe

$post2 = $db->query(QUERY2, [':id' => $id])->fetch();

echo '<h2>'.QUERY2.' :</h2>';

echo '<ul>';
echo "<li>" . $post2['title'] . "</li>";
echo '</ul>';

?>

</body>
</html>

<?php

dd($post2['title']);