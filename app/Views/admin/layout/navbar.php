<aside class="sidebar">
    <div class="sidebar-header">
  <span class="bon">Bon</span><span class="day">Day</span>
</div>

    <ul class="nav-list">
        <li class="nav-item">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Data Master Section -->
        <li class="nav-item has-submenu">
    <a href="#" class="nav-link">
        <i class="bi bi-folder"></i>
        <span>Data Master</span>
        <i class="bi bi-chevron-down submenu-toggle-icon"></i>
    </a>
    <ul class="submenu-static">
        <li><a href="<?= base_url('admin/alternatif') ?>">Alternatif</a></li>
        <li><a href="<?= base_url('admin/kriteria') ?>">Kriteria</a></li>
        <li><a href="<?= base_url('admin/subkriteria') ?>">Subkriteria</a></li>
        <li><a href="<?= base_url('admin/penilaian') ?>">Penilaian</a></li>
        <li><a href="<?= base_url('admin/perhitungan') ?>">Perhitungan</a></li> <!-- ini tambahan -->
    </ul>
</li>



        <li class="nav-item">
            <a href="<?= base_url('admin/artikel') ?>" class="nav-link">
                <i class="bi bi-journal-text"></i>
                <span>Artikel</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('admin/rekomendasi/riwayat') ?>" class="nav-link">
                <i class="bi bi-bag"></i>
                <span>Riwayat</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('admin/tentang/edit') ?>" class="nav-link">
                <i class="bi bi-gear"></i>
                <span>Tentang</span>
            </a>
        </li>
    </ul>
</aside>

<style>
  /* Sidebar container tetap di kiri */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    background-color: #67a4ff; /* kuning agak gelap */
    color: #000; /* teks jadi hitam */
    height: 100vh;
    padding: 20px;
    overflow-y: auto;
    z-index: 1000;
}

/* Untuk memberikan ruang konten utama di kanan sidebar */
.main-content {
    margin-left: 250px;
    padding: 20px;
}

/* Header Sidebar */
.sidebar-header {
    text-align: center;
    padding-top: 30px;         /* agak turun tapi tidak terlalu jauh */
    margin-bottom: 10px;       /* jarak ke menu */
    font-family: 'Poppins', sans-serif; /* samakan font */
    font-size: 3.5rem;         /* samakan ukuran */
    font-weight: 600;          /* tidak terlalu tebal agar tidak kontras */
    user-select: none;
    letter-spacing: 0.5px;
}

/* Warna tulisan BonDay */
.sidebar-header .bon {
    color: #ffcd1a;
    font-style: italic;
}

.sidebar-header .day {
    color: #000;
}



/* Navigation List */
.nav-list {
    list-style: none;
    padding: 0;
    margin: 0 0 0 0;
}

.nav-item {
    margin-bottom: 10px;
}

.nav-link {
    display: flex;
    align-items: center;
    color: #000; /* teks item hitam */
    text-decoration: none;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.2s ease, color 0.2s ease;
}

.nav-link:hover {
    background-color: #000; /* latar hitam saat hover */
    color: #fff; /* teks putih saat hover */
}

.nav-link i {
    margin-right: 10px;
    color: inherit;
}

.submenu-static {
    list-style: none;
    padding-left: 25px; /* geser submenu ke kanan */
    margin-top: 0px;
}

.submenu-static li a {
    display: block;
    padding: 6px 0 6px 15px; /* tambahin padding kiri 15px */
    color: #000;
    text-decoration: none;
    font-size: 0.95rem;
}

.submenu-static li a:hover {
    background-color: #000; /* latar hitam saat hover */
    color: #fff; /* teks putih saat hover */
    border-radius: 8px; /* lengkung sudut */
    transition: background-color 0.3s ease, color 0.3s ease; /* smooth transition */
}


</style>