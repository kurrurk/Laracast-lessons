<?php
class Database {

    private $connection;

    private $statement;
    public function __construct($config, $username = 'root', $password = '')
    {

        $dsn = "mysql:" . http_build_query($config,'',';'); // host=localhost;port=3306;dbname=myapp...

        // $dsn="mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}"; // alte Version

        $this->connection = new PDO($dsn,$username, $password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []) {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;

    }

    public function find () {

        return $this->statement->fetch();

    }

    public function findOrFail () {

        $result = $this->find();

        if ( !$result ) {

            abort();

        }

        return $result;

    }

    public function get () {

        return $this->statement->fetchAll();

    }
}