<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Kontak</title>
    <!-- Meta Tags -->
    <meta name="title" content="Kontak">
    <meta name="description" content="Hubungi Joyfullcrunch untuk pertanyaan, saran, atau informasi lebih lanjut tentang produk dan aktivitas kami. Kami siap membantu Anda dan memberikan pengalaman terbaik.">

    <!-- Canonical Tag -->
    <link rel="canonical" href="<?= current_url()?>"></style>

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

            .card-container {
                width: 100%;
                max-width: 1000px;
                padding: 30px;
                background: #EEEEEE;
                border-radius: 15px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                margin: 100px auto; /* Pusatkan kotak dan tambahkan jarak dari atas */
                position: relative;
            }

            .first-layer {
                position: absolute;
                top: 25px;
                left: 20px;
                width: 100%;
                height: 100%;
                background: #E2CEB1;
                border-radius: 15px;
                z-index: -1;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            .content {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
            }

            .left-section {
                flex: 1;
                min-width: 250px;
                margin-right: 50px; /* Jarak antara left-section dan right-section */
            }

            .right-section {
                flex: 1;
                min-width: 250px;
            }
            /* Contact Form Styling */
            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                color: #734128;
                font-size: 15px;
                font-family: 'Causten-Regular';
                margin-bottom: 5px;
                display: block;
            }

            .form-group input,
            .form-group textarea {
                width: 100%;
                padding: 8px;
                border-radius: 4px;
                border: 2px solid #734128; /* Border gelap di sekeliling input/textarea */
                background: F5F5F5; /* Latar belakang tetap putih */
                font-family: 'Causten-Regular';
                color: #734128; /* Warna teks lebih gelap untuk kontras */
                outline: none;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Efek bayangan untuk membuat kotak terlihat lebih jelas */
            }

            .form-group textarea {
                height: 60px;
                resize: none;
            }

            .form-group input:focus,
            .form-group textarea:focus {
                border-color: #BD6B43; /* Warna border berubah ketika input/textarea dalam fokus */
                box-shadow: 0 0 8px rgba(189, 107, 67, 0.5); /* Efek bayangan lebih intens saat fokus */
            }

            .submit-button {
                width: 117px;
                height: 32px;
                background: #BD6B43;
                border-radius: 5px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 10px;
                cursor: pointer;
            }

            .submit-button div {
                color: black;
                font-size: 15px;
                font-family: 'Inika';
            }

            /* Map Styling */
            .map-container {
                width: 100%;
                height: 211px;
                border-radius: 10px;
                overflow: hidden;
                border: 2px #391E10 solid;
                margin-bottom: 15px;
            }

            /* Address Box Styling */
            .address-box {
                width: 95%;
                background: #FDFCE8;
                border-radius: 15px;
                padding: 15px;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .address-item {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .icon {
                width: 20px;
                height: 20px;
                background: #BD6B43;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .icon div {
                width: 10px;
                height: 10px;
                background: white;
            }

            .icon-instagram div {
                color: white;
                font-size: 10px;
                font-family: "Font Awesome 5 Brands";
            }

            .address-text {
                color: black;
                font-size: 14px;
                font-family: 'Inika';
                font-weight: 400;
            }

            .icon {
                width: 20px;
                height: 20px;
                background: none; /* Hilangkan background bulat */
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .icon i {
                font-size: 18px; /* Ukuran ikon */
                color: #BD6B43; /* Warna ikon */
            }

            /* Tambahan untuk mengatur margin agar kotak form ada jarak dengan gambar di atasnya */
            .contact-header {
                text-align: center;
                margin-bottom: 20px; /* Beri jarak antara header dan form */
            }

            /* Responsif */
            @media (max-width: 768px) {
                .card-container {
                    width: 95%; /* Membuat lebar penuh pada layar kecil */
                    padding: 15px;
                }

                .content {
                    flex-direction: column; /* Membuat section stack vertikal */
                }

                .left-section, .right-section {
                    min-width: 100%; /* Membuat bagian kiri dan kanan penuh pada layar kecil */
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
              <a href="<?= base_url('tentang') ?>">Tentang</a>
              <a href="<?= base_url('artikel') ?>">Artikel</a>
              <a href="<?= base_url('produk') ?>">Produk</a>
              <a href="<?= base_url('aktivitas') ?>">Aktivitas</a>
              <a href="<?= base_url('kontak') ?>" class="active">Kontak</a>

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
              Kontak
          </div>
      </div>
  </div>

    <div class="card-container">
        <!-- First Layer (Double Layer Effect) -->
        <div class="first-layer"></div>

        <div class="content">
            <!-- Left Section: Contact Form -->
            <div class="left-section">
                <!-- Contact Form -->
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" placeholder="Masukkan Nama">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Masukkan E-Mail">
                </div>

                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" placeholder="Masukkan Pesan Kamu"></textarea>
                </div>

                <div class="submit-button">
                    <div>Kirim</div>
                </div>
            </div>

            <!-- Right Section: Map and Address Box -->
            <div class="right-section">
                <!-- Map Location -->
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.207184194719!2d112.61623191506712!3d-7.976604894063124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78a9c057024357%3A0x4b21b31f54c663e4!2sSawo%20Jajar%2C%20Kota%20Malang%2C%20Jawa%20Timur%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1696851641541"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>

                <!-- Address Box -->
                <div class="address-box">
                    <div class="address-item">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i> <!-- Ikon lokasi -->
                        </div>
                        <div class="address-text">Sawojajar, Kota Malang, Jawa Timur, Indonesia.</div>
                    </div>

                    <div class="address-item">
                        <div class="icon">
                            <i class="fas fa-phone"></i> <!-- Ikon telepon -->
                        </div>
                        <div class="address-text">+62 521 735 629 700 (WhatsApp)</div>
                    </div>

                    <div class="address-item">
                        <div class="icon">
                            <i class="fas fa-envelope"></i> <!-- Ikon email -->
                        </div>
                        <div class="address-text">joyfulcrunch@gmail.com</div>
                    </div>

                    <div class="address-item">
                        <div class="icon icon-instagram">
                            <i class="fab fa-instagram"></i> <!-- Ikon Instagram -->
                        </div>
                        <div class="address-text">@joyful.crunch</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
  <div style="width: 100%; height: 90px; background: #734128; border-top: 1px rgba(255, 255, 255, 0.17) solid; display: flex; justify-content: space-between; align-items: center; padding: 0 50px; box-sizing: border-box;">
  <!-- Copyright -->
  <div style="color: #FDFCE8; font-size: 11px; font-family: DM Sans; font-weight: 400; word-wrap: break-word;">
    Copyright © 2024 Joyful Crunch, Design by Joyful Crunch
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