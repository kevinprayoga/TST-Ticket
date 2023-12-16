<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/booking', 'Booking::create');
$routes->post('/booking/(:segment)', 'Booking::$1'); 
