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

        <div class="row row-cols-1 row-cols-md-2 g-4 mb-4">
            <!-- Data Wisata -->
            <div class="col">
                <div class="app-card app-card-stat shadow-sm h-100 card-wisata">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Data Wisata</h4>
                        <div class="stats-figure"><?= $total_wisata ?></div>
                        <div class="stats-meta">Updated</div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/ObjekWisataController/index') ?>"></a>
                </div>
            </div>

            <!-- Data Rekomendasi -->
            <div class="col">
                <div class="app-card app-card-stat shadow-sm h-100 card-rekom">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Data Rekomendasi</h4>
                        <div class="stats-figure"><?= $total_rekomendasi ?></div>
                        <div class="stats-meta">Updated</div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('user/RekomendasiController/index') ?>"></a>
                </div>
            </div>

            <!-- Data Kriteria -->
            <div class="col">
                <div class="app-card app-card-stat shadow-sm h-100 card-kriteria">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Data Kriteria</h4>
                        <div class="stats-figure"><?= $total_kriteria ?></div>
                        <div class="stats-meta">Updated</div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/kriteria/index') ?>"></a>
                </div>
            </div>

            <!-- Data Sub Kriteria -->
            <div class="col">
                <div class="app-card app-card-stat shadow-sm h-100 card-sub">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Data Sub Kriteria</h4>
                        <div class="stats-figure"><?= $total_subkriteria ?></div>
                        <div class="stats-meta">Updated</div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/subkriteria/index') ?>"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Style khusus untuk dashboard -->
<style>
    .app-card-stat {
        border-radius: 16px;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        background: #f8f9fa;
        position: relative;
    }

    .app-card-stat:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .app-card-stat .stats-figure {
        font-size: 2.2rem;
        font-weight: bold;
        color: #007bff;
    }

    .app-card-stat .stats-type {
        font-size: 1.1rem;
        font-weight: 500;
        color: #333;
    }

    .app-card-stat .stats-meta {
        font-size: 0.85rem;
        color: #28a745;
    }

    .card-wisata {
        background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
    }

    .card-rekom {
        background: linear-gradient(135deg, #f1f8e9, #dcedc8);
    }

    .card-kriteria {
        background: linear-gradient(135deg, #fff3e0, #ffe0b2);
    }

    .card-sub {
        background: linear-gradient(135deg, #fce4ec, #f8bbd0);
    }

    .app-card-link-mask {
        position: absolute;
        inset: 0;
        z-index: 1;
    }

    .app-card-stat .app-card-body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        text-align: center;
    }

</style>

<?= $this->endSection('content') ?>
