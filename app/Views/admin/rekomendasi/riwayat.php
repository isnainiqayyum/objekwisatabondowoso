<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h1 class="mb-4"><?= esc($judul) ?></h1>

    <!-- Form Search -->
    <form action="" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama Lengkap" value="<?= esc($search ?? '') ?>">
            <button class="btn btn-primary" type="submit">Cari</button>
            <?php if (!empty($search)) : ?>
                <a href="<?= base_url('admin/rekomendasi/riwayat') ?>" class="btn btn-secondary">Reset</a>
            <?php endif; ?>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Objek Wisata</th>
                    <th>Jarak Tempuh</th>
                    <th>Harga Tiket</th>
                    <th>Jam Kunjung</th>
                    <th>Fasilitas</th>
                    <th>Akses Kendaraan</th>
                    <th>Hasil 1</th>
                    <th>Hasil 2</th>
                    <th>Hasil 3</th>
                    <th>Waktu Submit</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($rekomendasi)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($rekomendasi as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['nama_lengkap'] ?? '-') ?></td>
                            <td><?= esc($row['objek_wisata']) ?></td>
                            <td><?= esc($row['jarak_tempuh']) ?></td>
                            <td><?= esc($row['harga_tiket']) ?></td>
                            <td><?= esc($row['jam_kunjung']) ?></td>
                            <td><?= esc($row['fasilitas']) ?></td>
                            <td><?= esc($row['akses_kendaraan']) ?></td>
                            <td><?= esc($row['hasil_1']) ?></td>
                            <td><?= esc($row['hasil_2']) ?></td>
                            <td><?= esc($row['hasil_3']) ?></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($row['waktu'])) ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr><td colspan="12" class="text-center">Belum ada data riwayat.</td></tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
