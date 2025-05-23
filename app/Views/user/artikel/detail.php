<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<style>
    body {
        background-color: #f4f4f4;
    }
    .content-wrapper {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }
    .recommendation-card {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
</style>

<?php
$defaultImage = base_url('assets-baru/img/error_logo.png');
$imagePath = 'assets-baru/img/foto_artikel/' . $artikel->foto;
$imageToDisplay = (!empty($artikel->foto) && file_exists(FCPATH . $imagePath)) ? base_url($imagePath) : $defaultImage;
?>

<div class="container mt-4 mb-5">
    <div class="row g-4">
        <!-- Konten Utama -->
        <div class="col-md-8">
            <div class="content-wrapper">
                <img src="<?= $imageToDisplay ?>" class="img-fluid rounded mb-3" alt="<?= esc($artikel->judul_artikel) ?>" style="height: 400px; width: 100%; object-fit: cover;">
                <h2 class="card-title"><?= esc($artikel->judul_artikel) ?></h2>
                <p class="text-muted"><small><i class="fa fa-calendar"></i> 
                    <?= isset($artikel->tanggal_publish) ? date('d F Y', strtotime($artikel->tanggal_publish)) : '-' ?>
                </small></p>
                <div class="card-text mt-3">
                    <?= $artikel->deskripsi ?> <!-- Tidak di-escape karena mengandung HTML -->
                </div>
            </div>
        </div>

        <!-- Sidebar Rekomendasi -->
        <div class="col-md-4">
            <div class="recommendation-card">
                <h5 class="mb-3">Artikel Lainnya</h5>
                <div class="d-flex flex-column gap-2">
                    <?php foreach ($rekomendasi ?? [] as $item): ?>
                        <?php
                        $imgPath = 'assets-baru/img/foto_artikel/' . $item->foto;
                        $imgDisplay = (!empty($item->foto) && file_exists(FCPATH . $imgPath)) ? base_url($imgPath) : $defaultImage;
                        ?>
                        <a href="<?= base_url('artikel/detail/' . $item->id) ?>" class="text-decoration-none text-dark">
                            <div class="d-flex align-items-center p-2 rounded shadow-sm bg-light" style="cursor: pointer;">
                                <img src="<?= $imgDisplay ?>" alt="<?= esc($item->judul_artikel) ?>" style="width: 70px; height: 70px; object-fit: cover;" class="rounded">
                                <div class="ms-3">
                                    <h6 class="mb-1"><?= esc($item->judul_artikel) ?></h6>
                                    <p class="text-muted small mb-0"><?= substr(strip_tags($item->deskripsi_artikel), 0, 50) . '...' ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
