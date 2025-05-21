<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Dashboard</h1>
        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
            <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="mb-3">Welcome, Admin!</h3>
                    <div class="row gx-5 gy-3">
                        <div class="col-12 col-lg-9">
                            <div>
                                Ini adalah halaman Admin untuk mengatur rekomendasi wisata Bondowoso.
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <!-- Data Wisata -->
            <div class="col-6 col-lg-6">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Data Wisata</h4>
                        <div class="stats-figure"><?= $total_wisata ?></div>
                        <div class="stats-meta text-success">Updated</div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/ObjekWisataController/index') ?>"></a>
                </div>
            </div>

            <!-- Data Rekomendasi -->
            <div class="col-6 col-lg-6">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Data Rekomendasi</h4>
                        <div class="stats-figure"><?= $total_rekomendasi ?></div>
                        <div class="stats-meta text-success">Updated</div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('user/RekomendasiController/index') ?>"></a>
                </div>
            </div>

            <!-- Data Kriteria -->
            <div class="col-6 col-lg-6">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Data Kriteria</h4>
                        <div class="stats-figure"><?= $total_kriteria ?></div>
                        <div class="stats-meta text-success">Updated</div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/kriteria/index') ?>"></a>
                </div>
            </div>

            <!-- Data Sub Kriteria -->
            <div class="col-6 col-lg-6">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Data Sub Kriteria</h4>
                        <div class="stats-figure"><?= $total_subkriteria ?></div>
                        <div class="stats-meta text-success">Updated</div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/subkriteria/index') ?>"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content') ?>
