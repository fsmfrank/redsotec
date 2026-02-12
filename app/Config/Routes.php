<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('planes', 'Planes::index');
$routes->get('planes/crear', 'Planes::crear');
$routes->post('planes/guardar', 'Planes::guardar');
$routes->get('planes/editar/(:num)', 'Planes::editar/$1');
$routes->post('planes/actualizar/(:num)', 'Planes::actualizar/$1');
$routes->get('planes/eliminar/(:num)', 'Planes::eliminar/$1');

$routes->get('productos', 'Productos::index');
$routes->get('productos/crear', 'Productos::crear');
$routes->post('productos/guardar', 'Productos::guardar');
$routes->get('productos/editar/(:num)', 'Productos::editar/$1');
$routes->post('productos/actualizar/(:num)', 'Productos::actualizar/$1');
$routes->get('productos/eliminar/(:num)', 'Productos::eliminar/$1');