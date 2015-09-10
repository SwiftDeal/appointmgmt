<?php

// define routes

$routes = array(
    array(
        "pattern" => "features",
        "controller" => "home",
        "action" => "features"
    ),
    array(
        "pattern" => "home",
        "controller" => "home",
        "action" => "index"
    ),
    array(
        "pattern" => "contact",
        "controller" => "home",
        "action" => "contact"
    ),
    array(
        "pattern" => "about",
        "controller" => "home",
        "action" => "about"
    ),
    array(
        "pattern" => "medicines",
        "controller" => "home",
        "action" => "medicines"
    ),
    array(
        "pattern" => "quesans",
        "controller" => "home",
        "action" => "quesans"
    ),
    array(
        "pattern" => "gallery",
        "controller" => "home",
        "action" => "gallery"
    ),
    array(
        "pattern" => "packages/special",
        "controller" => "home",
        "action" => "special"
    ),
    array(
        "pattern" => "packages/seasonal",
        "controller" => "home",
        "action" => "seasonal"
    )

);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
