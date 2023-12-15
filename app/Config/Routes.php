<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/history', 'Pages::history');
$routes->get('/search', 'Pages::search');
$routes->get('/login', 'Pages::login');
