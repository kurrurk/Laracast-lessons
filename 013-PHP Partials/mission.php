<?php

function urlIs ($value) : bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

$heading = "Unsere Mission";

require "views/mission.view.php";