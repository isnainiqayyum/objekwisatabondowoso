<header class="app-header fixed-top bg-dark text-white">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">

                    <div class="col-auto">
                        <!-- Toggle sidebar button untuk mobile -->
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none text-white" href="#" role="button" aria-label="Toggle menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2">
                                <title>Menu</title>
                                <path d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div><!--//col-->

                    <div class="search-mobile-trigger d-sm-none col text-center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div><!--//col-->

                    <div class="app-utilities col-auto">
                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a class="dropdown-toggle text-white d-flex align-items-center" href="#" id="user-dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= base_url('assets/images/user.png') ?>" alt="user profile" class="rounded-circle me-2" width="32" height="32">
                                <span class="d-none d-md-inline">Admin</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="<?= site_url('logout') ?>">Log Out</a></li>
                            </ul>
                        </div><!--//app-user-dropdown-->
                    </div><!--//app-utilities-->

                </div><!--//row-->
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->
    </div><!--//app-header-inner-->
</header>
