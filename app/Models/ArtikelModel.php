<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'tb_artikel';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'judul_artikel',
        'deskripsi',
        'foto',
        'sumber_foto',
        'tanggal_publish'
    ];

    // Ambil semua artikel
    public function getAll()
    {
        return $this->orderBy('tanggal_publish', 'DESC')->findAll();
    }

    // Ambil artikel berdasarkan ID
    public function getById($id)
    {
        return $this->find($id);
    }

    // Ambil artikel terbaru (misal 5 artikel terakhir)
    public function getTerbaru($limit = 5)
    {
        return $this->orderBy('tanggal_publish', 'DESC')->limit($limit)->find();
    }
}
