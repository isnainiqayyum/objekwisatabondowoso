<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index'); // ini sudah benar jika controller kamu bernama 'home'
$routes->get('tentang', 'home::tentang');
$routes->get('artikel', 'home::artikel');
$routes->get('artikel1', 'home::artikel1');
$routes->get('produk', 'home::produk');
$routes->get('produk1', 'home::produk1');
$routes->get('aktivitas', 'home::aktivitas');
$routes->get('aktivitas1', 'home::aktivitas1');
$routes->get('kontak', 'home::kontak');
