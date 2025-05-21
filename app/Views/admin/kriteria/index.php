<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container px-4 py-4">
    <h4 class="mb-4">Data Kriteria</h4>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="row">
        <!-- Form Create / Edit kiri -->
        <div class="col-md-5">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <?= isset($kriteriaToEdit) ? 'Edit Kriteria' : 'Tambah Kriteria' ?>
                </div>
                <div class="card-body">
                    <?php $errors = session()->getFlashdata('errors'); ?>

                    <form action="<?= isset($kriteriaToEdit) ? base_url('admin/kriteria/update/'.$kriteriaToEdit['id_kriteria']) : base_url('admin/kriteria/store') ?>" method="post" novalidate>
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control <?= isset($errors['nama_kriteria']) ? 'is-invalid' : '' ?>"
                                value="<?= old('nama_kriteria', isset($kriteriaToEdit) ? $kriteriaToEdit['nama_kriteria'] : '') ?>">
                            <?php if(isset($errors['nama_kriteria'])): ?>
                                <div class="invalid-feedback"><?= $errors['nama_kriteria'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="bobot" class="form-label">Bobot (0.01 - 1.00)</label>
                            <input type="number" step="0.01" min="0.01" max="1.00" name="bobot" id="bobot" class="form-control <?= isset($errors['bobot']) ? 'is-invalid' : '' ?>"
                                value="<?= old('bobot', isset($kriteriaToEdit) ? $kriteriaToEdit['bobot'] : '') ?>">
                            <?php if(isset($errors['bobot'])): ?>
                                <div class="invalid-feedback"><?= $errors['bobot'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="tipe" class="form-label">Tipe</label>
                            <select name="tipe" id="tipe" class="form-select <?= isset($errors['tipe']) ? 'is-invalid' : '' ?>">
                                <option value="" disabled <?= old('tipe', isset($kriteriaToEdit) ? $kriteriaToEdit['tipe'] : '') ? '' : 'selected' ?>>-- Pilih Tipe --</option>
                                <option value="benefit" <?= old('tipe', isset($kriteriaToEdit) ? $kriteriaToEdit['tipe'] : '') == 'benefit' ? 'selected' : '' ?>>Benefit</option>
                                <option value="cost" <?= old('tipe', isset($kriteriaToEdit) ? $kriteriaToEdit['tipe'] : '') == 'cost' ? 'selected' : '' ?>>Cost</option>
                            </select>
                            <?php if(isset($errors['tipe'])): ?>
                                <div class="invalid-feedback"><?= $errors['tipe'] ?></div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-success"><?= isset($kriteriaToEdit) ? 'Update' : 'Simpan' ?></button>
                        <?php if(isset($kriteriaToEdit)): ?>
                            <a href="<?= base_url('admin/kriteria') ?>" class="btn btn-secondary">Batal</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Kriteria kanan -->
        <div class="col-md-7">
            <div class="table-responsive shadow-sm">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th style="width:5%;">No</th>
                            <th style="width:45%;">Nama Kriteria</th>
                            <th style="width:15%;">Bobot</th>
                            <th style="width:15%;">Tipe</th>
                            <th style="width:20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($kriteria)): ?>
                            <tr><td colspan="5" class="text-center">Data kriteria tidak ditemukan.</td></tr>
                        <?php else: ?>
                            <?php foreach($kriteria as $i => $k): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= esc($k['nama_kriteria']) ?></td>
                                    <td><?= number_format($k['bobot'], 2) ?></td>
                                    <td><?= ucfirst(esc($k['tipe'])) ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Aksi Kriteria">
                                            <a href="<?= base_url('admin/kriteria/index/'.$k['id_kriteria']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= base_url('admin/kriteria/delete/'.$k['id_kriteria']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kriteria ini?')">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
