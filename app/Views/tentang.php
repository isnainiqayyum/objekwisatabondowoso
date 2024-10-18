<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>tentang</title>
    <!-- Meta Tags -->
    <meta name="title" content="Tentang ">
    <meta name="description" content="Pelajari lebih lanjut tentang Joyfullcrunch, toko cookie yang menghadirkan berbagai macam cookie lezat, dipanggang dengan bahan berkualitas tinggi. Kami berkomitmen untuk memberikan pengalaman rasa yang tak terlupakan dan menjadikan setiap momen lebih spesial.">

  <!-- Canonical Tag -->
  <link rel="canonical" href="<?= current_url()?>">

        <style>
           body, html {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Inika', serif;
                overflow-x: hidden; /* Prevent horizontal scrolling */
            }

            /* Header umum */
            .header {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 75px;
                background: white;
                display: flex;
                align-items: center;
                padding: 0 15px;
                justify-content: space-between;
                z-index: 1000;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            /* Tambahkan jarak pada bagian atas konten agar tidak tertutup header */
            body {
                padding-top: 75px; /* Sesuaikan padding dengan tinggi header */
            }

            /* Logo */
            .logo {
                margin-right: 2vw;
                margin-left: 10vw; /* Menggunakan vw agar lebih responsif */
            }

            .logo img {
                height: 50px;
                width: auto;
                max-width: 100%;
            }

            /* Mengatur font umum untuk seluruh elemen */
            .nav-container,
            .nav-links a,
            .selected-language,
            .language-menu div {
                font-family: 'Inika', serif; /* Pastikan menggunakan font yang sama di semua elemen */
                font-size: 18px; /* Sesuaikan ukuran font jika perlu */
                color: black; /* Warna teks sama */
            }

            /* Container navigasi */
            .nav-container {
                display: flex;
                align-items: center;
            }

            /* Link navigasi */
            .nav-links {
                display: flex;
                gap: 20px; /* Konsisten antar elemen */
                margin-left: auto; /* Alignment otomatis ke kiri */
                padding-right: 2vw; /* Tambahan spasi di kanan */
            }

            /* Efek klik lingkaran coklat */
            .nav-links a {
                position: relative;
                padding: 10px 15px;
                text-decoration: none;
                font-size: 18px;
                color: black;
                transition: background-color 0.3s ease, border-radius 0.3s ease;
            }

            /* Efek hover */
            .nav-links a:hover {
                background-color: #E2CEB1; /* Warna coklat kekuningan */
                border-radius: 20px; /* Bentuk melingkar */
            }

            /* Active state: tetap berada di menu aktif */
            .nav-links a.active {
                background-color: #E2CEB1; /* Warna coklat kekuningan */
                border-radius: 20px; /* Bentuk melingkar */
            }

            /* Language Selector */
            .language-selector {
                position: relative;
                display: flex;
                align-items: center;
                margin-left: 10px;
                z-index: 10;
                font-family: 'Inika', serif; /* Konsisten dengan font yang sama */
                font-size: 18px;
            }

            .language-menu {
                display: none;
                position: absolute;
                top: 100%;
                right: 0;
                background: white;
                border: 1px solid #ccc;
                padding: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                z-index: 1000;
            }

            .language-selector.active .language-menu {
                display: block;
            }

            .language-menu div {
                font-family: 'Inika', serif; /* Konsisten dengan font yang sama */
                font-size: 18px;
                padding: 5px 10px;
                cursor: pointer;
            }
            .language-menu div:hover {
                background: #f0f0f0;
            }

            .selected-language {
                display: flex;
                align-items: center;
                cursor: pointer;
            }

            .arrow {
                width: 14px;
                height: 9px;
                background: black;
                margin-left: 5px;
            }

            /* Hamburger icon */
            .hamburger {
                display: none;
                flex-direction: column;
                cursor: pointer;
                gap: 5px;
            }

            .hamburger div {
                width: 25px;
                height: 3px;
                background-color: #391E10;
            }

            /* Responsif: Tampilkan hamburger icon pada layar kecil */
            @media (max-width: 768px) {
                .nav-links {
                    display: none; /* Sembunyikan link navigasi */
                    flex-direction: column;
                    position: absolute;
                    top: 75px;
                    left: 0;
                    width: 100%;
                    background-color: white;
                    padding: 20px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                .nav-links.active {
                    display: flex; /* Tampilkan link navigasi saat icon diklik */
                }

                .hamburger {
                    display: flex; /* Tampilkan ikon hamburger pada layar kecil */
                }
            }

            /* Wrapper untuk konten utama */
            .responsive-container {
                display: flex;
                justify-content: center; /* Pusatkan secara horizontal */
                align-items: center; /* Pusatkan secara vertikal */
                padding: 20px;
                background-color: #FFFFFF; /* Warna latar belakang */
                margin-top: 50px; /* Tambahkan jarak di atas */
                margin-bottom: 70px; /* Tambahkan jarak di bawah */
            }

                .content-wrapper {
                    display: flex;
                    flex-direction: row; /* Atur gambar dan teks bersebelahan */
                    align-items: center;
                    gap: 40px; /* Jarak antara gambar dan teks */
                    max-width: 1000px; /* Lebar maksimal konten */
                    width: 100%;
                }

                /* Gambar logo */
                .logo-wrapper img {
                    max-width: 300px; /* Sesuaikan lebar gambar */
                    height: auto;
                }

                /* Teks container */
                .text-container {
                    flex: 1; /* Biarkan teks mengambil sisa ruang */
                    text-align: left;
                    padding: 0 20px;
                }

                .title {
                    font-size: 3vw;
                    font-family: 'Inika', serif;
                    font-weight: 1000;
                    color: #391E10;
                    margin-bottom: 20px; /* Menambahkan jarak bawah pada judul */
                }

                .description {
                    font-size: 1vw;
                    font-family: 'Ponnala', sans-serif;
                    color: #391E10;
                    line-height: 1.5;
                    margin-top: 30px; /* Menambahkan jarak atas pada deskripsi */
                }

                /* Responsif untuk layar kecil */
                @media (max-width: 768px) {
                    .content-wrapper {
                        flex-direction: column; /* Ubah menjadi kolom di layar kecil */
                        text-align: center;
                    }

                    .title {
                        font-size: 4vw; /* Perbesar judul */
                    }

                    .description {
                        font-size: 3vw; /* Perbesar teks deskripsi */
                    }

                    .logo-wrapper img {
                        max-width: 200px; /* Sesuaikan ukuran gambar pada layar kecil */
                    }
                }

                /* Responsiveness & Improvements */
                @media (max-width: 1200px) {
                    .logo {
                        margin-left: 5vw; /* Kurangi margin kiri */
                    }

                    .nav-links {
                        padding-right: 1vw; /* Kurangi padding kanan */
                        gap: 15px; /* Kurangi jarak antara link */
                    }

                    .language-selector {
                        margin-left: 5px; /* Kurangi jarak untuk menyesuaikan layar lebih kecil */
                    }
                }
          </style>
          <script>
              function toggleLanguageMenu() {
                  var languageMenu = document.querySelector('.language-selector');
                  languageMenu.classList.toggle('active');
              }
              function toggleNav() {
                  var navLinks = document.querySelector('.nav-links');
                  navLinks.classList.toggle('active');
              }
              function changeLanguage(language) {
                  alert(`Language changed to ${language}`);
                  // Add code here to actually change the language, if applicable
                  toggleLanguageMenu(); // Close the menu after selecting a language
              }

               // Fungsi untuk memindahkan label saat input di fokus
               const emailInput = document.getElementById('email-input');
                    const emailLabel = document.getElementById('email-label');

                    emailInput.addEventListener('focus', function() {
                        emailLabel.style.top = '5px';
                        emailLabel.style.fontSize = '12px';
                        emailLabel.style.color = '#E2CEB1';
                    });

                    emailInput.addEventListener('blur', function() {
                        if (emailInput.value === '') {
                            emailLabel.style.top = '15px';
                            emailLabel.style.fontSize = '14px';
                        }
                    });
          </script>
</head>
<body>
<div class="header">
    <!-- Logo -->
    <div class="logo">
        <img src="image/logo.png" alt="Logo">
    </div>

    <!-- Hamburger Icon (hanya muncul di mobile) -->
    <div class="hamburger" onclick="toggleNav()">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Navigation Container -->
    <div class="nav-container">
        <div class="nav-links">
            <a href="<?= base_url('/') ?>">Beranda</a>
            <a href="<?= base_url('tentang') ?>" class="active">Tentang</a>
            <a href="<?= base_url('artikel') ?>">Artikel</a>
            <a href="<?= base_url('produk') ?>">Produk</a>
            <a href="<?= base_url('aktivitas') ?>">Aktivitas</a>
            <a href="<?= base_url('kontak') ?>">Kontak</a>

            <!-- Language Selector (pindah ke dalam .nav-links) -->
            <div class="language-selector">
                <div class="selected-language" onclick="toggleLanguageMenu()">
                    <div>Bahasa</div>
                    <div class="arrow"></div>
                </div>
                <div class="language-menu">
                    <div onclick="changeLanguage('English')">English</div>
                    <div onclick="changeLanguage('Indonesia')">Indonesia</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="position: relative; width: 100%; height: 30vh; margin-bottom: 0;"> 
    <!-- Gambar responsif -->
    <img alt="tentang" src="image/tentang.png" style="width: 100%; height: 100%; object-fit: cover; margin-bottom: 0; padding: 0; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" /> 

    <!-- Overlay untuk gambar -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.50);"></div>

    <!-- Teks responsif di tengah gambar -->
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; text-align: center;">
        <div style="color: #E2CEB1; font-size: 3vw; font-family: Inika; font-weight: 700; line-height: 1.1; word-wrap: break-word;">
            Tentang Kami
        </div>
    </div>
</div>

<div class="responsive-container">
    <div class="content-wrapper">
        <div class="logo-container">
            <div class="logo-wrapper">
                <img src="image/logomaskot.png" alt="Joyfull Crunch Logo" />
            </div>
        </div>
        <div class="text-container">
            <div class="title">Joyful Crunch</div>
            <div class="description">
                Di Joyful Crunch, kami percaya bahwa kebahagiaan dimulai dengan kue yang sempurna. Terinspirasi dari maskot kami yang ceria, Cookie, kami membuat setiap biskuit dengan penuh cinta dan bahan-bahan berkualitas tinggi. Misi kami adalah untuk menghadirkan kegembiraan di setiap momen, satu kue pada satu waktu.                
                <br /><br />
                Resep unik kami memadukan cita rasa tradisional dengan sentuhan modern, menghasilkan kue kering yang renyah di luar dan lembut di dalam. Setiap gigitannya adalah perayaan momen-momen spesial dalam hidup, baik saat Anda berbagi dengan teman, menikmati malam yang nyaman di rumah, atau memanjakan diri sendiri setelah seharian beraktivitas. Kami ingin kue kering kami membangkitkan kegembiraan dan nostalgia, menciptakan kenangan abadi dengan setiap rasa.
                <br /><br />
                Kami juga berkomitmen terhadap keberlanjutan, mencari sumber bahan baku secara bertanggung jawab untuk memberikan dampak positif bagi masyarakat dan lingkungan. Di Joyful Crunch, kami percaya bahwa kue kering yang lezat dapat dihasilkan dari praktik-praktik yang baik. Bergabunglah bersama kami dalam perjalanan lezat ini dan temukan bagaimana kue-kue kami dapat memberikan sedikit kegembiraan dalam hidup Anda!
            </div>
        </div>
    </div>
</div>


  <!-- footer -->
    <div style="width: 100%; height: 90px; background: #734128; border-top: 1px rgba(255, 255, 255, 0.17) solid; display: flex; justify-content: space-between; align-items: center; padding: 0 50px; box-sizing: border-box;">
        <!-- Copyright -->
        <div style="color: #FDFCE8; font-size: 11px; font-family: DM Sans; font-weight: 400; word-wrap: break-word;">
            Copyright © 2024 Joyfull Crunch, Design by Joyfull Crunch
        </div>
        <!-- Ikon sosial media -->
        <div style="display: flex; gap: 20px;">
            <a href="https://www.facebook.com" target="_blank" style="width: 42px; height: 42px; background: none; border-radius: 50%; border: 2px solid #E2CEB1; justify-content: center; align-items: center; display: inline-flex;">
            <i class="fab fa-facebook-f" style="color: #E2CEB1; font-size: 18px;"></i>
            </a>
            <a href="https://www.youtube.com" target="_blank" style="width: 42px; height: 42px; background: none; border-radius: 50%; border: 2px solid #E2CEB1; justify-content: center; align-items: center; display: inline-flex;">
            <i class="fab fa-youtube" style="color: #E2CEB1; font-size: 18px;"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" style="width: 42px; height: 42px; background: none; border-radius: 50%; border: 2px solid #E2CEB1; justify-content: center; align-items: center; display: inline-flex;">
            <i class="fab fa-twitter" style="color: #E2CEB1; font-size: 18px;"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" style="width: 42px; height: 42px; background: none; border-radius: 50%; border: 2px solid #E2CEB1; justify-content: center; align-items: center; display: inline-flex;">
            <i class="fab fa-instagram" style="color: #E2CEB1; font-size: 18px;"></i>
            </a>
        </div>
    </div>
</body>