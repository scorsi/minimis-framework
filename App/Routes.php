<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('home', new Route('/{year}', array(
    'year' => null,
    '_controller' => 'ExampleController::index',
)));

return $routes;
