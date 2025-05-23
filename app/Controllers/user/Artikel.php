<?php

namespace App\Controllers\User;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    // Menampilkan semua artikel (halaman index)
    public function index()
    {
        $data = [
            'title' => 'Daftar Artikel',
            'artikel' => $this->artikelModel->getAll(),
        ];

        return view('user/artikel/index', $data);
    }

    // Menampilkan detail artikel berdasarkan id
    public function detail($id)
{
    $artikel = $this->artikelModel->getById($id);

    if (!$artikel) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
    }

    // Ambil 4 artikel acak lainnya (kecuali artikel yang sedang dibuka)
    $rekomendasi = $this->artikelModel
        ->where('id !=', $id)
        ->orderBy('RAND()')
        ->limit(4)
        ->findAll();

    $data = [
        'title' => $artikel->judul_artikel,
        'artikel' => $artikel,
        'rekomendasi' => $rekomendasi
    ];

    return view('user/artikel/detail', $data);
}

}
