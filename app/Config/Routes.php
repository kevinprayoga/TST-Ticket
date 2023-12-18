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

$routes->get('/history', 'BookingController::viewHistoryPage');

$routes->get('/pnrAPI', 'PnrAPI::index');