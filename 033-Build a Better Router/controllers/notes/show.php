<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'],'kurrurk','L@rAca$7_sql');

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $note = $db->query('select * from notes where id = :id',['id' => $_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id',['id' => $_GET['id']]);

    header('location: /notes');

    exit();

} else {

    $note = $db->query('select * from notes where id = :id',['id' => $_GET['id']])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    view("notes/show.view.php", [

        'heading' => "Notiz",
        'note' => $note

    ]);

}

