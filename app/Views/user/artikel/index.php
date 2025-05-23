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

    /* FIX: Menghapus efek biru + underline default dari link */
    .artikel-link {
        display: block;
        text-decoration: none !important;
        color: inherit !important;
    }

    .artikel-link * {
        text-decoration: none !important;
        color: inherit !important;
    }

    .artikel-link:hover * {
        text-decoration: none !important;
        color: inherit !important;
    }
</style>

<div class="container mt-4 mb-5">
    <div class="section-wrapper">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold"><?= esc($title); ?></h4>
                </div>
            </div>

            <?php if (!empty($artikel)) : ?>
                <?php foreach ($artikel as $row) : ?>
                    <div class="col-lg-4 mb-3">
                        <div class="artikel-card h-100">
                            <a class="artikel-link" href="<?= base_url('user/artikel/detail/' . $row->id) ?>">
                                <?php
                                $defaultImage = base_url('assets-baru/img/error_logo.png');
                                $imagePath = 'assets-baru/img/foto_artikel/' . $row->foto;
                                $imageToDisplay = (!empty($row->foto) && file_exists(FCPATH . $imagePath)) ? base_url($imagePath) : $defaultImage;
                                ?>

                                <img src="<?= esc($imageToDisplay) ?>" alt="<?= esc($row->judul_artikel) ?>" loading="lazy">
                                <div class="bg-white border border-top-0 p-4 flex-grow-1">
                                    <div class="mb-2">
                                        <span class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">
                                            <?= date('d F Y', strtotime($row->tanggal_publish)); ?>
                                        </span>
                                    </div>
                                    <h4 class="d-block mb-3 text-secondary font-weight-bold">
                                        <?= esc($row->judul_artikel); ?>
                                    </h4>
                                    <p><?= esc(substr(strip_tags($row->deskripsi), 0, 100)); ?>...</p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12">
                    <p>Artikel belum tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
