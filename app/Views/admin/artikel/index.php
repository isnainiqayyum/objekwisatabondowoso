<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Informasi Terbaru</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('admin/artikel/tambah') ?>" class="btn btn-primary me-md-2">+ Tambah Informasi</a>
                <a href="<?= base_url('admin/artikel/hapus_semua') ?>" class="btn btn-danger me-md-2">Hapus Semua Informasi</a>
            </div>
        </div>

        <!-- Date Filter Form -->
        <form method="get" action="<?= base_url('admin/artikel') ?>" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : '' ?>">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">Tanggal Akhir</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : '' ?>">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100 me-2">Filter</button>
                    <a href="<?= base_url('admin/artikel') ?>" class="btn btn-secondary w-100">Tampilkan Semua</a>
                </div>
            </div>
        </form>

        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead class="atas">
                                    <tr>
                                        <th class="text-center" valign="middle">No</th>
                                        <th class="text-center" valign="middle">Judul Informasi</th>
                                        <th class="text-center" valign="middle">Deskripsi Informasi</th>
                                        <th class="text-center" valign="middle">Foto</th>
                                        <th class="text-center" valign="middle">Sumber Foto</th>
                                        <th class="text-center" valign="middle">Tanggal Publish</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($all_data_artikel as $artikel) : ?>
                                        <?php
                                        $startDate = isset($_GET['start_date']) ? $_GET['start_date'] : null;
                                        $endDate = isset($_GET['end_date']) ? $_GET['end_date'] : null;
                                        $tanggalPublish = $artikel->tanggal_publish;

                                        if (
                                            ($startDate && $tanggalPublish < $startDate) ||
                                            ($endDate && $tanggalPublish > $endDate)
                                        ) {
                                            continue;
                                        }
                                        ?>
                                        <tr>
                                            <td class="text-center" valign="middle"><?= $i++ ?></td>
                                            <td class="text-center" valign="middle"><?= esc($artikel->judul_artikel) ?></td>
                                            <td class="text-center col-4" valign="middle"><?= substr(strip_tags($artikel->deskripsi), 0, 60) . '...' ?></td>
                                            <td class="text-center" valign="middle">
                                                <img src="<?= base_url('assets-baru/img/foto_artikel/' . ($artikel->foto ?? 'default.jpg')) ?>" class="img-fluid" alt="Foto Artikel">
                                            </td>
                                            <td class="text-center" valign="middle"><?= esc($artikel->sumber_foto) ?></td>
                                            <td class="text-center" valign="middle"><?= esc($tanggalPublish) ?></td>
                                            <td valign="middle">
                                                <div class="d-grid gap-2">
                                                    <a href="<?= base_url('admin/artikel/delete/' . $artikel->id) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                                    <a href="<?= base_url('admin/artikel/edit/' . $artikel->id) ?>" class="btn btn-primary">Ubah</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
