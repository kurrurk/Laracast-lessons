<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database'],'kurrurk','L@rAca$7_sql');

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id',['id' => $_GET['id']])->find();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [

    'heading' => "Notiz",
    'note' => $note

]);