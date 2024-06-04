<?php

$config = require('config.php');
$db = new Database($config['database'],'kurrurk','L@rAca$7_sql');

$heading = "Meine Notizen";

$notes = $db->query('select * from notes where user_id = 1')->get();

require "views/notes.view.php";