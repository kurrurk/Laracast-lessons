<?php

$config = require('config.php');
$db = new Database($config['database'],'kurrurk','L@rAca$7_sql');

$heading = "Notiz erstellen";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $notes = $db->query('insert into notes(body, user_id) values(:body,:user_id)', [

        'body' => $_POST['body'],
        'user_id' => 1

    ]);
}

require 'views/note-create.view.php';