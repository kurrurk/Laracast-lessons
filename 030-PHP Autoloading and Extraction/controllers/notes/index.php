<?php

$config = require base_path('config.php');

$db = new Database($config['database'],'kurrurk','L@rAca$7_sql');

$notes = $db->query('select * from notes where user_id = 1')->get();

view("notes/index.view.php", [

    'heading' => "Meine Notizen",
    'notes' => $notes

]);