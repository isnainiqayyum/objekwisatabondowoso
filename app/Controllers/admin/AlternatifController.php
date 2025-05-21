<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;

class AlternatifController extends BaseController
{
    protected $alternatifModel;
    protected $kriteriaModel;
    protected $subkriteriaModel;

    public function __construct()
    {
        $this->alternatifModel = new AlternatifModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
    }

    public function index()
    {
        $data['alternatif'] = $this->alternatifModel->getDataAlternatif();
        return view('admin/alternatif/index', $data);
    }

    public function create()
    {
        helper('form');
        $data['kriteria'] = $this->kriteriaModel->findAll();
        $data['subkriteria'] = $this->subkriteriaModel->findAll();
        return view('admin/alternatif/create', $data);
    }

    public function simpan()
    {
        helper('form');

        $rules = [
            'id_kriteria'    => 'required|integer',
            'id_subkriteria' => 'required|integer',
            'nama_wisata'    => 'required|min_length[3]|max_length[255]',
            'deskripsi'      => 'permit_empty|string',
            'foto'           => 'permit_empty|is_image[foto]|max_size[foto,2048]',
            'sumber_foto'    => 'permit_empty|string|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            $data['kriteria'] = $this->kriteriaModel->findAll();
            $data['subkriteria'] = $this->subkriteriaModel->findAll();
            $data['old'] = $this->request->getPost();
            return view('admin/alternatif/create', $data);
        }

        $input = [
            'id_kriteria'    => $this->request->getPost('id_kriteria'),
            'id_subkriteria' => $this->request->getPost('id_subkriteria'),
            'nama_wisata'    => $this->request->getPost('nama_wisata'),
            'deskripsi'      => $this->request->getPost('deskripsi'),
            'sumber_foto'    => $this->request->getPost('sumber_foto'),
        ];

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $newName = $fileFoto->getRandomName();
            $uploadPath = FCPATH . 'asset-user/uploads/foto_wisata';
            $fileFoto->move($uploadPath, $newName);
            $input['foto'] = $newName;
        }

        $this->alternatifModel->insert($input);

        session()->setFlashdata('success', 'Data alternatif berhasil disimpan.');
        return redirect()->to(base_url('admin/alternatif'));
    }

    public function edit($id)
    {
        $data['alternatif'] = $this->alternatifModel->find($id);
        $data['kriteria'] = $this->kriteriaModel->findAll();
        $data['subkriteria'] = $this->subkriteriaModel->findAll();
        return view('admin/alternatif/edit', $data);
    }

    public function update($id)
    {
        $alternatif = $this->alternatifModel->find($id);
        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $uploadPath = FCPATH . 'asset-user/uploads/foto_wisata';
            $fileFoto->move($uploadPath, $namaFoto);

            if ($alternatif['foto'] && file_exists($uploadPath . '/' . $alternatif['foto'])) {
                unlink($uploadPath . '/' . $alternatif['foto']);
            }
        } else {
            $namaFoto = $alternatif['foto'];
        }

        $this->alternatifModel->update($id, [
            'id_kriteria'    => $this->request->getPost('id_kriteria'),
            'id_subkriteria' => $this->request->getPost('id_subkriteria'),
            'nama_wisata'    => $this->request->getPost('nama_wisata'),
            'deskripsi'      => $this->request->getPost('deskripsi'),
            'foto'           => $namaFoto,
            'sumber_foto'    => $this->request->getPost('sumber_foto'),
        ]);

        return redirect()->to(base_url('admin/alternatif/index'))->with('success', 'Data alternatif berhasil diperbarui.');
    }

    public function delete($id)
    {
        $alternatif = $this->alternatifModel->find($id);
        $uploadPath = FCPATH . 'asset-user/uploads/foto_wisata';

        if ($alternatif['foto'] && file_exists($uploadPath . '/' . $alternatif['foto'])) {
            unlink($uploadPath . '/' . $alternatif['foto']);
        }

        $this->alternatifModel->delete($id);
        return redirect()->to(base_url('admin/alternatif'))->with('success', 'Data alternatif berhasil dihapus.');
    }
}
