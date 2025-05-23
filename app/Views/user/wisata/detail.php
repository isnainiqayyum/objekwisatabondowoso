<?= $this->extend('user/template/template'); ?>
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

<div class="container mt-4 mb-5">
    <div class="row g-4">
        <!-- Konten Utama -->
        <?php
        $defaultImage = base_url('assets-baru/img/error_logo.png');

        // Path dan pengecekan gambar utama
        $imagePath = 'asset-user/uploads/foto_wisata/' . $wisata['foto'];
        $imageToDisplay = (!empty($wisata['foto']) && file_exists(FCPATH . $imagePath)) ? base_url($imagePath) : $defaultImage;
        ?>

        <!-- CARD UTAMA -->
        <div class="col-md-8">
            <div class="content-wrapper">
                <img src="<?= $imageToDisplay ?>" class="img-fluid rounded mb-3" alt="<?= esc($wisata['nama_wisata']) ?>" style="height: 400px; width: 100%; object-fit: cover;">
                <h2 class="card-title"><?= esc($wisata['nama_wisata']) ?></h2>
                <p class="card-text mt-3"><?= esc($wisata['deskripsi']) ?></p>
            </div>
        </div>

        <!-- SIDEBAR REKOMENDASI -->
        <div class="col-md-4">
            <div class="recommendation-card">
                <h5 class="mb-3">Rekomendasi Wisata Lainnya</h5>
                <div class="d-flex flex-column gap-2">
                    <?php foreach ($randomWisata as $item):
                        $sidebarImagePath = 'asset-user/uploads/foto_wisata/' . $item['foto'];
                        $sidebarImageToDisplay = (!empty($item['foto']) && file_exists(FCPATH . $sidebarImagePath)) ? base_url($sidebarImagePath) : $defaultImage;
                    ?>
                        <a href="<?= base_url('user/wisata/detail/' . $item['id_alternatif']) ?>" class="text-decoration-none text-dark">
                            <div class="d-flex align-items-center p-2 rounded shadow-sm bg-light" style="cursor: pointer;">
                                <img src="<?= $sidebarImageToDisplay ?>" alt="<?= esc($item['nama_wisata']) ?>" style="width: 70px; height: 70px; object-fit: cover;" class="rounded">
                                <div class="ms-3">
                                    <h6 class="mb-1"><?= esc($item['nama_wisata']) ?></h6>
                                    <p class="text-muted small mb-0"><?= substr(strip_tags($item['deskripsi']), 0, 50) . '...' ?></p>
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
