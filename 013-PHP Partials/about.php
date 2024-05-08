<?php

function urlIs ($value) : bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

$heading = "Über uns";

require "views/about.view.php";