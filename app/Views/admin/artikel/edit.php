<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Artikel</h1>
        <hr class="mb-4">

        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/artikel/proses_edit/' . $artikelData->id) ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label class="form-label">Judul Artikel</label>
                                <input type="text" class="form-control" name="judul_artikel" value="<?= esc($artikelData->judul_artikel) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Artikel</label>
                                <textarea class="form-control" name="deskripsi" rows="10" required><?= esc($artikelData->deskripsi) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sumber Foto</label>
                                <input type="text" class="form-control" name="sumber_foto" value="<?= esc($artikelData->sumber_foto) ?>" placeholder="Sumber Foto Artikel">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Artikel</label><br>
                                <img src="<?= base_url('assets-baru/img/foto_artikel/' . $artikelData->foto) ?>" alt="Foto Artikel" width="200" class="mb-3 img-thumbnail">
                                <input type="file" class="form-control" name="foto" accept=".jpg,.jpeg,.png,.gif,.jfif,.webp">
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Publish</label>
                                <input type="date" class="form-control" name="tanggal_publish" value="<?= esc($artikelData->tanggal_publish) ?>" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="<?= base_url('admin/artikel') ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
