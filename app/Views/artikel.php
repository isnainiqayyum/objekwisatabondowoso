<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Artikel</title>
    
    <!-- Meta Tags -->
    <meta name="title" content="Artikel">
    <meta name="description" content="Baca artikel menarik di Joyfullcrunch! Temukan tips, resep, dan informasi seputar dunia cookie yang dapat menginspirasi Anda untuk mencoba membuat cookie sendiri di rumah.">

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

            /* Container for title */
            .responsive-box {
                width: 100%;
                max-width: 236px;
                margin: 50px auto 0 auto; /* Menambahkan margin-top 50px */
                position: relative;
                padding: 10px; /* Tambahkan sedikit padding untuk lebih responsif */
            }

            .box {
                width: 100%;
                padding-top: 22.46%; /* Menjaga aspek rasio kotak tetap sama */
                position: relative;
                background: white;
                border: 3px #C7A07A solid;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* Tambahkan shadow untuk efek lebih elegan */
            }

            .text {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: #391E10;
                font-size: calc(16px + 2vw); /* Responsif dengan ukuran font berdasarkan viewport width */
                font-family: Inika, serif;
                font-weight: 400;
                line-height: 1.1;
                word-wrap: break-word;
            }

            /* 6 artikel */
            .Background {
              width: 100%;
              height: auto;
              position: relative;
              background: white;
            }

            .Container {
              width: 90%;
              max-width: 1110px;
              height: auto;
              margin: 0 auto;
              position: relative;
            }

            .Frame299 {
              width: 100%;
              height: auto;
              position: relative;
              display: flex;
              flex-wrap: wrap;
              justify-content: space-between;
              margin-top: 20px;
            }

            .ListitemLink {
              width: 100%;
              max-width: 350px;
              height: auto;
              background: white;
              border-radius: 12px;
              border: 1px solid #E0E0E0;
              display: inline-flex;
              flex-direction: column;
              justify-content: flex-start;
              align-items: center;
              margin: 20px 0;
              min-height: 400px; /* Sesuaikan ukuran sesuai kebutuhan */
            }

            /* Efek hover untuk ListitemLink */
            .ListitemLink:hover {
              transform: translateY(-5px); /* Angkat kotak saat dihover */
              box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Tambah bayangan */
            }

            .ListitemLink img {
              width: 100%;
              height: auto;
              border-top-left-radius: 6px;
              border-top-right-radius: 6px;
            }

            .Heading3 {
              width: 318px;
              height: auto;
              text-align: center;
              font-size: 20px;
              font-family: Inika;
              font-weight: 700;
              line-height: 32px;
              margin-top: 10px;
            }

            .text2 {
              width: 90%;
              max-width: 318px;
              color: #696969;
              font-size: 16px;
              font-family: Inika;
              font-weight: 400;
              line-height: 24px;
              margin-top: 10px;
              text-align: justify;
            }

            /* Responsive Design */
            @media (max-width: 1200px) {
              .Container {
                width: 95%;
              }

              .Frame299 {
                justify-content: center;
              }
            }

            @media (max-width: 768px) {
              .Container {
                width: 100%;
              }

              .Frame299 {
                justify-content: space-between;
              }

              .Heading3 {
                font-size: 18px;
              }

              .text1 {
                font-size: 14px;
              }
            }

            @media (max-width: 576px) {
              .Frame299 {
                flex-direction: column;
                align-items: center;
              }

              .ListitemLink {
                width: 100%;
                max-width: 100%;
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
              <a href="<?= base_url('artikel') ?>" class="active" >Artikel</a>
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
              Artikel dari Joyful Crunch
          </div>
      </div>
  </div>
      <div class="responsive-box">
        <div class="box"></div>
        <div class="text"> Artikel</div>
      </div>
    <div class="Background">
      <div class="Container">
        <div class="Frame299">

          <!-- artikel 1 -->
          <div class="ListitemLink">
              <img alt="artikel1" src="image/artikel1.png" />
              <div class="Heading3">
                  <a href="<?= base_url('artikel1') ?>" style="text-decoration: none; color: inherit;">
                      "Panduan Memulai Bisnis Cookies dari Rumah"
                  </a>
              </div>
              <div class="text2" style="text-align: justify;">
                  Mulai bisnis cookies dari rumah dengan panduan langkah demi langkah. Temukan cara efektif untuk memulai dan mengembangkan usaha Anda hingga sukses.
              </div>
          </div>

          <!-- artikel 2 -->
          <div class="ListitemLink">
            <img alt="artikel2" src="image/artikel2.png" />
            <div class="Heading3">
              <a href="<?= base_url('artikel2') ?>" style="text-decoration: none; color: inherit;">
                "Resep Cookies Sukses: Bahan dan Teknik Penting"
              </a>
            </div>
            <div class="text2">Ingin tahu rahasia cookies yang selalu enak? Pelajari cara memilih bahan terbaik dan teknik memanggang yang bisa membuat perbedaan besar!</div>
          </div>

          <!-- artikel 3 -->
          <div class="ListitemLink">
            <img alt="artikel3" src="image/artikel3.png" />
            <div class="Heading3">
              <a href="artikel3.html" style="text-decoration: none; color: inherit;">
                "Inovasi Rasa Cookies yang Memikat Pelanggan"
              </a>
            </div>
            <div class="text2">Buat cookies Anda beda dari yang lain! Jelajahi ide rasa baru yang bisa menarik perhatian dan selera pelanggan.</div>
          </div>

          <!-- artikel 4 -->
          <div class="ListitemLink">
            <img alt="artikel4" src="image/artikel4.png" />
            <div class="Heading3">
              <a href="artikel4.html" style="text-decoration: none; color: inherit;">
                "Media Sosial untuk Mengembangkan Bisnis Cookies"
              </a>
            </div>
            <div class="text2">Optimalkan media sosial untuk memperluas jangkauan bisnis cookies Anda. Dapatkan tips untuk menarik lebih banyak pelanggan secara online.</div>
          </div>

          <!-- artikel 5 -->
          <div class="ListitemLink">
            <img alt="artikel5" src="image/artikel5.png" />
            <div class="Heading3">
              <a href="artikel5.html" style="text-decoration: none; color: inherit;">
                "Kemasan Ramah Lingkungan untuk Bisnis Cookies"              
              </a>
            </div>
            <div class="text2">Ketahui bagaimana kemasan ramah lingkungan bisa membuat bisnis cookies Anda lebih menarik bagi konsumen yang peduli lingkungan.</div>
          </div>

          <!-- artikel 6 -->
          <div class="ListitemLink">
            <img alt="artikel6" src="image/artikel6.png" />
            <div class="Heading3">
              <a href="artikel6.html" style="text-decoration: none; color: inherit;">
                "Program Langganan: Tingkatkan Loyalitas Pelanggan"
              </a>
            </div>
            <div class="text2">Pelajari cara membuat pelanggan tetap setia dengan program langganan yang menawarkan nilai lebih dan keuntungan jangka panjang.</div>
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
</html>
