<?= $this->extend('admin/template/login'); ?>
<?= $this->section('content'); ?>

<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-end">
            <div class="app-auth-body mx-auto">
                <div class="app-auth-branding mb-4">
                    <a class="app-logo" href="">
                        <img class="logo-icons me-2" src="<?= base_url('assets/images/logobonday.png'); ?>" alt="logo">
                    </a>
                </div>
                <h2 class="auth-heading text-center mb-5">Log in to Bondowoso Holiday</h2>
                <div class="auth-form-container text-start">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <div class="alert alert-info" role="alert">
                            Anda telah login. Silakan logout terlebih dahulu.
                        </div>
                    <?php endif; ?>

                    <form class="auth-form login-form" method="post" action="<?= base_url('login/process'); ?>">
                        <?= csrf_field(); ?>
                        <div class="email mb-3">
                            <label class="sr-only" for="username">Username</label>
                            <input id="username" name="username" type="text" class="form-control username" placeholder="username" required>
                        </div>
                        <div class="password mb-3">
                            <label class="sr-only" for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control password" placeholder="password" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn-yellow w-100">Log In</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p>Belum punya akun? <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian background kanan -->
    <div class="col-12 col-md-5 col-lg-6 h-100 custom-background-col">
        <div class="custom-background-image"></div>
        <div class="custom-background-mask"></div>
        <div class="custom-background-overlay p-3 p-lg-5">
            <div class="d-flex flex-column align-content-end h-100">
                <div class="h-100"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Daftar -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Akun Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('register/process'); ?>">
                    <?= csrf_field(); ?>
                    <div class="email mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="full-name mb-3">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <input id="full_name" name="full_name" type="text" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="username mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" name="username" type="text" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="password mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn-yellow w-100">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- CSS Tambahan -->
<style>
/* Tombol kuning */
.btn-yellow {
    background-color: #67a4ff;
    color: #000;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    transition: background-color 0.3s ease;
    font-weight: 600;
    width: 100%;
    box-sizing: border-box;
    text-align: center;
}
.btn-yellow:hover {
    background-color: #4a90f9;
}

/* Background kanan */
.custom-background-col {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
}

.custom-background-image {
    background-image: url('<?= base_url("assets/images/bg_login.png"); ?>'); /* Ganti sesuai gambar baru */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.custom-background-mask {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3); /* Optional dark overlay */
    z-index: 2;
}

.custom-background-overlay {
    position: relative;
    z-index: 3;
    height: 100%;
}

.logo-icons {
    height: 50px; /* Ubah angka sesuai kebutuhan, misal 40px, 30px, dll */
    width: auto;  /* Biarkan otomatis mengikuti rasio gambar */
}

</style>

<?= $this->endSection(); ?>