<?php

function urlIs ($value) : bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

$heading = "Kontakt";

require "views/contact.view.php";