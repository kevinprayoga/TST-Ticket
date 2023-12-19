<?php

// use App\Controllers\PaymentController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::home');
$routes->get('/search', 'HomeController::search');

$routes->group('booking', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('', 'BookingController::viewBookingPage');
    $routes->post('save', 'BookingController::save');
});

$routes->get('/pnrAPI', 'PnrAPI::index');