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

$routes->group('history', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('', 'BookingController::viewHistoryPage');
    $routes->get('success', 'BookingController::viewHistorySuccessPage');
    $routes->get('pending', 'BookingController::viewHistoryPendingPage');
    $routes->get('failed', 'BookingController::viewHistoryFailedPage');
});

$routes->get('/pnrAPI', 'PnrAPI::index');