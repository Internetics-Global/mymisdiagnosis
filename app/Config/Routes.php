<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);



/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->get('/image', 'ImageUpload::index');
$routes->get('/', 'SendMail::index');

$routes->get('pages/(:segment)', 'Post::display/$1');

$routes->add('pages/','Post::index/$1');

$routes->add('pages/(:alphanum)','Post::display/$1');

// $routes->add('pages/(:any)', 'Post::index/$1');

$routes->get('/', 'AutocompleteSearch::index');   

$routes->get('record/(:segment)', 'Record::display/$1');

$routes->add('records/','Record::index/$1');

$routes->add('record/(:alphanum)','Record::display/$1');

$routes->add('record/(:any)', 'Record::index/$1');


$routes->get('records', 'Record::index');
$routes->get('pages', 'Post::index');




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
	
	 