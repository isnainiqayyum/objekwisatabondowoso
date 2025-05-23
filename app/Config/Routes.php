<?php

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('user\Home'); // default ke halaman user
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // atau false, sesuai keamanan aplikasi kamu

// === ROUTE DASAR (USER) ===
    $routes->get('/', 'beranda'); // root langsung ke beranda user


$routes->group('', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('login', 'Login::index'); // halaman login
    $routes->post('login/process', 'Login::process'); // proses login
    $routes->get('logout', 'Login::logout'); // logout
});

// === ADMIN ===
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('dashboard', 'dashboard'); // dashboard admin
    // Tambahkan route admin lainnya di sini...
});

// === ARTIKEL (ADMIN) ===
// Admin Artikel Routes
$routes->group('admin/artikel', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('/', 'Artikel::index');
    $routes->get('index', 'Artikel::index');
    $routes->get('tambah', 'Artikel::tambah');
    $routes->post('proses_tambah', 'Artikel::proses_tambah');
    $routes->get('edit/(:num)', 'Artikel::edit/$1');
    $routes->post('proses_edit/(:num)', 'Artikel::proses_edit/$1');
    $routes->get('delete/(:num)', 'Artikel::delete/$1');
});

// === TENTANG (ADMIN) ===
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->match(['get', 'post'], 'tentang/edit', 'Tentang::edit');
});


// === ALTERNATIF (ADMIN) ===
$routes->group('admin', function($routes) {
    $routes->get('alternatif', 'Admin\AlternatifController::index');
    $routes->get('alternatif/index', 'Admin\AlternatifController::index');
    $routes->get('alternatif/create', 'Admin\AlternatifController::create');
    $routes->post('alternatif/simpan', 'Admin\AlternatifController::simpan');
    $routes->get('alternatif/edit/(:num)', 'Admin\AlternatifController::edit/$1');
    $routes->post('alternatif/update/(:num)', 'Admin\AlternatifController::update/$1');
    $routes->get('alternatif/delete/(:num)', 'Admin\AlternatifController::delete/$1');
});

// === KRITERIA (ADMIN) ===
$routes->group('admin', function($routes) {
    $routes->get('kriteria', 'Admin\KriteriaController::index');
    $routes->get('kriteria/index', 'Admin\KriteriaController::index');
    $routes->get('kriteria/edit/(:num)', 'Admin\KriteriaController::index/$1');
    $routes->post('kriteria/store', 'Admin\KriteriaController::store');
    $routes->post('kriteria/update/(:num)', 'Admin\KriteriaController::update/$1');
    $routes->get('kriteria/delete/(:num)', 'Admin\KriteriaController::delete/$1');
    $routes->get('kriteria/index/(:num)', 'Admin\KriteriaController::index/$1');
});

// === SUBKRITERIA (ADMIN) ===
$routes->group('admin', function($routes) {
    $routes->get('subkriteria', 'Admin\Subkriteria::index');
    $routes->get('subkriteria/index/(:num)', 'Admin\Subkriteria::index/$1');
    $routes->get('subkriteria/edit/(:num)', 'Admin\Subkriteria::index/$1');
    $routes->post('subkriteria/store', 'Admin\Subkriteria::store');
    $routes->post('subkriteria/update/(:num)', 'Admin\Subkriteria::update/$1');
    $routes->post('subkriteria/delete/(:num)', 'Admin\Subkriteria::delete/$1');
});

// === PENILAIAN (ADMIN) ===
$routes->group('admin', function($routes) {
    $routes->get('penilaian', 'Admin\PenilaianController::index');
    $routes->get('penilaian/index', 'Admin\PenilaianController::index');
    $routes->get('penilaian/create', 'Admin\PenilaianController::create');
    $routes->post('penilaian/store', 'Admin\PenilaianController::store');
    $routes->get('penilaian/edit/(:num)', 'Admin\PenilaianController::edit/$1');
    $routes->post('penilaian/update/(:num)', 'Admin\PenilaianController::update/$1');
    $routes->delete('penilaian/delete/(:num)', 'Admin\PenilaianController::delete/$1');
});

// === PERHITUNGAN (ADMIN) ===
$routes->group('admin', function($routes) {
    $routes->get('perhitungan', 'Admin\Perhitungan::index');
    $routes->get('perhitungan/index', 'Admin\Perhitungan::index');
    $routes->get('perhitungan/create', 'Admin\Perhitungan::create');
    $routes->post('perhitungan/store', 'Admin\Perhitungan::store');
    $routes->get('perhitungan/delete/(:num)', 'Admin\Perhitungan::delete/$1');
    $routes->get('perhitungan/hasil', 'Admin\Perhitungan::hasil');
    $routes->get('perhitungan/proses', 'Admin\Perhitungan::proses');
});

// === RIWAYAT (ADMIN) ===
$routes->group('admin/rekomendasi', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('riwayat', 'RekomendasiController::riwayat');
});


// === USER HOME ===
$routes->group('user', ['namespace' => 'App\Controllers\User'], function($routes) {
    // Home user
    $routes->get('home', 'Home::index');            // URL: /user/home

    // Wisata
    $routes->get('wisata', 'Wisata::index');        // URL: /user/wisata
    $routes->get('wisata/detail/(:num)', 'Wisata::detail/$1');

    // Rekomendasi
    $routes->get('rekomendasi', 'Rekomendasi::index');  // URL: /user/rekomendasi
    $routes->get('rekomendasi/hasil', 'Rekomendasi::hasil'); // URL: /user/rekomendasi/hasil

    // Tentang
    $routes->get('tentang', 'Tentangctrl::index');      // URL: /user/tentang

    //artikel
    $routes->get('artikel', 'Artikel::index');
    $routes->get('artikel/detail/(:num)', 'Artikel::detail/$1');
});
