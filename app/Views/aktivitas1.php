<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Aktivitas</title>
    <!-- Meta Tags -->
    <meta name="title" content="Aktivitas">
    <meta name="description" content="Ikuti aktivitas menarik di Joyfullcrunch! Bergabunglah dalam acara dan workshop kami untuk belajar membuat cookie, mencicipi produk baru, dan merayakan momen spesial bersama komunitas pecinta cookie.">

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

            .Frame273 {
                width: 100%;
                max-width: 1440px;
                padding: 68px 20px;
                background: white;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin: 0 auto;
            }

            .Group29 {
                width: 100%;
                max-width: 1116px;
                background: #F3F3F3;
                padding: 40px;
                border-radius: 12px;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 40px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                /* Use row-reverse to flip image and text */
                flex-direction: row-reverse;
            }


            .CookieClassImage img {
                width: 300px;
                height: 350px;
                border-radius: 20px;
                position: relative;
                top: 60px; /* Adjust this value to move the image down */
                left: 40px; /* Adjust this value to move the image to the right */
            }


            .CookieClassText {
                max-width: 644px;
                position: relative;
                left: -20px; /* Adjust this value to move the text more to the left */
            }

            .CookieClass {
                color: #734128;
                font-size: 36px;
                font-family: Inika, serif;
                font-weight: 700;
                margin-bottom: 20px;
                text-align: left;
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Add text shadow */
            }

            .CookieClassDescription {
                color: #333;
                font-size: 16px;
                font-family: 'Inika', serif;
                line-height: 1.6;
                text-align: justify;
            }

            /* Media Queries for Responsiveness */
            @media (max-width: 768px) {
                .Group29 {
                    flex-direction: column;
                    align-items: center;
                }

                .CookieClassImage img {
                    max-width: 100%;
                    margin-bottom: 20px;
                }

                .CookieClassText {
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
              <a href="<?= base_url('artikel') ?>">Artikel</a>
              <a href="<?= base_url('produk') ?>">Produk</a>
              <a href="<?= base_url('aktivitas') ?>" class="active">Aktivitas</a>
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
              Aktivitas Joyful Crunch
          </div>
      </div>
  </div>

    <!-- keterangan -->
    <div class="Frame273">
        <div class="Group29">
            <div class="CookieClassText">
                <div class="CookieClass">
                    Cookie Customization
                </div>
                <div class="CookieClassDescription">
                    At Joyful Crunch, the cookie classes offer a fun and engaging way to dive into the world of baking and decorating cookies. Whether you’re completely new to baking or have some experience, these classes cater to all skill levels, providing hands-on guidance and support. You’ll learn how to make a variety of cookies from scratch, exploring different flavors, textures, and techniques. Along the way, expert instructors will guide you through the process of decorating your cookies with precision and creativity, using various tools and edible decorations to create beautiful, professional-looking treats.
                    <br /><br />
                    Beyond learning the basics of baking and decorating, these classes are designed to inspire creativity and make the experience truly enjoyable. You’ll get to experiment with different designs, colors, and patterns, making each cookie unique. By the end of the class, participants not only take home delicious, homemade cookies but also new skills and a sense of accomplishment. Joyful Crunch ensures that every class is filled with fun, laughter, and the joy of creating something delightful from scratch, making it a perfect way to spend time with family and friends or to simply indulge in the art of baking.                
                </div>
            </div>
            <div class="CookieClassImage">
                <img class="F2f9a0b2985d97fe873e5605d301" src="image/cookieclass.png" alt="CookieClass" />
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
</div>