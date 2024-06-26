<?php

use Core\Response;

function dd ($value) : void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs ($value) : bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}


function abort($code = 404) {

    http_response_code($code); // Funktion zur Rückgabe eines Fehlercodes

    require base_path("views/{$code}.php"); // Es sollten alle Fehlercodes überprüfen werden, aber bisher gibt es nur einen.

    die();

}

function authorize ( $condition, $status = Response::FORBIDDEN ) {

    if ( !$condition ) {
        abort($status);
    }

}

function base_path ($path) : string {
    return BASE_PATH . $path;
}

function view ($path, $attributes = []) {

    extract($attributes);

    require base_path('views/' . $path);

}