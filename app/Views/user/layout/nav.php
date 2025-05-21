<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2 py-lg-0 px-lg-5">
        <!-- Logo on the left -->
        <a href="<?= base_url('user') ?>" class="navbar-brand">
            <img src="<?= base_url('assets/images/logobonday.png') ?>" alt="bonday logo" style="height: 60px;" class="d-inline-block align-middle">
        </a>

        <!-- Toggler for Sidebar -->
        <button type="button" class="navbar-toggler" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

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
        <a href="<?= base_url('user/kategori/semua-artikel') ?>" class="nav-link <?= strpos(current_url(), base_url('user/kategori')) === 0 ? 'active' : '' ?>">ARTIKEL</a>
    </li>
</ul>

        </div>
    </nav>
</div>

<!-- Sidebar for mobile (hidden by default) -->
<div id="sidebar" class="sidebar" aria-hidden="true" tabindex="-1">
    <a href="javascript:void(0)" class="closebtn" onclick="toggleSidebar()" aria-label="Close sidebar">&times;</a>
    <ul class="navbar-nav flex-column px-3">
        <li class="nav-item">
            <a href="<?= base_url('user') ?>" class="nav-link <?= current_url() === base_url('user/home') ? 'active' : '' ?>">Beranda</a>
        </li>

        <!-- Destinasi -->
        <li class="nav-item">
            <a href="<?= base_url('user/wisata') ?>" class="nav-link <?= current_url() === base_url('user/wisata') ? 'active' : '' ?>">Semua Wisata</a>
        </li>

        <!-- Artikel -->
        <li class="nav-item">
            <a href="<?= base_url('user/kategori/semua-artikel') ?>" class="nav-link <?= current_url() === base_url('user/kategori/semua-artikel') ? 'active' : '' ?>">Semua Artikel</a>
        </li>

        <!-- Tentang -->
        <li class="nav-item">
            <a href="<?= base_url('user/tentang') ?>" class="nav-link <?= current_url() === base_url('user/tentang') ? 'active' : '' ?>">Tentang</a>
        </li>
    </ul>
</div>


<!-- Overlay to close the sidebar when clicked outside -->
<div id="overlay" class="overlay" onclick="toggleSidebar()" tabindex="-1" aria-hidden="true"></div>

<style>
 .navbar .nav-link {
    color: #007BFF !important; /* biru */
    transition: color 0.3s ease;
}

.navbar .active {
    color: #ffc107 !important; /* kuning */
    font-weight: bold;
}

.navbar .nav-link:hover {
    color: rgba(255, 193, 7, 0.6) !important; /* kuning samar waktu hover */
}


    /* Sidebar styles */
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
        box-shadow: -3px 0 6px rgba(0,0,0,0.1);
    }

    .sidebar a {
        padding: 10px 15px;
        text-decoration: none;
        font-size: 18px;
        color: #333;
        display: block;
        transition: color 0.3s ease, background-color 0.3s ease;
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

    /* Overlay effect when sidebar is opened */
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
        aria-hidden: false;
    }

    .overlay.active {
        display: block;
        opacity: 1;
    }

    /* Dropdown content */
    .dropdown-content {
        display: none;
        background-color: transparent;
        padding-left: 15px;
    }

    .dropdown-content a {
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        display: block;
        border-radius: 4px;
    }

    .dropdown-content a:hover {
        background-color: #a8ca7e;
        color: white;
    }

    .dropdown-toggle {
        cursor: pointer;
        user-select: none;
    }

    .dropdown-content.show {
        display: block;
    }

    /* Nav item spacing */
    .nav-item {
        padding: 5px 0;
    }

    /* Hide sidebar on larger screens */
    @media (min-width: 992px) {
        .sidebar {
            display: none !important;
        }
        #overlay {
            display: none !important;
        }
    }
</style>

<script>
    // Toggle the sidebar open/close
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");

        sidebar.classList.toggle("active");
        overlay.classList.toggle("active");

        // Accessibility attributes
        const isActive = sidebar.classList.contains("active");
        sidebar.setAttribute("aria-hidden", !isActive);
        overlay.setAttribute("aria-hidden", !isActive);
    }

    // Toggle dropdown menus inside sidebar
    function toggleDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        if (dropdown) {
            dropdown.classList.toggle("show");
        }
    }

    // Optional: close dropdowns when clicking outside (advanced)
    document.addEventListener('click', function(event) {
        const tourDropdown = document.getElementById('tourDropdown');
        const articleDropdown = document.getElementById('articleDropdown');
        const clickedInsideTour = event.target.closest('.dropdown-toggle')?.getAttribute('onclick')?.includes('tourDropdown');
        const clickedInsideArticle = event.target.closest('.dropdown-toggle')?.getAttribute('onclick')?.includes('articleDropdown');

        if (!clickedInsideTour && tourDropdown && tourDropdown.classList.contains('show')) {
            tourDropdown.classList.remove('show');
        }
        if (!clickedInsideArticle && articleDropdown && articleDropdown.classList.contains('show')) {
            articleDropdown.classList.remove('show');
        }
    });
</script>
