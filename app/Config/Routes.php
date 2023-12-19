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

$routes->group('history', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('', 'BookingController::viewHistoryPage');
    $routes->get('success', 'BookingController::viewHistorySuccessPage');
    $routes->get('pending', 'BookingController::viewHistoryPendingPage');
    $routes->get('failed', 'BookingController::viewHistoryFailedPage');
    $routes->post('pending/pay', 'BookingController::pay');
    $routes->post('pending/cancel', 'BookingController::cancel');
});

$routes->get('/pnrAPI', 'PnrAPI::index');
$routes->get('/bookingAPI', 'BookingAPI::index');

$routes->get('/login', 'LoginController::index');
$routes->post('/login/process', 'LoginController::loginProcess');
$routes->get('/logout', 'LoginController::logout');