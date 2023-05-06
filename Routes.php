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

$routes->get('/barangayresident/create', 'BarangayResident::createInformation');
$routes->get('/barangayresident/list', 'BarangayResident::listInformation');
$routes->put('/barangayresident/update', 'BarangayResident::updateInformation');
$routes->delete('/barangayresident/delete', 'BarangayResident::deleteInformation');
$routes->delete('/user', 'User::username');
$routes->delete('/user', 'User::password');
$routes->get('/compute/(:alpha)/(:num)/(:num)', 'User::compute/$1/$2/$3');
$routes->get('/age/(:alpha)/(:num)', 'LegalAge::age/$1/$2');
$routes->get('/zipcode/(:num)','ZipCode::city/$1');
$routes->get('post/(:num)', 'Post::index/$1');
$routes->get('show/(:num)', 'Post::index2/$1', ['as' => 'show.info']);
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) 
{
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
