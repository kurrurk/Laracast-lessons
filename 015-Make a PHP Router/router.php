<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path']; // Funktion, die URLs analysiert

/*

// Super naive router

if ($uri === '/') {
    require 'controllers/index.php';
} elseif ($uri === '/about') {
    require 'controllers/about.php';
} elseif ($uri === '/contact') {
    require 'controllers/contact.php';
} elseif ($uri === '/mission') {
    require 'controllers/mission.php';
}


*/

$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/contact.php",
    "/mission" => "controllers/mission.php",
];


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