<?php
class Database {

    private $connection;
    public function __construct($config, $username = 'root', $password = '')
    {

        $dsn = "mysql:" . http_build_query($config,'',';'); // host=localhost;port=3306;dbname=myapp...

        // $dsn="mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}"; // alte Version

        $this->connection = new PDO($dsn,$username, $password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []) {

        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;

    }
}