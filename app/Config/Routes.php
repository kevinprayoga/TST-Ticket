<?php

// use App\Controllers\PaymentController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/booking', 'Booking::create');
$routes->post('/booking/(:segment)', 'Booking::$1'); 

$routes->resource('payment', ['controller' => 'PaymentController']);

// resource simplify these routing:
// $routes->get('/payment', 'PaymentController::index');
// $routes->get('/payment/(:num)', 'PaymentController::show/$1');
// $routes->post('/payment', 'PaymentController::create');
// $routes->put('/payment/(:num)', 'PaymentController::update/$1');
// $routes->delete('/payment/(:num)', 'PaymentController::delete/$1');