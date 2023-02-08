<?php 

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = [
    "/" => base_path("controllers/index.php"),
    "/login" => base_path("controllers/login.php"),
    "/logout" => base_path("controllers/logout.php"),
    "/dashboard" => base_path("controllers/dashboard.php"),
    "/profile" => base_path("controllers/profile.php"),
    "/forms" => base_path("controllers/form-handle.php"),


];


function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    require "controller/{$code}.php";

    die();
}

routeToController($uri, $routes);