<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h4 class="mb-4">Tambah Data Alternatif</h4>

<div class="container px-4" style="max-width: 700px;">

    <!-- Tampilkan pesan error validasi jika ada -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/alternatif/simpan') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group mb-3">
            <label for="id_kriteria">Kriteria</label>
            <select name="id_kriteria" id="id_kriteria" class="form-control" required>
                <option value="">-- Pilih Kriteria --</option>
                <?php foreach ($kriteria as $k): ?>
                    <option value="<?= $k['id_kriteria'] ?>" <?= old('id_kriteria') == $k['id_kriteria'] ? 'selected' : '' ?>>
                        <?= esc($k['nama_kriteria']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="id_subkriteria">Subkriteria</label>
            <select name="id_subkriteria" id="id_subkriteria" class="form-control" required>
                <option value="">-- Pilih Subkriteria --</option>
                <?php foreach ($subkriteria as $s): ?>
                    <option value="<?= $s['id_subkriteria'] ?>" <?= old('id_subkriteria') == $s['id_subkriteria'] ? 'selected' : '' ?>>
                        <?= esc($s['nama_subkriteria']) ?> (<?= esc($s['nilai']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="nama_wisata">Nama Tempat Wisata</label>
            <input type="text" name="nama_wisata" id="nama_wisata" class="form-control" value="<?= old('nama_wisata') ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required><?= old('deskripsi') ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>

        <div class="form-group mb-4">
            <label for="sumber_foto">Sumber Foto</label>
            <input type="text" name="sumber_foto" id="sumber_foto" class="form-control" value="<?= old('sumber_foto') ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('admin/alternatif') ?>" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>
