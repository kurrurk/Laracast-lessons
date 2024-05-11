<?php
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