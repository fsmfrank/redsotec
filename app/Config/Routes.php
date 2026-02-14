<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Pagos;
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

$routes->get('clientes', 'Usuarios::index');
$routes->get('clientes/crear', 'Usuarios::crear');
$routes->post('clientes/guardar', 'Usuarios::guardar');
$routes->get('clientes/editar/(:num)', 'Usuarios::editar/$1');
$routes->post('clientes/actualizar/(:num)', 'Usuarios::actualizar/$1');
$routes->get('clientes/eliminar/(:num)', 'Usuarios::eliminar/$1');

// Ruta para generar el PDF del contrato de un usuario específico
$routes->get('clientes/generar/(:num)', 'Usuarios::generarContrato/$1');

// Grupo de rutas para Pagos
$routes->group('pagos', function($routes) {
    $routes->get('/', [Pagos::class, 'index']);          // Listado: domain.com/pagos
    $routes->get('crear', [Pagos::class, 'crear']);      // Formulario: domain.com/pagos/crear
    $routes->post('guardar', [Pagos::class, 'guardar']); // Procesar: domain.com/pagos/guardar
    $routes->get('pdf/(:num)', [Pagos::class, 'generarPDF/$1']); // Recibo: domain.com/pagos/pdf/5
});
// Ruta para ver reportes de morosos (Alertas)
$routes->get('alertas', 'Pagos::verAlertas');
//DASHBOARD
$routes->get('dashboard', 'Pagos::dashboard');