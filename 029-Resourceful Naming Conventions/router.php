<?php

$routes = require ('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path']; // Funktion, die URLs analysiert

function routeToController($uri, $routes) {

    if (array_key_exists($uri, $routes)) { // Funktion zum Überprüfen der Existenz eines Index in einem Array
        require $routes[$uri];
    } else {
        abort();
    }

}

function abort($code = 404) {

    http_response_code($code); // Funktion zur Rückgabe eines Fehlercodes

    require "views/{$code}.php"; // Es sollten alle Fehlercodes überprüfen werden, aber bisher gibt es nur einen.

    die();
}

routeToController($uri, $routes);