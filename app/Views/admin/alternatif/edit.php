<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h4 class="mb-4">Edit Data Alternatif</h4>

<div class="container px-4" style="max-width: 700px;">
    <form action="<?= base_url('admin/alternatif/update/' . $alternatif['id_alternatif']) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group mb-3">
            <label for="id_kriteria">Kriteria</label>
            <select name="id_kriteria" id="id_kriteria" class="form-control" required>
                <?php foreach ($kriteria as $k): ?>
                    <option value="<?= $k['id_kriteria'] ?>" <?= $k['id_kriteria'] == $alternatif['id_kriteria'] ? 'selected' : '' ?>>
                        <?= $k['nama_kriteria'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="id_subkriteria">Subkriteria</label>
            <select name="id_subkriteria" id="id_subkriteria" class="form-control" required>
                <?php foreach ($subkriteria as $s): ?>
                    <option value="<?= $s['id_subkriteria'] ?>" <?= $s['id_subkriteria'] == $alternatif['id_subkriteria'] ? 'selected' : '' ?>>
                        <?= $s['nama_subkriteria'] ?> (<?= $s['nilai'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="nama_wisata">Nama Tempat Wisata</label>
            <input type="text" name="nama_wisata" id="nama_wisata" value="<?= $alternatif['nama_wisata'] ?>" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required rows="4"><?= $alternatif['deskripsi'] ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="foto">Foto</label>
            <?php if (!empty($alternatif['foto'])): ?>
                <div class="mb-2">
                    <img src="<?= base_url('uploads/' . $alternatif['foto']) ?>" alt="Foto" width="150">
                </div>
            <?php endif; ?>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>

        <div class="form-group mb-4">
            <label for="sumber_foto">Sumber Foto</label>
            <input type="text" name="sumber_foto" id="sumber_foto" value="<?= $alternatif['sumber_foto'] ?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="<?= base_url('admin/alternatif') ?>" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>
