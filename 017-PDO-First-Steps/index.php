<?php

require "functions.php";

// Connect to the database, and execute a query.

class Database {

    private $connection;
    public function __construct()
    {
        $dsn="mysql:host=127.0.0.1;port=3306;dbname=myapp;user=root;charset=utf8mb4";

        $this->connection = new PDO($dsn);
    }

    public function query($query) {

        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;

    }
}

$db = new Database();

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

$post2 = $db->query("select * from posts where id = 2")->fetch(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}

dd($post2['title']);