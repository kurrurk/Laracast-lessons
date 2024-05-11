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
    ul {
        line-height: 1.5em;
    }
</style>

<body>

<h1>PDO First Steps:</h1>
<?php

require "functions.php";

// Connect to the database, and execute a query.

class Database {

    private $connection;
    public function __construct()
    {
        $dsn="mysql:host=127.0.0.1;port=3306;dbname=myapp;user=kurrurk;password=L@rAca$7_sql;charset=utf8mb4";

        $this->connection = new PDO($dsn);
    }

    public function query($query) {

        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;

    }
}

$db = new Database();

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC); // FETCH_ASSOC -> Gib mir das Ergebnis als assoziatives Array

$post2 = $db->query("select * from posts where id = 2")->fetch(PDO::FETCH_ASSOC);

echo '<ul>';
    foreach ($posts as $post) {
        echo "<li>" . $post['title'] . "</li>";
    }
echo '</ul>';

?>

</body>
</html>

<?php
dd($post2['title']);