<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Tentang Kami</h4>
        </div>
        <div class="bg-white border border-top-0 p-4 mb-3">
            <div class="mb-4 tentang-kami">
                <?php foreach ($tentang as $row) : ?>
                    <div>
                        <h1 class="text-uppercase font-weight-bold"><?= esc($row['nama_tentang']); ?></h1>
                        <div class="mb-4"><?= $row['deskripsi_tentang']; ?></div>

                        <?php
                        $fotoPath = 'assets-baru/img/' . $row['foto_tentang'];
                        if (!empty($row['foto_tentang']) && file_exists($fotoPath)) :
                        ?>
                            <div class="text-center">
                                <img class="img-fluid" src="<?= base_url($fotoPath); ?>" alt="Foto Tentang" loading="lazy">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan link CSS dan JS Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<!-- Plugin MarkerCluster -->
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<style>
    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .map-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        position: relative;
        margin-top: 20px;
    }

    #map {
        height: 500px;
        width: 95%;
        max-width: 1120px;
        border: 2px solid #94D9F6;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .search-container {
        margin: 5px;
        margin-bottom: 10px;
        display: flex;
        justify-content: center;
        position: relative;
    }

    .search-input {
        padding: 8px;
        font-size: 16px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .search-btn {
        padding: 8px 12px;
        margin-left: 8px;
        background-color: #1976D2;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .search-btn:hover {
        background-color: #45a049;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #ccc;
        background-color: #fff;
        width: 300px;
        max-height: 200px;
        overflow-y: auto;
        z-index: 9999;
        border-radius: 4px;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #ddd;
    }

    .autocomplete-items div:last-child {
        border-bottom: none;
    }

    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    .leaflet-marker-icon {
        filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.5));
    }

    .leaflet-marker-icon:hover {
        filter: drop-shadow(0 0 8px rgba(255, 0, 0, 0.6));
    }

    .info-panel {
        background: white;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-size: 14px;
    }

    .info-panel label {
        display: block;
        margin-bottom: 5px;
    }

    .leaflet-control-info-panel {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 1000;
    }

    .marker-cluster-small div,
    .marker-cluster-medium div,
    .marker-cluster-large div {
        color: black !important;
        font-weight: bold;
    }
</style>

<?= $this->endSection('content') ?>
