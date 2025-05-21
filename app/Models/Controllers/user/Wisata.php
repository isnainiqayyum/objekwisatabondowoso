<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\AlternatifModel;
use App\Models\SubKriteriaModel;

class Wisata extends BaseController
{
    protected $alternatifModel;
    protected $subKriteriaModel;

    public function __construct()
    {
        $this->alternatifModel = new AlternatifModel();
        $this->subKriteriaModel = new SubKriteriaModel();
    }

    public function index()
    {
        $limit = 9;

        $data = [
            'title' => 'Daftar Tempat Wisata',
            'tempatwisata' => $this->alternatifModel
                ->orderBy('id_alternatif', 'DESC')
                ->paginate($limit),
            'pager' => $this->alternatifModel->pager,
            'kategoriwisata' => $this->subKriteriaModel
                ->where('id_kriteria', 1)
                ->findAll()
        ];

        return view('user/wisata/index', $data);
    }

    public function detail($id_alternatif)
    {
        $wisata = $this->alternatifModel->find($id_alternatif);

        if (!$wisata) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data wisata tidak ditemukan.");
        }

        // Ambil 4 wisata acak lain selain yang sedang dibuka
        $randomWisata = $this->alternatifModel
            ->where('id_alternatif !=', $id_alternatif)
            ->orderBy('RAND()')
            ->limit(4)
            ->findAll();

        $data = [
            'title' => 'Detail Wisata',
            'wisata' => $wisata,
            'randomWisata' => $randomWisata,
            'kategoriwisata' => $this->subKriteriaModel
                ->where('id_kriteria', 1)
                ->findAll()
        ];

        return view('user/wisata/detail', $data);
    }
}
