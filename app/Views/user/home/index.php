<?= $this->extend('user/template/template') ?>
<?= $this->section('content'); ?>

<!-- Include CSS Owl Carousel (gunakan CDN atau dari assets Anda) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

<div class="container-fluid px-0">
    <div class="row no-gutters">
        <div class="col-12">
            <div class="owl-carousel main-carousel position-relative shadow-slider">
                <!-- Slider Item 1 -->
                <div class="position-relative overflow-hidden slider-container">
                    <img
                        class="img-fluid w-100 h-100 lazyload"
                        data-src="<?= base_url('asset-user/uploads/slide1.png') ?>"
                        alt="Slider 1"
                        style="object-fit: cover;"
                        loading="lazy"
                    >
                </div>

                <!-- Slider Item 2 -->
                <div class="position-relative overflow-hidden slider-container">
                    <img
                        class="img-fluid w-100 h-100 lazyload"
                        data-src="<?= base_url('asset-user/uploads/slide2.png') ?>"
                        alt="Slider 2"
                        style="object-fit: cover; object-position: 10% center;"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </div>

    <style>
        .slider-container {
            height: 500px;
        }
        @media (max-width: 768px) {
            .slider-container {
                height: 300px;
            }
        }
        @media (max-width: 576px) {
            .slider-container {
                height: 200px;
            }
        }
        .shadow-slider {
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</div>
<!-- News With Sidebar Start -->
<div class="container mt-4 pt-3">
    <div class="text-center mb-4">
        <?php foreach ($tentang as $row) : ?>
            <h2 class="slogan text-uppercase font-weight-bold"><?= esc(strtoupper($row->slogan)); ?></h2>
        <?php endforeach; ?>
    </div>

    <!-- Wisata Section -->
    <div class="section-title">
    <h4 class="text-uppercase font-weight-bold m-0">Wisata</h4>
</div>
<div class="row">
    <?php 
    $displayedWisata = array_slice($randomWisata, 0, 6); 
    $defaultImage = base_url('assets-baru/img/error_logo.png');

    foreach ($displayedWisata as $index => $wisata): 
        $foto = is_array($wisata) ? $wisata['foto'] : $wisata->foto;
        $id = is_array($wisata) ? $wisata['id_alternatif'] : $wisata->id_alternatif;
        $nama = is_array($wisata) ? $wisata['nama_wisata'] : $wisata->nama_wisata;
        $deskripsi = is_array($wisata) ? $wisata['deskripsi'] : $wisata->deskripsi;

        $imagePath = 'asset-user/uploads/foto_wisata/' . $foto;
        $imageToDisplay = (file_exists(FCPATH . $imagePath) && !empty($foto)) ? base_url($imagePath) : $defaultImage;
    ?>
        <div class="col-lg-4 mb-4">
            <div class="artikel-card d-flex flex-column h-100 shadow-sm rounded">
                <a href="<?= base_url('wisata/detail/' . $id) ?>" class="artikel-link">
                    <img 
                        src="<?= esc($imageToDisplay) ?>" 
                        alt="<?= esc($nama) ?>" 
                        loading="lazy" 
                        class="img-fluid" 
                        style="height: 200px; object-fit: cover; width: 100%;"
                    >
                    <div class="p-3 bg-white flex-grow-1">
                        <h5 class="font-weight-bold" style="color: #007BFF;"><?= esc($nama) ?></h5>
                        <p class="mb-0"><?= esc(substr(strip_tags($deskripsi), 0, 100)) ?>...</p>
                    </div>
                </a>
            </div>
        </div>

    <?php endforeach; ?>
</div>

<!-- Artikel Section -->
<div class="section-title mt-5">
    <h4 class="text-uppercase font-weight-bold m-0">Artikel</h4>
</div>
<div class="row">
    <?php
    $displayedArtikel = array_slice($randomArtikel, 0, 6);
    foreach ($displayedArtikel as $artikel):
        $imagePath = 'asset-user/uploads/foto_artikel/' . $artikel->foto;
        $imageToDisplay = (file_exists(FCPATH . $imagePath) && !empty($artikel->foto)) ? base_url($imagePath) : $defaultImage;
    ?>
        <div class="col-lg-4 mb-4">
            <div class="artikel-card d-flex flex-column h-100 shadow-sm rounded">
                <a href="<?= base_url('artikel/detail/' . $artikel->id) ?>" class="artikel-link">
                    <img 
                        src="<?= esc($imageToDisplay) ?>" 
                        alt="<?= esc($artikel->judul_artikel) ?>" 
                        loading="lazy" 
                        class="img-fluid" 
                        style="height: 200px; object-fit: cover; width: 100%;"
                    >
                    <div class="p-3 bg-white flex-grow-1">
                        <h5 class="font-weight-bold" style="color: #007BFF;"><?= esc($artikel->judul_artikel) ?></h5>
                        <p class="mb-0"><?= esc(substr(strip_tags($artikel->deskripsi), 0, 100)) ?>...</p>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<style>
    .artikel-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        background-color: #f9f9f9;
        border-radius: 12px; /* Tambah radius lebih lembut */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Shadow awal */
        border: 1px solid #e0e0e0;
    }

    .artikel-card:hover {
        transform: translateY(-10px) scale(1.01); /* Naik dan sedikit membesar */
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2); /* Bayangan lebih tebal saat hover */
    }

    .artikel-link {
        color: inherit;
        text-decoration: none;
        display: block;
        height: 100%;
        cursor: pointer;
    }

    .artikel-link:hover {
        color: inherit;
        text-decoration: none;
    }

    .section-title {
        width: 100%;
        background-color: #f2f2f2;
        padding: 12px 20px;
        border-left: 5px solid #007BFF;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .section-title h4 {
        margin: 0;
        font-weight: bold;
        text-transform: uppercase;
        color: #007BFF;
    }

    .artikel-card .bg-white {
        background-color: transparent !important;
    }
