<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>produk</title>
      <!-- Meta Tags -->
      <meta name="title" content="Produk">
      <meta name="description" content="Jelajahi koleksi produk Joyfullcrunch yang menawarkan berbagai cookie lezat dan renyah. Dari rasa klasik seperti cokelat chip hingga kombinasi inovatif, setiap cookie dibuat dengan bahan berkualitas tinggi untuk memuaskan selera Anda.">

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

            /* Animasi hover untuk produk */
            a {
                text-decoration: none;
                color: inherit;
            }

            a div {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            a div:hover {
                transform: translateY(-5px); /* Mengangkat produk sedikit */
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Tambah bayangan */
            }


            /* Responsif untuk layar yang lebih kecil */
            @media (max-width: 768px) {
                .responsive-box {
                    max-width: 90%; /* Atur ulang lebar kotak untuk layar kecil */
                }

                .box {
                    padding-top: 30%; /* Sesuaikan aspek rasio agar lebih tinggi pada layar kecil */
                }

                .text {
                    font-size: calc(14px + 3vw); /* Ukuran font yang lebih kecil untuk layar kecil */
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
              <a href="<?= base_url('produk') ?>" class="active">Produk</a>
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
              Produk Joyful Crunch
          </div>
      </div>
  </div>
      <div class="responsive-box">
        <div class="box"></div>
        <div class="text">Produk</div>
      </div>
      <div style="width: 100%; padding-right: 5%;padding-top: 50px; padding-bottom: 50px; background: white; justify-content: center; align-items: center; display: flex; flex-wrap: wrap;">
        <div style="width: 100%; max-width: 1070px; position: relative; display: flex; justify-content: space-between; flex-wrap: wrap;"> 
        
            <!-- produk1 -->
            <a href="<?= base_url('produk1') ?>" style="text-decoration: none; color: inherit;">
                <div style="width: 235px; height: 355px; position: relative; border-radius: 20px; overflow: hidden; margin-bottom: 20px;">
                    <img style="width: 235px; height: 420px; position: absolute; top: -117px; border-radius: 20px;" alt="cookiecoklat" src="image/cookiecoklat.png" />
                    <div style="width: 357px; height: 357px; position: absolute; left: -89px; top: 226px; background: #C7A07A; border-radius: 9999px;"></div>
                    <div style="position: absolute; left: 22px; top: 251px; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word;">Cookie <br/>coklat</div>
                    <div style="width: 55px; height: 40px; position: absolute; left: 6px; top: 9px; display: inline-flex; justify-content: center; align-items: center;">
                        <img style="width: 55px; height: 40px;" alt="logokecil" src="image/logokecil.png" />
                    </div>
                </div>
            </a>

            <!-- produk2 -->
            <a href="<?= base_url('produk1') ?>" style="text-decoration: none; color: inherit;">
                <div style="width: 235px; height: 355px; position: relative; border-radius: 20px; overflow: hidden; margin-bottom: 20px;">
                    <img style="width: 264px; height: 420px; position: absolute; left: -29px; top: -88px; border-radius: 20px;" alt="cookiegula" src="image/cookiegula.png" />
                    <div style="width: 357px; height: 357px; position: absolute; left: -89px; top: 226px; background: #C7A07A; border-radius: 9999px;"></div>
                    <div style="position: absolute; left: 28px; top: 247px; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word;">Cookie <br/>Gula</div>
                    <div style="width: 55px; height: 40px; position: absolute; left: 6px; top: 9px; display: inline-flex; justify-content: center; align-items: center;">
                        <img style="width: 55px; height: 40px;" alt="logokecil" src="image/logokecil.png" />
                    </div>
                </div>
            </a>

            <!-- produk3 -->  
            <a href="<?= base_url('produk1') ?>" style="text-decoration: none; color: inherit;">
                <div style="width: 235px; height: 355px; position: relative; border-radius: 20px; overflow: hidden; margin-bottom: 20px;">
                    <img style="width: 254px; height: 420px; position: absolute; top: -9px; border-radius: 20px;" alt="eskrimcookie" src="image/eskrimcookie.png" />
                    <div style="width: 357px; height: 357px; position: absolute; left: -89px; top: 226px; background: #C7A07A; border-radius: 9999px;"></div>
                    <div style="position: absolute; left: 21px; top: 251px; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word;">Es Krim <br/>Cookies</div>
                    <div style="width: 55px; height: 40px; position: absolute; left: 6px; top: 9px; display: inline-flex; justify-content: center; align-items: center;">
                        <img style="width: 55px; height: 40px;" alt="logokecil" src="image/logokecil.png" />
                    </div>
                </div>
            </a>

            <!-- produk4 -->  
            <a href="<?= base_url('produk1') ?>" style="text-decoration: none; color: inherit;">
                <div style="width: 235px; height: 355px; position: relative; border-radius: 20px; overflow: hidden; margin-bottom: 20px;">
                    <img style="width: 235px; height: 420px; position: absolute; top: -83px; border-radius: 20px;" alt="cookieboom" src="image/cookieboom.png" />
                    <div style="width: 357px; height: 357px; position: absolute; left: -89px; top: 226px; background: #C7A07A; border-radius: 9999px;"></div>
                    <div style="position: absolute; left: 26px; top: 252px; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word;">Cookie <br/>Boom</div>
                    <div style="width: 55px; height: 40px; position: absolute; left: 6px; top: 9px; display: inline-flex; justify-content: center; align-items: center;">
                        <img style="width: 55px; height: 40px;" alt="logokecil" src="image/logokecil.png" />
                    </div>
                </div>
            </a>
            
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