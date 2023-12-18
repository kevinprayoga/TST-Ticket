<?php

// use App\Controllers\PaymentController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('booking', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('', 'BookingController::viewBookingPage');
    $routes->post('save', 'BookingController::save');
});

$routes->get('/pnrAPI', 'PnrAPI::index');

$routes->resource('payment', ['controller' => 'PaymentController']);

// resource simplify these routing:
// $routes->get('/payment', 'PaymentController::index');
// $routes->get('/payment/(:num)', 'PaymentController::show/$1');
// $routes->post('/payment', 'PaymentController::create');
// $routes->put('/payment/(:num)', 'PaymentController::update/$1');
// $routes->delete('/payment/(:num)', 'PaymentController::delete/$1');