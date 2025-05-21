<!-- app/Views/user/home/ajax_content.php -->
<div class="ajax-content">
    
<!-- CSS untuk styling map dan autocomplete -->







<script>
    // Inisialisasi peta
    var map = L.map('map').setView([<?= $wisata['wisata_latitude'] ?>, <?= $wisata['wisata_longitude'] ?>], 15);

    // Layer peta dasar
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Ikon untuk tempat wisata
    var wisataIcon = L.icon({
        iconUrl: '/assets-baru/img/icon_wisata.png',
        iconSize: [32, 42],
        iconAnchor: [20, 50],
        popupAnchor: [0, -42]
    });

    // Tambahkan marker wisata
    var wisataMarker = L.marker([<?= $wisata['wisata_latitude'] ?>, <?= $wisata['wisata_longitude'] ?>], {
        icon: wisataIcon
    }).addTo(map);

    // Isi popup dengan detail wisata
    wisataMarker.bindPopup(`
        <div style="text-align: center;">
            <img 
                src="/asset-user/uploads/foto_wisata/<?= $wisata['foto_wisata'] ?>" 
                alt="<?= $lang === 'en' ? $wisata['nama_wisata_eng'] : $wisata['nama_wisata_ind'] ?>" 
                style="width:200px; height:200px; margin-bottom: 5px; object-fit: cover;" 
                onerror="this.onerror=null; this.src='/assets-baru/img/error_logo1.png';"
            /><br>
            <strong><?= $lang === 'en' ? $wisata['nama_wisata_eng'] : $wisata['nama_wisata_ind'] ?></strong><br>
            <?= $wisata['nama_kotakabupaten'] ?>, <?= $wisata['nama_provinsi'] ?><br>
            <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $wisata['wisata_latitude'] ?>,<?= $wisata['wisata_longitude'] ?>" target="_blank" class="popup-button"><?= $lang === 'en' ? 'Get Directions' : 'Petunjuk Arah' ?></a>
        </div>
    `).openPopup();
</script>

</div>
