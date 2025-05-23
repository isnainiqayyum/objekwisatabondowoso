<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <title>Beranda</title>

    <!-- Meta Tags -->
    <meta name="title" content="Beranda" />
    <meta name="description" content="Selamat datang di situs wisata Bondowoso. Temukan berbagai destinasi menarik di wilayah Bondowoso." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Cache-Control" content="max-age=604800, must-revalidate" />

    <!-- Favicon -->
    <link href="<?= base_url('favicon.ico') ?>" rel="icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Owl Carousel CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" />
</head>

<body>

    <!-- Header -->
    <?= $this->include('user/layout/header') ?>

    <!-- Navbar -->
    <?= $this->include('user/layout/nav') ?>

    <!-- Konten Halaman -->
    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <?= $this->include('user/layout/footer') ?>


    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Custom JS -->
    <script src="<?= base_url('js/main.js') ?>"></script>

    <!-- Script Modal Register dan Navbar aktif -->
    <script>
        $(document).ready(function () {
            // Tambah kelas show untuk nav-link aktif jika ada
            $(".nav-link.active").addClass("show");

            // Event tombol register untuk buka modal (pastikan tombol dengan id #registerButton ada)
            $('#registerButton').click(function () {
                $('#registerModal').modal('show');
            });

            // Tombol back-to-top muncul saat scroll
            const backToTopBtn = $('.back-to-top');
            $(window).scroll(function () {
                if ($(window).scrollTop() > 100) {
                    backToTopBtn.fadeIn();
                } else {
                    backToTopBtn.fadeOut();
                }
            });
            backToTopBtn.click(function (e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, '300');
            });
        });
    </script>

    

    <!-- Modal Pendaftaran -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Daftar Akun Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('register/process') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required />
                        </div>
                        <div class="form-group">
                            <label for="fullname">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required />
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required />
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
