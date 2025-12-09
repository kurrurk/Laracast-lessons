<?php

use Core\Session;
use Core\ValidationExaption;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register( function ($class) {

    $class = str_replace('\\', DIRECTORY_SEPARATOR , $class );
    require base_path("{$class}.php");

});


require base_path('bootstrap.php');


$router = new \Core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path']; // Funktion, die URLs analysiert

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


try {

    $router->route($uri, $method);

} catch (ValidationExaption $exception) {

    // PRG Pattern: Store errors in session and redirect

    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());

}

// Clear flashed session data after request
Session::unflash();