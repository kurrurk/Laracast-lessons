<?php

$config = require('config.php');
$db = new Database($config['database'],'kurrurk','L@rAca$7_sql');

$heading = "Notiz";
$currentUserId = 2;

$note = $db->query('select * from notes where id = :id',['id' => $_GET['id']])->find();

authorize($note['user_id'] === $currentUserId);

require "views/note.view.php";