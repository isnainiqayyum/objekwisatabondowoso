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
                <img style="width: 100%; height: auto; border-bottom: 0.35vw #734128 solid;" alt="artikel1" src="image/artikel5.5.png" />
                <div style="padding: 20px;">
                    <div style="color: #734128; font-size: 0.97vw; font-family: Inika; font-weight: 400; margin-bottom: 20px;">
                        7 Agustus 2014
                    </div>
                    <div style="color: #734128; font-size: 3.5vw; font-family: Inika; font-weight: 700; margin-bottom: 30px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                        Kemasan Ramah Lingkungan untuk Bisnis Cookies
                    </div>
                    <div style="color: #734128; font-size: 1.11vw; font-family: Inika; font-weight: 400;">
                    Ketahui bagaimana kemasan ramah lingkungan bisa membuat bisnis cookies Anda lebih menarik bagi konsumen yang peduli lingkungan. Saat ini, semakin banyak pelanggan yang memperhatikan dampak lingkungan dari produk yang mereka beli. Menggunakan kemasan yang ramah lingkungan tidak hanya baik untuk bumi, tetapi juga bisa menjadi nilai tambah yang membuat produk Anda lebih disukai. Berikut adalah beberapa cara untuk mengadopsi kemasan ramah lingkungan dalam bisnis cookies Anda:<br><br>

                    
                    <strong>1. Pilih Material Kemasan yang Biodegradable</strong><br>
                    Material biodegradable adalah bahan yang dapat terurai secara alami tanpa meninggalkan residu berbahaya. Ini menjadi pilihan utama bagi bisnis yang ingin mengurangi limbah plastik. Beberapa material kemasan ramah lingkungan yang bisa digunakan untuk produk cookies adalah:<br>

                    Kertas Daur Ulang: Kertas yang terbuat dari bahan daur ulang sangat cocok untuk bungkus cookies atau kotak kecil. Pastikan kertas yang digunakan tidak dilapisi plastik agar bisa terurai sepenuhnya.<br>
                    Plastik Biodegradable: Plastik jenis ini dirancang untuk terurai lebih cepat dibandingkan plastik konvensional. Biasanya terbuat dari bahan seperti pati jagung atau tebu.<br>
                    Kain Muslin atau Serbet Katun: Bungkus cookies dalam serbet kain yang bisa digunakan ulang. Ini tidak hanya mengurangi limbah tetapi juga menambah sentuhan estetika dan unik pada produk Anda.<br><br>
                    
                    <strong>2. Gunakan Kemasan yang Bisa Digunakan Kembali (Reusable)</strong><br>
                    Salah satu cara untuk mengurangi limbah adalah dengan menggunakan kemasan yang bisa digunakan kembali oleh pelanggan. Ini bisa berupa:<br>

                    Kaleng atau Toples: Cookies yang dikemas dalam kaleng atau toples bisa menjadi pilihan menarik. Setelah cookies habis, pelanggan dapat menggunakan kaleng tersebut untuk menyimpan barang lain. Selain ramah lingkungan, ini juga meningkatkan kesan premium pada produk Anda.<br>
                    Kantong Kanvas atau Tote Bag: Cobalah berikan kemasan tambahan berupa kantong kanvas kecil yang bisa digunakan untuk keperluan lain. Ini akan menjadi kenang-kenangan yang dapat mengingatkan pelanggan pada merek Anda.<br><br>
                    
                    <strong>3. Desain Kemasan yang Minimalis dan Hemat Materia</strong>l<br>
                    Desain kemasan yang terlalu rumit seringkali menggunakan bahan tambahan yang tidak perlu. Cobalah untuk merancang kemasan yang minimalis namun tetap menarik. Beberapa cara untuk mengurangi penggunaan material adalah:<br>

                    Menghindari Lapisan Ganda: Hindari penggunaan lapisan plastik tambahan yang tidak perlu. Pilih satu jenis kemasan yang cukup kuat untuk melindungi produk namun tetap mudah diurai atau didaur ulang.<br>
                    Pilih Desain Cetak yang Sederhana: Gunakan tinta ramah lingkungan dan desain yang sederhana agar tidak menghabiskan banyak bahan. Ini juga menciptakan kesan bersih dan modern yang disukai banyak konsumen.<br><br>
                    
                    <strong>4. Sertakan Informasi tentang Ramah Lingkungan pada Kemasan</strong><br>
                    Jangan hanya menggunakan kemasan ramah lingkungan, tetapi pastikan juga pelanggan Anda tahu tentang hal itu. Cantumkan informasi singkat di kemasan yang menyebutkan bahwa bahan tersebut biodegradable, daur ulang, atau reusable. Beberapa tips adalah:<br>

                    Label atau Stiker: Tempelkan label yang menyatakan "Kemasan Ramah Lingkungan" atau "100% Biodegradable" sehingga pelanggan menyadari komitmen Anda terhadap lingkungan.<br>
                    Pesan Edukasi: Sertakan pesan pendek tentang pentingnya daur ulang atau pengurangan limbah. Ini tidak hanya memberikan informasi tetapi juga membangun citra positif bagi merek Anda.<br><br>
                    
                    <strong>5. Berkolaborasi dengan Supplier Kemasan yang Berkelanjutan</strong><br>
                    Cari supplier kemasan yang memiliki komitmen terhadap praktik berkelanjutan dan peduli lingkungan. Mereka biasanya menyediakan berbagai pilihan kemasan ramah lingkungan yang bisa Anda pilih sesuai kebutuhan bisnis.<br>

                    Supplier Lokal: Menggunakan supplier lokal membantu mengurangi emisi karbon yang dihasilkan dari pengiriman jarak jauh. Selain itu, Anda juga bisa mendukung ekonomi lokal.<br>
                    Supplier dengan Sertifikasi Lingkungan: Pilih supplier yang memiliki sertifikasi lingkungan seperti FSC (Forest Stewardship Council) untuk memastikan bahwa material yang digunakan berasal dari sumber yang bertanggung jawab.<br><br>
                    
                    <strong></strong>6. Mengadopsi Praktik Berkelanjutan dalam Produksi<br>
                    Menggunakan kemasan ramah lingkungan adalah langkah yang baik, tetapi juga penting untuk memastikan seluruh rantai produksi Anda mendukung konsep keberlanjutan. Beberapa langkah yang bisa diambil adalah:<br>

                    Mengurangi Limbah Produksi: Kurangi limbah selama proses produksi dengan menggunakan bahan baku yang efisien.<br>
                    Penggunaan Energi Terbarukan: Jika memungkinkan, gunakan sumber energi terbarukan di fasilitas produksi Anda untuk mengurangi jejak karbon.<br><br>
                    Dengan mengadopsi kemasan ramah lingkungan, bisnis cookies Anda tidak hanya ikut berkontribusi pada pelestarian lingkungan, tetapi juga menarik perhatian konsumen yang semakin peduli dengan keberlanjutan. Langkah ini dapat menjadi bagian dari strategi pemasaran Anda yang menonjolkan komitmen bisnis terhadap lingkungan, sekaligus memberi nilai tambah pada produk Anda di mata pelanggan. Selamat mencoba, dan semoga bisnis cookies Anda semakin berkembang dengan inovasi kemasan yang lebih ramah lingkungan!
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

            <!-- Artikel 1 -->
            <a href="artikel2.html" style="text-decoration: none;">
                <div style="box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25); border: 0.07vw #734128 solid; padding: 10px; margin-bottom: 20px; max-width: 100%; display: flex; align-items: center;">
                    <img style="width: 40%; height: auto; margin-right: 10px;" src="image/artikel1.png" />
                    <div style="flex-grow: 1;">
                        <div style="color: #734128; font-size: 0.97vw; font-family: Inika; margin-bottom: 5px;">
                            7 Agustus 2024
                        </div>
                        <div style="color: #734128; font-size: 1.11vw; font-family: Inika;">
                            "Panduan Memulai Bisnis...
                        </div>
                    </div>
                </div>   
            </a>

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
                    <img style="width: 40%; height: auto; margin-right: 10px;" src="image/artikel4.png" />
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

            <!-- Artikel 6 -->
            <a href="artikel6.html" style="text-decoration: none;">
                <div style="box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25); border: 0.07vw #734128 solid; padding: 10px; margin-bottom: 20px; max-width: 100%; display: flex; align-items: center;">
                    <img style="width: 40%; height: auto; margin-right: 10px;" src="image/artikel6.png" />
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