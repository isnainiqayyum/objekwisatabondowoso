<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tentang', 'Home::tentang');
$routes->get('artikel', 'Home::artikel');
$routes->get('artikel1', 'Home::artikel1'); // Tambahkan rute untuk artikel1
$routes->get('produk', 'Home::produk'); // Tambahkan rute untuk produk
$routes->get('produk1', 'Home::produk1'); // Tambahkan rute untuk produk1
$routes->get('aktivitas', 'Home::aktivitas'); // Tambahkan rute untuk aktivitas
$routes->get('aktivitas1', 'Home::aktivitas1'); // Tambahkan rute untuk aktivitas1
$routes->get('kontak', 'Home::kontak'); // Tambahkan rute untuk kontak
