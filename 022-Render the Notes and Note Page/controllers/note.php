<?php

$config = require('config.php');
$db = new Database($config['database'],'kurrurk','L@rAca$7_sql');

$heading = "Notiz";

$note = $db->query('select * from notes where id = :id',['id' => $_GET['id']])->fetch();

require "views/note.view.php";