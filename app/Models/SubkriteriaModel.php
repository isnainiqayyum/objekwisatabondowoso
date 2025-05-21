<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkriteriaModel extends Model
{
    protected $table = 'tb_subkriteria';
    protected $primaryKey = 'id_subkriteria';

    protected $allowedFields = [
        'id_kriteria',
        'nama_subkriteria',
        'nilai'
    ];

    protected $useTimestamps = false;

    // Ambil semua subkriteria berdasarkan id_kriteria
    public function getSubkriteriaByKriteria($id_kriteria)
    {
        return $this->where('id_kriteria', $id_kriteria)->findAll();
    }
}
