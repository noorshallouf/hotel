<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */$routes->get('/', 'Home::index');

$routes->get('availability', 'BookingController::availability');
$routes->post('booking/create', 'BookingController::create');

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::storeRegister');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::storeLogin');

$routes->get('/logout', 'AuthController::logout');



