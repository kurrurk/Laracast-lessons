<?php

function urlIs ($value) : bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

$heading = "Startseite";

require "views/index.view.php";