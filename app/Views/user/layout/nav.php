<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2 py-lg-0 px-lg-5">
        <!-- Logo -->
        <a href="<?= base_url('user') ?>" class="navbar-brand">
            <img src="<?= base_url('assets/images/logobonday.png') ?>" alt="Logo Bonday" style="height: 60px;" class="d-inline-block align-middle">
        </a>

        <!-- Toggler for sidebar (mobile) -->
        <button class="navbar-toggler" type="button" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar menu (desktop only) -->
        <ul class="navbar-nav ml-auto py-0 d-none d-lg-flex">
            <li class="nav-item">
                <a href="<?= base_url('user/home') ?>" class="nav-link <?= current_url() === base_url('user/home') ? 'active' : '' ?>">BERANDA</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('user/wisata') ?>" class="nav-link <?= strpos(current_url(), base_url('user/wisata')) === 0 ? 'active' : '' ?>">WISATA</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('user/rekomendasi') ?>" class="nav-link <?= strpos(current_url(), base_url('user/rekomendasi')) === 0 ? 'active' : '' ?>">REKOMENDASI</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('user/tentang') ?>" class="nav-link <?= current_url() === base_url('user/tentang') ? 'active' : '' ?>">TENTANG</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('user/artikel/index') ?>" class="nav-link <?= strpos(current_url(), base_url('user/artikel')) === 0 ? 'active' : '' ?>">ARTIKEL</a>
            </li>
        </ul>
    </nav>
</div>

<!-- Sidebar (mobile only) -->
<div id="sidebar" class="sidebar" aria-hidden="true">
    <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()" aria-label="Tutup sidebar">&times;</a>
    <ul class="navbar-nav flex-column px-3">
        <li class="nav-item">
            <a href="<?= base_url('user/home') ?>" class="nav-link <?= current_url() === base_url('user/home') ? 'active' : '' ?>">Beranda</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('user/wisata') ?>" class="nav-link <?= strpos(current_url(), base_url('user/wisata')) === 0 ? 'active' : '' ?>">Semua Wisata</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('user/rekomendasi') ?>" class="nav-link <?= strpos(current_url(), base_url('user/rekomendasi')) === 0 ? 'active' : '' ?>">Rekomendasi</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('user/tentang') ?>" class="nav-link <?= current_url() === base_url('user/tentang') ? 'active' : '' ?>">Tentang</a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('user/artikel/index') ?>" class="nav-link <?= strpos(current_url(), base_url('user/artikel')) === 0 ? 'active' : '' ?>">Semua Artikel</a>
        </li>
    </ul>
</div>

<!-- Overlay untuk menutup sidebar saat klik di luar -->
<div id="overlay" class="overlay" onclick="toggleSidebar()" aria-hidden="true"></div>

<style>
        body {
        padding-top: 60px; /* sesuaikan dengan tinggi navbar */
    }

        .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        z-index: 1030;
        background-color: #f8f9fa;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .navbar .nav-link {
        color: #007BFF !important;
        transition: color 0.3s ease;
    }

    .navbar .nav-link.active {
        color: #ffc107 !important;
        font-weight: bold;
    }

    .navbar .nav-link:hover {
        color: rgba(255, 193, 7, 0.6) !important;
    }

    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1050;
        top: 0;
        right: 0;
        background-color: #f8f9fa;
        overflow-x: hidden;
        transition: width 0.3s ease;
        padding-top: 60px;
        box-shadow: -3px 0 6px rgba(0, 0, 0, 0.1);
    }

    .sidebar a {
        padding: 10px 15px;
        font-size: 18px;
        color: #333;
        display: block;
        transition: color 0.3s ease, background-color 0.3s ease;
        text-decoration: none;
    }

    .sidebar a:hover,
    .sidebar a.active {
        color: #a8ca7e;
        background-color: #e6f0d9;
        border-radius: 4px;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 36px;
        cursor: pointer;
        color: #333;
    }

    .overlay {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1040;
        transition: opacity 0.3s ease;
    }

    .sidebar.active {
        width: 250px;
    }

    .overlay.active {
        display: block;
        opacity: 1;
    }

    .nav-item {
        padding: 5px 0;
    }

    @media (min-width: 992px) {
        .sidebar,
        #overlay {
            display: none !important;
        }
    }
</style>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");
        const isActive = sidebar.classList.toggle("active");
        overlay.classList.toggle("active");

        sidebar.setAttribute("aria-hidden", !isActive);
        overlay.setAttribute("aria-hidden", !isActive);
    }
</script>
