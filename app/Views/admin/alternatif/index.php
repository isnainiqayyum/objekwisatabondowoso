<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container px-4"> <!-- kasih padding kanan kiri -->
    <h4 class="mb-4">Data Alternatif</h4>

    <a href="<?= base_url('admin/alternatif/create') ?>" class="btn btn-primary mb-3">Tambah Alternatif</a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive"> <!-- supaya tabel scroll di layar kecil -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width:3%;">No</th>
                    <th style="width:20%;">Nama Wisata</th>
                    <th style="width:10%;">Deskripsi</th>
                    <th style="width:15%;">Foto</th>
                    <th style="width:15%;">Sumber Foto</th>
                    <th style="width:15%;">Kriteria</th>
                    <th style="width:10%;">Subkriteria (Nilai)</th>
                    <th style="width:12%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alternatif as $i => $a): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($a['nama_wisata']) ?></td>
                        <td><?= esc($a['deskripsi']) ?></td>
                        <td>
                            <?php if ($a['foto']): ?>
                                <img src="<?= base_url('asset-user/uploads/foto_wisata/' . $a['foto']) ?>" alt="Foto Wisata" style="max-width: 100px;">
                            <?php else: ?>
                                <span>Tidak ada foto</span>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($a['sumber_foto']) ?></td>
                        <td><?= esc($a['nama_kriteria']) ?></td>
                        <td><?= esc($a['nilai']) ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Aksi Alternatif">
                                <a href="<?= base_url('admin/alternatif/edit/' . $a['id_alternatif']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= base_url('admin/alternatif/delete/' . $a['id_alternatif']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
