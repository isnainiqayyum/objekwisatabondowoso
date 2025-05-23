<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<style>
    body {
        background-color: #e9ecef;
    }

    .section-wrapper {
        background-color: #f5f5f5;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .artikel-card {
        border-radius: 15px;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
    }

    .artikel-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
    }

    .artikel-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .artikel-link {
        display: block;
        text-decoration: none !important;
        color: inherit !important;
    }

    .artikel-link * ,
    .artikel-link *:hover,
    .artikel-link *:visited,
    .artikel-link *:active,
    .artikel-link *:focus {
        color: inherit !important;
        text-decoration: none !important;
    }

    /* Form & Button */
    .form-control {
        border-radius: 10px;
    }

    .btn-primary,
    .btn-secondary {
        border-radius: 10px;
        font-weight: 600;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    /* Hapus garis bawah / border pada badge di card wisata */
    .artikel-card .badge {
        border-bottom: none !important;
        box-shadow: none !important;
        text-decoration: none !important;
    }
</style>

<div class="container mt-4 mb-5">
    <div class="section-wrapper">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="section-title">
                    <h4 id="sectionTitle" class="m-0 text-uppercase font-weight-bold">
                        <?= esc($title); ?>
                    </h4>
                </div>
            </div>

            <!-- Filter Kategori -->
            <div class="col-12 mb-4">
                <form method="get" action="<?= base_url('user/wisata/index') ?>">
                    <div class="row">
                        <div class="col-md-10 mb-2">
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Semua Kategori</option>
                                <?php foreach ($kategoriwisata as $kategori) : ?>
                                    <option value="<?= esc($kategori['id_subkriteria']) ?>" <?= (isset($_GET['kategori']) && $_GET['kategori'] == $kategori['id_subkriteria']) ? 'selected' : '' ?>>
                                        <?= esc($kategori['nama_subkriteria']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                            <a href="<?= base_url('user/wisata/index') ?>" class="btn btn-secondary w-100 mt-2">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Daftar Wisata -->
            <?php if (!empty($tempatwisata) && is_array($tempatwisata)) : ?>
                <?php foreach ($tempatwisata as $wisata) : ?>
                    <div class="col-lg-4 mb-3">
                        <div class="artikel-card h-100">
                            <a class="artikel-link" href="<?= base_url('user/wisata/detail/' . $wisata['id_alternatif']) ?>">
                                <?php
                                $defaultImage = base_url('assets-baru/img/error_logo.png');
                                $imagePath = 'asset-user/uploads/foto_wisata/' . $wisata['foto'];
                                $imageToDisplay = (!empty($wisata['foto']) && file_exists(FCPATH . $imagePath)) ? base_url($imagePath) : $defaultImage;
                                ?>
                                <img src="<?= esc($imageToDisplay) ?>" alt="<?= esc($wisata['nama_wisata']) ?>" loading="lazy">
                                <div class="bg-white border border-top-0 p-4 flex-grow-1">
                                    <div class="mb-2">
                                        <span class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">
                                            <?= esc($wisata['nama_subkriteria']) ?>
                                        </span>
                                    </div>
                                    <h4 class="d-block mb-3 text-secondary font-weight-bold">
                                        <?= esc($wisata['nama_wisata']) ?>
                                    </h4>
                                    <p><?= esc(substr(strip_tags($wisata['deskripsi']), 0, 100)); ?>...</p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12">
                    <p>Data wisata tidak tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
