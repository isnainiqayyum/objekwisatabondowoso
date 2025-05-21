<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container px-4">
    <h4 class="mb-4">Tambah Penilaian</h4>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/penilaian/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-4">
            <label for="id_alternatif" class="form-label">Alternatif</label>
            <select name="id_alternatif" id="id_alternatif" class="form-select" required>
                <option value="">-- Pilih Alternatif --</option>
                <?php foreach($alternatif as $alt): ?>
                    <option value="<?= $alt['id_alternatif'] ?>" <?= old('id_alternatif') == $alt['id_alternatif'] ? 'selected' : '' ?>>
                        <?= esc($alt['nama_wisata']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <?php foreach($kriteria as $k): ?>
            <div class="mb-4">
                <label class="form-label fw-semibold"><?= esc($k['nama_kriteria']) ?></label>

                <?php 
                    $subs = array_filter($subkriteria, fn($s) => $s['id_kriteria'] == $k['id_kriteria']); 
                ?>

                <?php if (in_array($k['nama_kriteria'], ['Fasilitas', 'Akses Kendaraan'])): ?>
                    <div class="d-flex flex-wrap gap-3">
                        <?php foreach($subs as $sub): ?>
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="subkriteria[<?= $k['id_kriteria'] ?>][]" 
                                    id="sub_<?= $sub['id_subkriteria'] ?>" 
                                    value="<?= $sub['id_subkriteria'] ?>"
                                    <?= (isset(old('subkriteria')[$k['id_kriteria']]) && in_array($sub['id_subkriteria'], old('subkriteria')[$k['id_kriteria']])) ? 'checked' : '' ?>
                                >
                                <label class="form-check-label" for="sub_<?= $sub['id_subkriteria'] ?>">
                                    <?= esc($sub['nama_subkriteria']) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <select 
                        name="subkriteria[<?= $k['id_kriteria'] ?>]" 
                        class="form-select" 
                        required
                    >
                        <option value="">-- Pilih Subkriteria --</option>
                        <?php foreach($subs as $sub): ?>
                            <option 
                                value="<?= $sub['id_subkriteria'] ?>"
                                <?= (old('subkriteria')[$k['id_kriteria']] ?? '') == $sub['id_subkriteria'] ? 'selected' : '' ?>
                            >
                                <?= esc($sub['nama_subkriteria']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="btn btn-primary mt-3">Tambah Penilaian</button>
    </form>
</div>

<?= $this->endSection() ?>
