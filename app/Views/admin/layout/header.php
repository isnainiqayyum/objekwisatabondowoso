<header class="app-header fixed-top">
  <div class="app-header-inner">
    <div class="container-fluid py-2 px-3">
      <div class="app-header-content">
        <div class="d-flex justify-content-between align-items-center">

          <!-- Toggle sidebar -->
          <a id="sidepanel-toggler" class="d-inline-block d-xl-none text-white" href="#" role="button" aria-label="Toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 30 30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2">
              <title>Menu</title>
              <path d="M4 7h22M4 15h22M4 23h22"></path>
            </svg>
          </a>

          <!-- Area kosong tengah untuk search atau nama aplikasi -->
          <div class="d-none d-md-flex flex-grow-1 justify-content-center">
            <span class="text-white fw-semibold fs-5"></span>
          </div>

          <!-- User menu -->
          <div class="app-utilities">
            <div class="app-utility-item dropdown">
              <a class="dropdown-toggle d-flex align-items-center text-white" href="#" id="user-dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= base_url('assets/images/user.png') ?>" alt="user" class="rounded-circle me-2" width="32" height="32">
                <span class="d-none d-md-inline">Admin</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-sm" aria-labelledby="user-dropdown-toggle">
                <li><a class="dropdown-item" href="<?= site_url('logout') ?>">Log Out</a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</header>

<style>
.app-header {
  background-color: #1f1f1f;
  color: #fff;
  height: 60px;
  border-bottom: 1px solid #343a40;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  z-index: 1030;
}

#sidepanel-toggler:hover {
  opacity: 0.8;
  transition: opacity 0.2s ease-in-out;
}

.dropdown-menu {
  font-size: 0.95rem;
}

.dropdown-item:hover {
  background-color: #f8f9fa;
  color: #212529;
}
</style>
