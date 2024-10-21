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

<!-- Container utama yang menyesuaikan panjang artikel -->
<div style="width: 100vw; display: flex; flex-direction: column; justify-content: space-between; background: white; margin-top: 70px;">
    <!-- Konten Utama -->
    <div style="display: flex; justify-content: space-between; padding: 20px;">
        <!-- Artikel -->
        <div style="display: flex; justify-content: center; margin-left: 7%;">
            <div style="max-width: 100%; border: 0.35vw #734128 solid; background-color: white; box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25);">
                <img style="width: 100%; height: auto; border-bottom: 0.35vw #734128 solid;" alt="artikel1" src="image/artikel1.1.png" />
                <div style="padding: 20px;">
                    <div style="color: #734128; font-size: 0.97vw; font-family: Inika; font-weight: 400; margin-bottom: 20px;">
                        7 Agustus 2024
                    </div>
                    <div style="color: #734128; font-size: 3.5vw; font-family: Inika; font-weight: 700; margin-bottom: 30px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                        Panduan Memulai Bisnis Cookies dari Rumah
                    </div>
                    <div style="color: #734128; font-size: 1.11vw; font-family: Inika; font-weight: 400;">
                        Mulai bisnis cookies dari rumah dengan panduan langkah demi langkah ini, dan bayangkan dapur Anda dipenuhi aroma manis dari cookies yang baru saja dipanggang. Setiap gigitan membawa senyum di wajah pelanggan, dan memulai bisnis cookies dari rumah bisa menjadi awal dari perjalanan sukses yang penuh kelezatan. Artikel ini akan membantu Anda memulainya dengan cara yang sederhana namun efektif.<br/><br/>
                        <strong>1. Temukan Keunikan Brand Anda</strong><br/>
                        Identifikasi apa yang membuat cookies Anda berbeda dari yang lain—apakah itu bahan-bahan organik, resep turun-temurun, atau bentuk cookies yang kreatif dan menarik. Keunikan ini akan menjadi daya tarik utama yang membuat pelanggan penasaran dan ingin mencoba produk Anda.<br/><br/>
                        <strong>2. Siapkan Dapur Anda</strong><br/>
                        Pastikan dapur Anda siap untuk produksi cookies dalam jumlah yang cukup. Anda tidak perlu peralatan mahal, tapi penting untuk memiliki peralatan dasar seperti oven dan mixer yang berkualitas. Dapur yang terorganisir dan bersih akan memudahkan proses produksi dan memastikan kualitas cookies tetap konsisten.<br/><br/>
                        <strong>3. Kreasikan Resep yang Memikat</strong><br/>
                        Ciptakan resep cookies yang unik dan lezat, yang bisa membuat pelanggan kembali lagi. Bereksperimenlah dengan berbagai bahan dan rasa untuk menemukan kombinasi yang sempurna, dan pastikan cookies Anda menawarkan keseimbangan antara tekstur yang renyah dan rasa yang menggugah selera.<br/><br/>
                        <strong>4. Manfaatkan Kekuatan Media Sosial</strong><br/>
                        Manfaatkan media sosial untuk memperkenalkan produk Anda kepada pasar yang lebih luas. Buat akun Instagram atau Facebook yang menarik, unggah foto-foto cookies yang menggugah selera, dan gunakan cerita serta testimoni pelanggan untuk meningkatkan kepercayaan dan menarik lebih banyak pembeli.<br/><br/>
                        <strong>5. Kelola Keuangan dengan Bijak</strong><br/>
                        Pengelolaan keuangan yang tepat sangat penting untuk kesuksesan bisnis. Hitung semua biaya produksi secara detail dan tetapkan harga jual yang menguntungkan namun tetap kompetitif. Pastikan juga untuk mengatur arus kas dengan baik, sehingga bisnis Anda dapat tumbuh dan berkembang.<br/><br/>
                        Dengan sedikit kreativitas dan perencanaan, Anda bisa mengubah hasrat memanggang cookies menjadi bisnis yang menguntungkan. Jadikan setiap batch cookies Anda istimewa, dan biarkan pelanggan menikmati hasil kerja keras Anda. Selamat memulai perjalanan manis ini!
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Baca Juga -->
        <div style="width: 30%; padding-left: 40px; padding-right: 7%;">
            <div style="width: 250px; border: 0.14vw #C7A07A solid; background-color: white; padding: 5px;">
                <div style="text-align: center; color: #391E10; font-size: 2.5vw; font-family: Inika; font-weight: 400;">
                    Baca Juga
                </div>
            </div>
            <div style="border: 0.21vw #391E10 solid; margin: 20px 0;"></div>

            <!-- Artikel 2 -->
            <a href="artikel2.html" style="text-decoration: none;">
                <div style="box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25); border: 0.07vw #734128 solid; padding: 10px; margin-bottom: 20px; max-width: 100%; display: flex; align-items: center;">
                    <img style="width: 40%; height: auto; margin-right: 10px;" alt="artikel2" src="image/artikel2.png" />
                    <div style="flex-grow: 1;">
                        <div style="color: #734128; font-size: 0.97vw; font-family: Inika; margin-bottom: 5px;">
                            20 Agustus 2024
                        </div>
                        <div style="color: #734128; font-size: 1.11vw; font-family: Inika;">
                            "Resep Cookies Sukses...
                        </div>
                    </div>
                </div>   
            </a>

            <!-- Artikel 3 -->
            <a href="artikel3.html" style="text-decoration: none;">
                <div style="box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25); border: 0.07vw #734128 solid; padding: 10px; margin-bottom: 20px; max-width: 100%; display: flex; align-items: center;">
                    <img style="width: 40%; height: auto; margin-right: 10px;" alt="artikel3" src="image/artikel3.png" />
                    <div style="flex-grow: 1;">
                        <div style="color: #734128; font-size: 0.97vw; font-family: Inika; margin-bottom: 5px;">
                            24 Agustus 2024
                        </div>
                        <div style="color: #734128; font-size: 1.11vw; font-family: Inika;">
                            "Inovasi Rasa Cookies...
                        </div>
                    </div>
                </div>   
            </a>

            <!-- Artikel 4 -->
            <a href="artikel4.html" style="text-decoration: none;">
                <div style="box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25); border: 0.07vw #734128 solid; padding: 10px; margin-bottom: 20px; max-width: 100%; display: flex; align-items: center;">
                    <img style="width: 40%; height: auto; margin-right: 10px;" alt="artikel4" src="image/artikel4.png" />
                    <div style="flex-grow: 1;">
                        <div style="color: #734128; font-size: 0.97vw; font-family: Inika; margin-bottom: 5px;">
                            26 Agustus 2024
                        </div>
                        <div style="color: #734128; font-size: 1.11vw; font-family: Inika;">
                            "Media Sosial untuk...
                        </div>
                    </div>
                </div>   
            </a>

            <!-- Artikel 5 -->
            <a href="artikel5.html" style="text-decoration: none;">
                <div style="box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25); border: 0.07vw #734128 solid; padding: 10px; margin-bottom: 20px; max-width: 100%; display: flex; align-items: center;">
                    <img style="width: 40%; height: auto; margin-right: 10px;" alt="artikel5" src="image/artikel5.png" />
                    <div style="flex-grow: 1;">
                        <div style="color: #734128; font-size: 0.97vw; font-family: Inika; margin-bottom: 5px;">
                            26 Agustus 2024
                        </div>
                        <div style="color: #734128; font-size: 1.11vw; font-family: Inika;">
                            "Kemasan Ramah Lingkungan...
                        </div>
                    </div>
                </div>   
            </a>

            <!-- Artikel 6 -->
            <a href="artikel6.html" style="text-decoration: none;">
                <div style="box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25); border: 0.07vw #734128 solid; padding: 10px; margin-bottom: 20px; max-width: 100%; display: flex; align-items: center;">
                    <img style="width: 40%; height: auto; margin-right: 10px;" alt="artikel6" src="image/artikel6.png" />
                    <div style="flex-grow: 1;">
                        <div style="color: #734128; font-size: 0.97vw; font-family: Inika; margin-bottom: 5px;">
                            26 Agustus 2024
                        </div>
                        <div style="color: #734128; font-size: 1.11vw; font-family: Inika;">
                            "Program Langgana...
                        </div>
                    </div>
                </div>   
            </a>
        </div>
    </div>
</div>


    <!-- Footer -->
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