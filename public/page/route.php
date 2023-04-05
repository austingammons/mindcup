<?php

$route = get_route();

$routes = [
    'home/index' => 'home/index.php',
    'account/dashboard' => 'account/dashboard.php',
    'account/login' => 'account/login.php',
    'account/logout' => 'account/logout.php',
    'account/register_success' => 'account/register_success.php',
    'account/register' => 'account/register.php',
    'thought/create' => 'thought/create.php',
    'thought/delete' => 'thought/delete.php',
    'thought/edit' => 'thought/edit.php',
    'thought/index' => 'thought/index.php',
    'thought/read' => 'thought/read.php',
    'test/index' => 'test/index.php',
];

$routes_that_dont_require_login = [
    'home/index' => 'home/index.php',
    'account/login' => 'account/login.php',
    'account/logout' => 'account/logout.php',
    'account/register_success' => 'account/register_success.php',
    'account/register' => 'account/register.php',
];

$accessible_folders = [ 'account', 'home', 'thought' ];

if (array_key_exists($route, $routes)) {

    if (!$current_user_is_logged_in) {
        
        if (!array_key_exists($route, $routes_that_dont_require_login)) {
            header('Location:' . USER_LOGIN_PATH);
        }

    }

    require $routes[$route];

} else {

    page_error("page not found", 404);

}

function page_error($message, $code) {

    http_response_code($code);

    require 'error.php';

    die();
}

function get_route() {

    $uri_parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $path = array_slice($uri_parts, -2, 2);
    $folder = $path[0];
    $file = explode('?', $path[1]);
    $parameters = [];

    if (count($file) == 0) {

        page_error("page not found", 404);

    } else if (count($file) == 1) {

        // no parameters

    } else if (count($file) > 1) {

        $parameters = explode('&', $file[1]);

    }

    return $folder . '/' . $file[0];
}