<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Auth
$routes->get('/', 'Auth::index', ['filter' => 'is_auth']);
$routes->get('logout', 'Auth::logout', ['filter' => 'not_auth']);

// Home admin panel
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'not_auth']);

// User admin panel
$routes->get('user', 'User::index', ['filter' => 'not_auth']);
$routes->get('user/add', 'User::add', ['filter' => 'not_auth']);
$routes->delete('user/(:num)', 'User::delete/$1', ['filter' => 'not_auth']);
$routes->get('user/edit/(:segment)', 'User::edit/$1', ['filter' => 'not_auth']);

// Trash admin panel
$routes->get('trashes', 'Trash::index', ['filter' => 'not_auth']);
$routes->get('trash/out', 'Trash::out', ['filter' => 'not_auth']);
$routes->get('trash/add', 'Trash::add', ['filter' => 'not_auth']);
$routes->delete('trash/(:num)', 'Trash::delete/$1', ['filter' => 'not_auth']);
$routes->delete('trash/out/(:num)', 'Trash::delDataOut/$1', ['filter' => 'not_auth']);
$routes->get('trash/edit/(:segment)', 'Trash::edit/$1', ['filter' => 'not_auth']);
$routes->get('history', 'History::index', ['filter' => 'not_auth']);

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