</style>



<!-- Footer Section -->
<div class="footer-fullwidth bg-dark text-white pt-5 px-sm-3 px-md-5 mt-5">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <!-- Logo -->
            <div class="col-lg-3 col-md-6 mb-5 position-relative">
                <div class="logo-container position-relative" style="
                    background-image: url('https://bonday.com/assets/images/logobonday.png');
                    background-size: cover;
                    background-position: center;
                    width: 100%;
                    height: 200px;
                    clip-path: polygon(0 0, 100% 0, 100% 85%, 50% 100%, 0 85%);
                ">
                    <img src="<?= base_url('assets/images/logobonday.png') ?>" alt="bonday Logo" loading="lazy" style="
                        position: absolute;
                        top: 30%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 80%;
                        height: auto;
                    ">
                </div>
            </div>

            <!-- Attention Notice -->
            <div class="col-lg-6 col-md-12 mb-5 d-flex align-items-center justify-content-center">
                <div class="text-center p-4" style="border-radius: 10px; max-width: 500px; width: 100%;">
                    <h4 class="font-weight-bold text-uppercase mb-4">PERHATIAN</h4>
                    <p class="font-weight-medium">
                        Jika Anda menemukan penyalahgunaan konten atau pelanggaran hak cipta, harap menghubungi Admin di 
                        <a href="https://wa.me/6288805394166?text=Halo%20Admin%20Beauty%20Of%20Indonesia!%20Saya%20ingin%20melaporkan%20penyalahgunaan%20konten%20atau%20pelanggaran%20hak%20cipta.%20Minta%20informasi%20lebih%20lanjutnya%20ya%20Min,%20Terima%20Kasih..." style="color: #ffc107; text-decoration: none;">
                            <strong>088805394166</strong>
                        </a>. Terima Kasih!
                    </p>
                </div>
            </div>

            <!-- Menu Links -->
            <div class="col-lg-3 col-md-12">
                <h4 class="text-uppercase font-weight-bold mb-4">MENU</h4>
                <div class="d-flex flex-column">
                    <?php helper('url'); ?>
                    <?php
                    $menuItems = [
                        ['url' => base_url('/'), 'label' => 'Beranda'],
                        ['url' => base_url('wisata'), 'label' => 'Wisata'],
                        ['url' => base_url('rekomendasi'), 'label' => 'Rekomendasi'],
                        ['url' => base_url('tentang'), 'label' => 'Tentang'],
                        ['url' => base_url('informasi'), 'label' => 'Informasi'],
                        ['url' => base_url('profil'), 'label' => 'Profil'],
                    ];

                    foreach ($menuItems as $menu) :
                        $isActive = (current_url() === $menu['url']);
                        $class = $isActive ? 'menu-link menu-active py-2' : 'menu-link py-2';
                    ?>
                        <a href="<?= $menu['url'] ?>" class="<?= $class ?>">
                            <?= $menu['label'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .footer-fullwidth {
    width: 100vw; /* Lebar penuh viewport */
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw; /* Geser ke kiri setengah viewport */
    margin-right: -50vw; /* Geser ke kanan setengah viewport */
    background-color: #212529; /* Bisa disesuaikan warna bg-dark */
}
.menu-link {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s;
    }

    .menu-link:hover {
        color: #ffc107;
    }

    .menu-active {
        color: #ffc107 !important;
        font-weight: bold;
    }
</style>

<!-- Include jQuery dan Owl Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
    $('.main-carousel').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        lazyLoad: true,  // aktifkan lazy load bawaan Owl Carousel
        navText: ['&#8249;', '&#8250;']  // arrow kiri kanan
    });
});
</script>

<?= $this->endSection(); ?>
