<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/history', 'Booking::history');
$routes->get('/search', 'Pages::search');
$routes->get('/login', 'User::login');
$routes->get('/booking', 'Pages::booking');
