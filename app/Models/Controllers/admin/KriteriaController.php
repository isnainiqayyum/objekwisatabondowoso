<?php

namespace App\Controllers\Admin;

use App\Models\KriteriaModel;
use CodeIgniter\Controller;

class KriteriaController extends Controller
{
    protected $kriteriaModel;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        helper(['form', 'url', 'session']);
    }

    // Halaman utama (CRUD di satu tempat)
    public function index($id = null)
    {
        $kriteria = $this->kriteriaModel->findAll();
        $editKriteria = null;

        if ($id !== null) {
            $editKriteria = $this->kriteriaModel->find($id);
            if (!$editKriteria) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Kriteria tidak ditemukan");
            }
        }

        return view('admin/kriteria/index', [
            'kriteria' => $kriteria,
            'editKriteria' => $editKriteria,
            'title' => 'Kelola Kriteria'
        ]);
    }

    // Simpan data baru
    public function store()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_kriteria' => 'required|trim',
            'bobot' => 'required|decimal|greater_than[0]|less_than_equal_to[1]',
            'tipe' => 'required|in_list[benefit,cost]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/admin/kriteria')->withInput()->with('errors', $validation->getErrors());
        }

        $bobotBaru = (float) $this->request->getPost('bobot');
        $totalBobot = array_sum(array_column($this->kriteriaModel->findAll(), 'bobot'));

        if (($totalBobot + $bobotBaru) > 1.00) {
            return redirect()->to('/admin/kriteria')->withInput()->with('error', 'Total bobot kriteria tidak boleh lebih dari 1.00.');
        }

        $this->kriteriaModel->insert([
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot' => $bobotBaru,
            'tipe' => $this->request->getPost('tipe'),
        ]);

        session()->setFlashdata('success', 'Kriteria berhasil ditambahkan.');
        return redirect()->to('/admin/kriteria');
    }

    // Update data kriteria
    public function update($id = null)
    {
        if ($id === null) {
            return redirect()->to('/admin/kriteria')->with('error', 'ID kriteria tidak valid.');
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_kriteria' => 'required|trim',
            'bobot' => 'required|decimal|greater_than[0]|less_than_equal_to[1]',
            'tipe' => 'required|in_list[benefit,cost]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/admin/kriteria/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        $kriteriaLama = $this->kriteriaModel->find($id);
        if (!$kriteriaLama) {
            return redirect()->to('/admin/kriteria')->with('error', 'Kriteria tidak ditemukan.');
        }

        $bobotBaru = (float) $this->request->getPost('bobot');

        $totalBobotLain = array_sum(array_map(function ($k) use ($id) {
            return $k['id_kriteria'] == $id ? 0 : $k['bobot'];
        }, $this->kriteriaModel->findAll()));

        if (($totalBobotLain + $bobotBaru) > 1.00) {
            return redirect()->to('/admin/kriteria/edit/' . $id)->withInput()->with('error', 'Total bobot kriteria tidak boleh lebih dari 1.00.');
        }

        $this->kriteriaModel->update($id, [
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot' => $bobotBaru,
            'tipe' => $this->request->getPost('tipe'),
        ]);

        session()->setFlashdata('success', 'Kriteria berhasil diperbarui.');
        return redirect()->to('/admin/kriteria');
    }

    // Hapus data
    public function delete($id = null)
    {
        if (!$this->kriteriaModel->find($id)) {
            return redirect()->to('/admin/kriteria')->with('error', 'Kriteria tidak ditemukan.');
        }

        $this->kriteriaModel->delete($id);
        session()->setFlashdata('success', 'Kriteria berhasil dihapus.');
        return redirect()->to('/admin/kriteria');
    }
}
