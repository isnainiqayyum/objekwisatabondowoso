<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-12 mt-5">
            <div class="section-title">
                <h4 id="sectionTitle" class="m-0 text-uppercase font-weight-bold">
                    <?= esc($title); ?>
                </h4>
            </div>
        </div>

        <!-- Filter Kategori Wisata -->
        <div class="col-12 mb-4">
            <form method="get" action="<?= base_url('wisata') ?>">
                <div class="row">
                    <!-- Kategori Wisata -->
                    <div class="col-md-10 mb-2">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">Semua Kategori</option>
                            <?php foreach ($kategoriwisata as $kategori) : ?>
                                <option value="<?= esc($kategori['id_subkriteria']) ?>" <?= (isset($_GET['kategori']) && $_GET['kategori'] == $kategori['id_sub_kriteria']) ? 'selected' : '' ?>>
                                    <?= esc($kategori['nama_subkriteria']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Tombol Filter -->
                    <div class="col-md-2 mb-2 align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                        <a href="<?= base_url('wisata') ?>" class="btn btn-secondary w-100 mt-2">Reset</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Display wisata -->
        <?php if (!empty($tempatwisata) && is_array($tempatwisata)) : ?>
            <?php foreach ($tempatwisata as $wisata) : ?>
                <div class="col-lg-4 mb-3">
                    <div class="artikel-card position-relative d-flex flex-column h-100 mb-3">
                        <a class="artikel-link" href="<?= base_url('wisata/detail/' . $wisata['id_alternatif']) ?>">
                            <?php
                            $defaultImage = base_url('assets-baru/img/error_logo.png');
                            $imagePath = 'asset-user/uploads/foto_wisata/' . $wisata['foto'];
                            $imageToDisplay = file_exists(FCPATH . $imagePath) && !empty($wisatafoto) ? base_url($imagePath) : $defaultImage;
                            ?>

                            <img class="img-fluid w-100" style="object-fit: cover;"
                                src="<?= esc($imageToDisplay) ?>"
                                alt="<?= esc($wisata['nama_wisata']) ?>"
                                loading="lazy">

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

                                <p class="text-muted small mb-1">
                                    Sumber Foto: <?= esc($wisata['sumber_foto'] ?? 'Tidak ada sumber') ?>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No wisata data available.</p>
        <?php endif; ?>
    </div>
<style>
    /* Styling card article */
    .artikel-card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
        /* Ensures that the overflow is hidden */
    }

    .artikel-card img {
        width: 100%;
        /* Make the image fill the card width */
        height: 200px;
        /* Set a fixed height for uniformity */
        object-fit: cover;
        /* Ensure the image covers the area */
    }

    .artikel-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Membuat link untuk seluruh card */
    .artikel-link {
        display: block;
        text-decoration: none;
        color: inherit;
    }

    /* Menambahkan transisi pada views-counter */
    .views-counter {
        color: #0091EA;
        transition: color 0.3s;
    }

    .location {
        display: flex;
        align-items: center;
        /* Center-align icon and text vertically */
    }

    .location i {
        margin-right: 8px;
        /* Spacing between icon and text */
    }

    .location-details {
        display: flex;
        flex-direction: column;
        /* Stack text elements vertically */
    }

    .kabupaten,
    .provinsi {
        display: block;
    }

    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    /* Pagination Styling */
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        margin: 0 5px;
        /* Jarak antar tombol */
    }

    .pagination a {
        display: inline-block;
        padding: 10px 15px;
        text-decoration: none;
        color: #007bff;
        font-size: 16px;
        font-weight: 600;
        border: 1px solid #ddd;
        background-color: #fff;
        transition: all 0.3s ease;
        border-radius: 5px;
        /* Sedikit lengkungan */
    }

    /* Hover Effect */
    .pagination a:hover {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    /* Active Page Styling */
    .pagination .active a {
        background-color: #007bff;
        /* Warna latar tombol aktif */
        color: #fff;
        /* Warna teks putih pada tombol aktif */
        border-color: #007bff;
        /* Border warna aktif */
        font-weight: bold;
        /* Menebalkan teks pada tombol aktif */
    }

    /* Disabled State */
    .pagination .disabled a {
        background-color: #f8f9fa;
        color: #6c757d;
        border-color: #ddd;
        cursor: not-allowed;
    }
</style>

<?= $this->endSection('content'); ?>