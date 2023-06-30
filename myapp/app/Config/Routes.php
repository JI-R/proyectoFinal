<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('api', 'Rest::index');
$routes->get('listar', 'Rest::listar');
$routes->post('esp', 'Rest::espPost');
$routes->get('data-gg', 'Rest::getGoogleGauge');
$routes->get('g-gauge', 'Rest::googleGauge');
$routes->get('data-gl', 'Rest::getGoogleLine');
$routes->get('g-line', 'Rest::googleLine');
$routes->get('data-eb', 'Rest::dataEchartsBar');
$routes->get('e-bar', 'Rest::echartsBar');
$routes->get('data-el', 'Rest::dataEchartsLine');
$routes->get('e-line', 'Rest::echartsLine');
$routes->get('table', 'Rest::table');
$routes->get('e-gauge', 'Rest::echartsGauge');
$routes->get('dashboard', 'Rest::dashboard');
$routes->get('querys', 'Rest::querys');

/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
