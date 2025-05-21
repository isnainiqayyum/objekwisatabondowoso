<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container px-4 py-4">
    <h4 class="mb-4">Data Subkriteria</h4>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="row">
        <!-- Form Create / Edit subkriteria kiri -->
        <div class="col-md-5">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <?= isset($subkriteriaToEdit) ? 'Edit Subkriteria' : 'Tambah Subkriteria' ?>
                </div>
                <div class="card-body">
                    <?php $errors = session()->getFlashdata('errors'); ?>

                    <form action="<?= isset($subkriteriaToEdit) ? base_url('admin/subkriteria/update/'.$subkriteriaToEdit['id_subkriteria']) : base_url('admin/subkriteria/store') ?>" method="post" novalidate>
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="id_kriteria" class="form-label">Kriteria</label>
                            <select name="id_kriteria" id="id_kriteria" class="form-control <?= isset($errors['id_kriteria']) ? 'is-invalid' : '' ?>" required>
                                <option value="">-- Pilih Kriteria --</option>
                                <?php foreach ($kriteria as $k): ?>
                                    <option value="<?= $k['id_kriteria'] ?>" 
                                        <?= old('id_kriteria', isset($subkriteriaToEdit) ? $subkriteriaToEdit['id_kriteria'] : '') == $k['id_kriteria'] ? 'selected' : '' ?>>
                                        <?= $k['nama_kriteria'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['id_kriteria'])): ?>
                                <div class="invalid-feedback"><?= $errors['id_kriteria'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="nama_subkriteria" class="form-label">Nama Subkriteria</label>
                            <input type="text" name="nama_subkriteria" id="nama_subkriteria" class="form-control <?= isset($errors['nama_subkriteria']) ? 'is-invalid' : '' ?>"
                                value="<?= old('nama_subkriteria', isset($subkriteriaToEdit) ? $subkriteriaToEdit['nama_subkriteria'] : '') ?>" required>
                            <?php if(isset($errors['nama_subkriteria'])): ?>
                                <div class="invalid-feedback"><?= $errors['nama_subkriteria'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="nilai" class="form-label">Nilai</label>
                            <input type="number" step="0.01" name="nilai" id="nilai" class="form-control <?= isset($errors['nilai']) ? 'is-invalid' : '' ?>"
                                value="<?= old('nilai', isset($subkriteriaToEdit) ? $subkriteriaToEdit['nilai'] : '') ?>" required>
                            <?php if(isset($errors['nilai'])): ?>
                                <div class="invalid-feedback"><?= $errors['nilai'] ?></div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-success"><?= isset($subkriteriaToEdit) ? 'Update' : 'Simpan' ?></button>
                        <?php if(isset($subkriteriaToEdit)): ?>
                            <a href="<?= base_url('admin/subkriteria') ?>" class="btn btn-secondary">Batal</a>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel subkriteria kanan -->
        <!-- Tabel subkriteria kanan -->
<div class="col-md-7">
    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width:5%;">No</th>
                    <th style="width:15%;">ID Kriteria</th>
                    <th style="width:45%;">Nama Subkriteria</th>
                    <th style="width:15%;">Nilai</th>
                    <th style="width:20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($subkriteria)): ?>
                    <tr><td colspan="5" class="text-center">Data subkriteria tidak ditemukan.</td></tr>
                <?php else: ?>
                    <?php foreach($subkriteria as $i => $sub): ?>
                        <tr>
                            <td><?= $i + 1 + ($pager->getCurrentPage() - 1) * $pager->getPerPage() ?></td>
                            <td><?= esc($sub['id_kriteria']) ?></td>
                            <td><?= esc($sub['nama_subkriteria']) ?></td>
                            <td><?= esc($sub['nilai']) ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= base_url('admin/subkriteria/edit/'.$sub['id_subkriteria']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="<?= base_url('admin/subkriteria/delete/'.$sub['id_subkriteria']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin hapus subkriteria ini?');">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3">
    <!-- Tombol Prev (kiri) -->
    <div>
        <?php if ($pager->getCurrentPage() > 1) : ?>
            <a href="<?= $pager->getPageURI($pager->getCurrentPage() - 1) ?>" class="btn btn-outline-primary">&lt; Sebelumnya</a>
        <?php endif; ?>
    </div>

    <!-- Info halaman -->
    <div>
        Halaman <?= $pager->getCurrentPage() ?> dari <?= $pager->getPageCount() ?>
    </div>

    <!-- Tombol Next (kanan) -->
    <div>
        <?php if ($pager->getCurrentPage() < $pager->getPageCount()) : ?>
            <a href="<?= $pager->getPageURI($pager->getCurrentPage() + 1) ?>" class="btn btn-outline-primary">Selanjutnya &gt;</a>
        <?php endif; ?>
    </div>
</div>

    </div>
</div>
    </div>
</div>

<?= $this->endSection() ?>
