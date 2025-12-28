<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/
$routes->get('/', 'HomeController::index');
$routes->get('/booking', 'BookingController::index');
$routes->post('/booking/create', 'BookingController::create');
$routes->get('/booking/success', 'BookingController::success');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
// Auth
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::storeLogin');
$routes->get('logout', 'AuthController::logout');


$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::storeRegister');

/*
|--------------------------------------------------------------------------
| Payments
|--------------------------------------------------------------------------
*/
$routes->get('/payment/pay/(:num)', 'PaymentController::pay/$1');

/*
|--------------------------------------------------------------------------
| Dashboard (Admin)
|--------------------------------------------------------------------------
*/
$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {

    $routes->get('/', 'DashboardController::index');

    $routes->get('bookings', 'AdminBookingsController::index');
    $routes->get('rooms', 'AdminRoomsController::index');
    $routes->get('room-types', 'AdminRoomTypesController::index');
    $routes->get('payments', 'AdminPaymentsController::index');
    $routes->get('users', 'AdminUsersController::index');

    $routes->get('rooms/create', 'AdminRoomsController::create');
    $routes->post('rooms/store', 'AdminRoomsController::store');
});
