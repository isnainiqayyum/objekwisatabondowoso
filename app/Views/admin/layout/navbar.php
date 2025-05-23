<aside class="sidebar">
  <div class="sidebar-header">
    <h1><span class="bon">Bon</span><span class="day">Day</span></h1>
  </div>

  <ul class="nav-list">
    <li class="nav-item">
      <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item has-submenu">
      <a href="#" class="nav-link">
        <i class="fas fa-database"></i>
        <span>Data Master</span>
        <i class="fas fa-chevron-down submenu-toggle-icon ms-auto"></i>
      </a>
      <ul class="submenu-static">
        <li><a href="<?= base_url('admin/alternatif') ?>">Alternatif</a></li>
        <li><a href="<?= base_url('admin/kriteria') ?>">Kriteria</a></li>
        <li><a href="<?= base_url('admin/subkriteria') ?>">Subkriteria</a></li>
        <li><a href="<?= base_url('admin/penilaian') ?>">Penilaian</a></li>
        <li><a href="<?= base_url('admin/perhitungan') ?>">Perhitungan</a></li>
      </ul>
    </li>

    <li class="nav-item">
      <a href="<?= base_url('admin/artikel') ?>" class="nav-link">
        <i class="fas fa-newspaper"></i>
        <span>Artikel</span>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= base_url('admin/rekomendasi/riwayat') ?>" class="nav-link">
        <i class="fas fa-history"></i>
        <span>Riwayat</span>
      </a>
    </li>

    <li class="nav-item">
      <a href="<?= base_url('admin/tentang/edit') ?>" class="nav-link">
        <i class="fas fa-cog"></i>
        <span>Tentang</span>
      </a>
    </li>
  </ul>
</aside>

<style>
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 220px;
  height: 100vh;
  background-color: #212529;
  color: #fff;
  padding-top: 56px;
  box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
  z-index: 1020;
}

.sidebar-header {
  text-align: center;
  font-size: 2rem;        /* ukuran besar seperti h1 */
  padding: 20px 0;
  font-weight: 400;       /* normal, bukan bold */
  letter-spacing: 1px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* font modern & bersih */
}


.sidebar-header .bon {
  color: #ffc107;
  font-style: italic;
}

.sidebar-header .day {
  color: #fff;
}

.nav-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav-item {
  margin: 0;
}

.nav-link {
  display: flex;
  align-items: center;
  color: #adb5bd;
  text-decoration: none;
  padding: 0.75rem 1rem;
  transition: background-color 0.2s ease, color 0.2s ease;
}

.nav-link:hover,
.nav-link.active {
  background-color: #343a40;
  color: #fff;
}

.nav-link i {
  margin-right: 12px;
  min-width: 20px;
  text-align: center;
}

.submenu-static {
  list-style: none;
  padding-left: 2rem;
  margin-top: 0;
}

.submenu-static li a {
  display: block;
  padding: 0.5rem 0;
  color: #adb5bd;
  text-decoration: none;
  font-size: 0.9rem;
}

.submenu-static li a:hover {
  color: #fff;
  background-color: #343a40;
  border-radius: 4px;
  padding-left: 0.5rem;
}
</style>
