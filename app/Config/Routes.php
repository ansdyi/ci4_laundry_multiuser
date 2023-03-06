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
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Login Logout
 * --------------------------------------------------------------------
 */

$routes->get('logout', 'Auth::logout');

$routes->group('auth', ['filter' => 'noauth'], function ($routes) {
	$routes->get('login', 'Auth::login');
});

/*
 * --------------------------------------------------------------------
 * Admin
 * --------------------------------------------------------------------
 */

$routes->group('admin/dashboard', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Admin\Dashboard::index');
});

$routes->group('admin/pengguna', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Admin\Pengguna::index');
	$routes->get('save', 'Admin\Pengguna::save');
	$routes->get('update', 'Admin\Pengguna::update');
	$routes->get('delete', 'Admin\Pengguna::delete');
});

$routes->group('admin/paket', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Admin\Paket::index');
	$routes->get('save', 'Admin\Paket::save');
	$routes->get('update', 'Admin\Paket::update');
	$routes->get('delete', 'Admin\Paket::delete');
});

$routes->group('admin/outlet', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Admin\Outlet::index');
	$routes->get('save', 'Admin\Outlet::save');
	$routes->get('update', 'Admin\Outlet::update');
	$routes->get('delete', 'Admin\Outlet::delete');
});

$routes->group('admin/pelanggan', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Admin\Pelanggan::index');
	$routes->get('save', 'Admin\Pelanggan::save');
	$routes->get('update', 'Admin\Pelanggan::update');
	$routes->get('delete', 'Admin\Pelanggan::delete');
});

$routes->group('admin/transaksi', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Admin\Transaksi::index');
	$routes->get('save', 'Admin\Transaksi::save');
	$routes->get('update', 'Admin\Transaksi::update');
	$routes->get('delete', 'Admin\Transaksi::delete');
	$routes->get('autocode', 'Admin\Transaksi::autocode');
});

$routes->group('admin/laporan', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Admin\Laporan::index');
	$routes->get('generatePdf', 'Admin\Laporan::generatePdf');
});

/*
 * --------------------------------------------------------------------
 * Kasir
 * --------------------------------------------------------------------
 */

$routes->group('kasir/dashboard', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Kasir\Dashboard::index');
});

$routes->group('kasir/pelanggan', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Kasir\Pelanggan::index');
	$routes->get('save', 'Kasir\Pelanggan::save');
	$routes->get('update', 'Kasir\Pelanggan::update');
	$routes->get('delete', 'Kasir\Pelanggan::delete');
});

$routes->group('kasir/transaksi', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Kasir\Transaksi::index');
	$routes->get('save', 'Kasir\Transaksi::save');
	$routes->get('update', 'Kasir\Transaksi::update');
	$routes->get('delete', 'Kasir\Transaksi::delete');
	$routes->get('autocode', 'Kasir\Transaksi::autocode');
});

$routes->group('kasir/laporan', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Kasir\Laporan::index');
	$routes->get('generatePdf', 'Kasir\Laporan::generatePdf');
});

/*
 * --------------------------------------------------------------------
 * Owner
 * --------------------------------------------------------------------
 */

 $routes->group('owner/dashboard', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Owner\Dashboard::index');
});

$routes->group('owner/laporan', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'Owner\Laporan::index');
	$routes->get('generatePdf', 'Owner\Laporan::generatePdf');
});

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
