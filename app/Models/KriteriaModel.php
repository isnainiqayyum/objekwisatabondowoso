<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table = 'tb_kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $allowedFields = [
        'nama_kriteria',
        'bobot',
        'tipe'
    ];

    protected $useTimestamps = false;

    // Ambil semua kriteria
    public function getAllKriteria()
    {
        return $this->findAll();
    }
}
