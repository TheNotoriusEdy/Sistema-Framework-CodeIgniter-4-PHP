<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', function() {
    return view('Usuarios/Login');
});

$routes->get('/registro', function() {
    return view('Usuarios/Registro');
});
