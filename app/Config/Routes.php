<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
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
$routes->setAutoRoute(true);

/**/


$routes->get('/', 'Home::index');
$routes->post('login/Admin', 'Login::ceklogin');
$routes->get('login/Admin/lupapassword', 'Login::lupaPassword');
$routes->get('login/Admin/resetPassword', 'Login::resetPassword');
$routes->get('logout', 'Login::logout');


// menu
$routes->get('pemerintah', 'Perangkatdesa::indexMenu');
$routes->get('informasi', 'Berita::indexMenu');
$routes->get('detailinformasi/(:num)', 'Berita::indexMenuDetail/$1');
$routes->get('v_potensidesa', 'Potensidesa::indexMenu');
$routes->get('detailpotensi/(:num)', 'Potensidesa::indexMenuDetail/$1');
$routes->get('v_produkdesa', 'Produkdesa::indexMenu');
$routes->get('v_layananpenduduk', 'LayananPenduduk::indexMenu');
$routes->post('s_hubungikami', 'Hubungikami::add');
