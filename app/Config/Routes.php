<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index'); // ini sudah benar jika controller kamu bernama 'home'
$routes->get('tentang', 'home::tentang');
$routes->get('artikel', 'home::artikel');
$routes->get('artikel1', 'home::artikel1');
$routes->get('artikel2', 'home::artikel2');
$routes->get('artikel3', 'home::artikel3');
$routes->get('artikel4', 'home::artikel4');
$routes->get('artikel5', 'home::artikel5');
$routes->get('artikel6', 'home::artikel6');
$routes->get('produk', 'home::produk');
$routes->get('produk1', 'home::produk1');
$routes->get('produk2', 'home::produk2');
$routes->get('produk3', 'home::produk3');
$routes->get('produk4', 'home::produk4');
$routes->get('aktivitas', 'home::aktivitas');
$routes->get('aktivitas1', 'home::aktivitas1');
$routes->get('aktivitas2', 'home::aktivitas2');
$routes->get('aktivitas3', 'home::aktivitas3');
$routes->get('kontak', 'home::kontak');
