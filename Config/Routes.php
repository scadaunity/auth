<?php

namespace Scadaunity\Auth\Config;

/**
 * Define Scada unity - Auth Routers
 */

$routes->group('Auth', ['namespace' => 'Scadaunity\Auth\Controllers'], function ($routes) {
    /**
     * Pages render views
     */
    $routes->get('/', 'Auth::index');
    $routes->get('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
    $routes->get('register', 'Auth::register');
    $routes->get('verify', 'Auth::confirmSignup');
    $routes->get('forgot','Auth::forgot');
    $routes->get('reset','Auth::reset');

    /**
     * Actions send forms
     */
    $routes->post('autenticate', 'Auth::autenticate');
    $routes->post('create', 'Auth::create');
    $routes->post('activateAccount', 'Auth::activateAccount');
    $routes->post('requestForgot', 'Auth::requestForgot');

    /**
     * Admin
     */
    $routes->get('admin', 'Admin::users');

});