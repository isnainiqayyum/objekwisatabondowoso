<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use App\Models\RekomendasiModel;

class Dashboard extends BaseController
{
    public function index()
{
    $alternatifModel = new AlternatifModel();
    $kriteriaModel = new KriteriaModel();
    $subkriteriaModel = new SubkriteriaModel();
    $rekomendasiModel = new RekomendasiModel();

    $data = [
        'total_wisata' => $alternatifModel->countAll(),
        'total_kriteria' => $kriteriaModel->countAll(),
        'total_subkriteria' => $subkriteriaModel->countAll(),
        'total_rekomendasi' => $rekomendasiModel->countAll()
    ];

    return view('admin/dashboard/index', $data);
}
}
