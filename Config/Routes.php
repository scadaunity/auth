<?php

namespace Scadaunity\Auth\Config;

// Create a new instance of our RouteCollection class.
use Config\Services;

$routes = Services::routes(true);


/**
 * Define Scada unity - Auth Routers
 */

$routes->group('auth', ['namespace' => 'Scadaunity\Auth\Controllers'], function ($routes) {


    $routes->get('/', 'Auth::index');
    $routes->get('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
    $routes->get('register', 'Auth::register');
    $routes->get('verify', 'Auth::verify');
    $routes->get('forgot','Auth::forgot');
    $routes->get('reset','Auth::reset');

    $routes->post('autenticate', 'Auth::autenticate');
    $routes->post('create', 'Auth::create');
    $routes->post('activateAccount', 'Auth::activateAccount');
    $routes->post('requestForgot', 'Auth::requestForgot');


});

$routes->group('admin', ['namespace' => 'Scadaunity\Auth\Controllers','filter' => 'authorization'], function ($routes) {
    /**
     * Pages render views
     */
    $routes->get('/', 'Admin::index', ['filter' => 'authorization']);
    $routes->get('users','Users::index');
});

$routes->group('user', ['namespace' => 'Scadaunity\Auth\Controllers','filter' => 'authorization'], function ($routes) {
    /**
     * Pages render views
     */
    $routes->add('/', 'Users::index', ['filter' => 'authorization']);
    $routes->add('roles','Roles::index');
    $routes->add('view/(:num)','Users::view/$1');
    $routes->add('teste','Users::teste');
});

