<?php

namespace App\Controllers\Admin;

use App\Models\SubkriteriaModel;
use App\Models\KriteriaModel;  // <- ini tambahan

class Subkriteria extends BaseController
{
    protected $subkriteriaModel;
    protected $kriteriaModel;

    public function __construct()
    {
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->kriteriaModel = new KriteriaModel();  // inisialisasi model kriteria
    }

    // Menampilkan halaman index dengan data subkriteria
    public function index($id = null)
    {
        $model = new SubkriteriaModel();
        $kriteriaModel = new KriteriaModel();

        // Data utama: list subkriteria dengan pagination 10 per halaman
        $data = [
            'subkriteria' => $model->paginate(10),
            'pager' => $model->pager,
            'kriteria' => $kriteriaModel->findAll(),
        ];

        // Jika ada parameter $id, load data subkriteria untuk diedit
        if ($id !== null) {
            $subkriteriaToEdit = $model->find($id);
            if ($subkriteriaToEdit) {
                $data['subkriteriaToEdit'] = $subkriteriaToEdit;
            } else {
                // Jika id tidak ditemukan, bisa kasih flash message atau redirect
                session()->setFlashdata('error', 'Subkriteria tidak ditemukan.');
                return redirect()->to('admin/subkriteria');
            }
        }

        return view('admin/subkriteria/index', $data);
    }

    // Simpan data subkriteria baru
    public function store()
    {
        if (!$this->validate([
            'id_kriteria' => 'required|integer',
            'nama_subkriteria' => 'required',
            'nilai' => 'required|numeric'
        ])) {
            return redirect()->to('/admin/subkriteria')->withInput();
        }

        $this->subkriteriaModel->save([
            'id_kriteria' => $this->request->getPost('id_kriteria'),
            'nama_subkriteria' => $this->request->getPost('nama_subkriteria'),
            'nilai' => $this->request->getPost('nilai')
        ]);

        session()->setFlashdata('success', 'Data subkriteria berhasil ditambahkan.');
        return redirect()->to('/admin/subkriteria');
    }

    // Update data subkriteria
    public function update($id_subkriteria)
    {
        if (!$this->validate([
            'id_kriteria' => 'required|integer',
            'nama_subkriteria' => 'required',
            'nilai' => 'required|numeric'
        ])) {
            return redirect()->to('/admin/subkriteria/edit/' . $id_subkriteria)->withInput();
        }

        $this->subkriteriaModel->update($id_subkriteria, [
            'id_kriteria' => $this->request->getPost('id_kriteria'),
            'nama_subkriteria' => $this->request->getPost('nama_subkriteria'),
            'nilai' => $this->request->getPost('nilai')
        ]);

        session()->setFlashdata('success', 'Data subkriteria berhasil diperbarui.');
        return redirect()->to('/admin/subkriteria');
    }

    // Hapus data subkriteria
    public function delete($id_subkriteria)
    {
        $this->subkriteriaModel->delete($id_subkriteria);
        session()->setFlashdata('success', 'Data subkriteria berhasil dihapus.');
        return redirect()->to('/admin/subkriteria');
    }
}
