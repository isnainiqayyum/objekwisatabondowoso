<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Beranda</title>
    
   <!-- Meta Tags -->
   <meta name="title" content="Beranda">
   <meta name="description" content="Selamat datang di Joyfullcrunch! Temukan berbagai macam cookie lezat dan renyah, dari resep klasik hingga inovatif. Setiap cookie dipanggang dengan cinta menggunakan bahan berkualitas tinggi. Camilan sempurna untuk setiap kesempatan!">

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

            /* Konten responsif */
            .content {
                width: 100%;
                height: auto;
                min-height: calc(80vh - 100px); /* Sisa layar setelah header (75px + padding-bottom) */
                display: flex;
                justify-content: center;
                align-items: flex-end; /* Posisi konten lebih ke bawah */
                background-image: url('image/bg2.png');
                position: relative;
                background-size: cover;
                background-position: center;
                padding-bottom: 100px; /* Tambahkan padding bawah agar teks tidak terlalu dekat dengan tepi */
                border-radius: 20px; /* Atur sesuai keinginan, misal 20px untuk lengkungan sedang */
                overflow: hidden; /* Pastikan konten tidak keluar dari batas lengkungan */
                padding-top: 75px; /* Sesuaikan padding-top dengan tinggi header */
            }

            /* Overlay di atas gambar untuk menambah kontras dengan teks */
            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Warna overlay transparan */
                z-index: 0;
            }

            .text-container {
                position: relative;
                z-index: 1;
                text-align: center;
                color: #FDFCE8;
                width: 100%;
                padding: 20px;
                max-width: 1300px; /* Menentukan lebar maksimal teks */
                margin-bottom: 150px; /* Menyesuaikan margin bawah */
            }

            .text-container h1 {
                font-size: 3vw; /* Menggunakan unit viewport untuk ukuran teks yang responsif */
                font-family: 'PoetsenOne', sans-serif;
                font-weight: 400;
                margin: 0;
                
            }

            .text-container p {
                font-size: 1vw; /* Ukuran teks paragraf responsif */
                font-family: 'Ponnala', sans-serif;
                font-weight: 400;
                line-height: 1.5;
                max-width: 65%;
                margin: 20px auto 0;
                word-wrap: break-word;
                font-style: italic;
            }

            .button-container {
                width: 253px;
                height: 60px;
                background: #734128;
                border-radius: 25px;
                display: flex;
                justify-content: center;
                align-items: center;
                position: absolute;
                left: 1000px;
                top: 453px;
            }

            .button-text {
                color: #FDFCE8;
                font-size: 20px;
                font-family: Roboto, sans-serif;
                font-weight: 700;
                line-height: 40px;
                text-align: center;
            }

            /* Main container styling */
            .main-container {
                width: 100%;
                padding-top: 10px;
                background: #E2CEB1;
                margin: 0;
            }

            /* Centered text and emoji styling */
            .container {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 120px; /* Adjust as needed */
                padding: 12px; /* Adjust as needed */
                width: 100%;
            }

            .text-wrapper {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .emoji {
                font-size: 40px;
                margin-right: 10px; /* Space between emoji and text */
            }

            .text {
                color: #734128;
                font-size: 40px;
                font-family: Roboto, sans-serif;
                font-weight: 700;
                line-height: 40px;
                word-wrap: break-word;
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
            <a href="<?= base_url('/') ?>" class="active">Beranda</a>
            <a href="<?= base_url('tentang') ?>">Tentang</a>
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

      <!-- Konten dengan teks yang responsif -->
        <div class="content">
            <div class="overlay"></div>

            <!-- Teks yang di atas overlay -->
            <div class="text-container">
                <h1>Selamat datang di Cookie</h1>
                <p>"Di Joyful Crunch, setiap gigitan menghadirkan senyuman. Setiap kue dibuat dengan cinta, perhatian, dan sentuhan ajaib. Biarkan Cookie menuntun Anda ke cita rasa yang menyenangkan, menambahkan sedikit kebahagiaan ekstra pada hari Anda, baik Anda menikmatinya sendiri atau bersama orang-orang terkasih."</p>            </div>
        </div>

        <div style="width: 96px; height: 727px; padding-left: 32px; padding-right: 32px; padding-top: 584px; padding-bottom: 584px; left: 1343px; top: -23px; position: absolute; opacity: 0.50; justify-content: center; align-items: center; display: inline-flex">
          <div style="width: 50px; padding-top: 2.37px; padding-bottom: 2.37px; padding-left: 13.37px; border-radius: 25px; justify-content: flex-end; align-items: center; display: flex">
          </div>
        </div>
        
        <!-- Main Section for About Us -->
        <div class="about-section" style="width: 100vw; height: auto; background: white; padding: 50px 0;">
          <div style="text-align: center;">
            <!-- About Us Header -->
            <div style="margin-bottom: 25px; text-align: left; margin: 0 auto; max-width: 1200px;">
                <h2 style="color: #734128; font-size: 35px; font-family: Inika; font-weight: 400; margin: 10px 0;">Tentang Kami</h2>
                <div style="width: 150px; height: 2px; background-color: #391E10; margin: 0 0 10px 0;"></div>
            </div>
            <!-- Joyful Crunch Section -->
            <div style="display: flex; justify-content: center; align-items: flex-start; margin-bottom: 40px;">
              <!-- Logo -->
              <div style="margin-right: 20px; margin-top: 50px;"> <!-- Menambahkan margin-top -->
                <img src="image/logomaskot.png" alt="Logo Maskot" style="width: 250px; height: 180px;">
            </div>

              <!-- Text Section -->
              <div style="max-width: 733px; text-align: left; padding-left: 100px;"> <!-- Menambahkan padding-left -->
                  <h1 style="color: #391E10; font-size: 40px; font-family: Inika; font-weight: 700;">Joyful Crunch</h1>
                  <p style="color: #734128; font-size: 20px; font-family: Inika; font-weight: 400; line-height: 30px;">
                      Di Joyful Crunch, kami percaya bahwa kebahagiaan dimulai dengan gigitan pertama kue yang sempurna. Dipandu oleh maskot ceria kami, Cookie, setiap kue dibuat dengan cinta dan bahan-bahan terbaik. Kami berkomitmen untuk memberikan kelezatan yang menghadirkan senyum di setiap momen spesial. Dengan setiap gigitan, kami tidak hanya menawarkan rasa yang lezat, tetapi juga pengalaman yang menyebarkan kebahagiaan ke dalam hidup Anda.
                  </p>
              </div>
            </div>

            <!-- Read More Button -->
            <div style="text-align: center; margin-bottom: 50px;">
                <button style="padding: 10px 30px; background-color: #734128; color: white; font-size: 16px; font-family: Inika; border: none; cursor: pointer; border-radius: 25px; margin-left: 800px;">Baca Selengkapnya</button>
            </div>
          </div>
        </div>


        <!-- Separate Section for "Every Bite, a Burst of Joy" -->
        <div class="every-bite-section" style="width: 100vw; background-color: #E2CEB1; padding: 30px 0; margin-top: 30px;">
          <div class="container" style="text-align: center;">
            <div class="text-wrapper" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
              <div class="emoji" style="font-size: 3rem;">😊</div> <!-- Emoji as the icon -->
              <div class="text" style="font-size: 2rem; font-family: 'Inika', serif;">Setiap Gigitan, Ledakan Kebahagiaan</div>
            </div>
          </div>
        </div>

        <!-- Product -->
        <div style="width: 100%; padding-right: 5%;padding-top: 50px; padding-bottom: 50px; background: white; justify-content: center; align-items: center; display: flex; flex-wrap: wrap;">
        <div style="width: 1070.02px; height: 538px; position: relative">
              <div style="width: 1070.02px; height: 421.75px; left: 0px; top: 0px; position: absolute; background: #734128; border-radius: 20px">
                <div style="width: 802px; height: 108px; left: 133px; top: 10px; position: absolute; text-align: center; color: #FDFCE8; font-size: 40px; font-family: Inika; font-weight: 700; line-height: 54px; word-wrap: break-word">Produk</div>
                <div style="width: 580px; height: 48px; left: 244px; top: 70px; position: absolute; text-align: center; color: #FDFCE8; font-size: 16px; font-family: Inika; font-weight: 400; line-height: 24px; word-wrap: break-word">Temukan Kenikmatan di Setiap Gigitan!</div>
                <div style="width: 800px; height: 70px; left: 150px; top: 100px; position: absolute; text-align: center; color: #FDFCE8; font-size: 14px; font-family: Inika; font-weight: 400; line-height: 24px; word-wrap: break-word; font-style: italic;">"Di Joyful Crunch, kami menawarkan berbagai pilihan camilan lezat yang akan membuat Anda ingin terus memakannya! Dari yang manis hingga gurih, setiap gigitan dijamin akan menghadirkan kenikmatan yang tak terlupakan."</div>
              </div>

              <div style="width: 235px; height: 355px; left: 817.02px; top: 183px; position: absolute; border-radius: 20px; overflow: hidden">
                <img style="width: 264px; height: 420px; left: -29px; top: -88px; position: absolute; border-radius: 20px" alt=" cookiegula" src="image/cookiegula.png" />
                <div style="width: 357px; height: 357px; left: -89px; top: 226px; position: absolute; background: #C7A07A; border-radius: 9999px"></div>
                <div style="left: 28px; top: 247px; position: absolute; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word">Cookie <br/>Gula</div>
                <div style="width: 55px; height: 40px; left: 6px; top: 9px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                  <div style="width: 55px; height: 40px; justify-content: center; align-items: center; display: inline-flex">
                    <img style="width: 55px; height: 40px" alt="logokecil" src="image/logokecil.png" />
                  </div>
                </div>
              </div>

              <div style="width: 235px; height: 355px; left: 283.02px; top: 179px; position: absolute; border-radius: 20px; overflow: hidden">
                <img style="width: 254px; height: 420px; left: 0px; top: -9px; position: absolute; border-radius: 20px" alt=" eskrimcookie" src="image/eskrimcookie.png" />
                <div style="width: 357px; height: 357px; left: -89px; top: 226px; position: absolute; background: #C7A07A; border-radius: 9999px"></div>
                <div style="left: 21px; top: 251px; position: absolute; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word">Es Krim <br/>Cookies</div>
                <div style="width: 55px; height: 40px; left: 6px; top: 9px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                  <div style="width: 55px; height: 40px; justify-content: center; align-items: center; display: inline-flex">
                    <img style="width: 55px; height: 40px" alt="logo kecil" src="image/logokecil.png" />
                  </div>
                </div>
              </div>

              <div style="width: 235px; height: 355px; left: 551.02px; top: 179px; position: absolute; border-radius: 20px; overflow: hidden">
                <img style="width: 235px; height: 420px; left: 0px; top: -83px; position: absolute; border-radius: 20px" alt=" cookieboom" src="image/cookieboom.png" />
                <div style="width: 357px; height: 357px; left: -89px; top: 226px; position: absolute; background: #C7A07A; border-radius: 9999px"></div>
                <div style="left: 26px; top: 252px; position: absolute; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word">Cookie <br/>Boom</div>
                <div style="width: 55px; height: 40px; left: 6px; top: 9px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                  <div style="width: 55px; height: 40px; justify-content: center; align-items: center; display: inline-flex">
                    <img style="width: 55px; height: 40px" alt="logokecil" src="image/logokecil.png" />
                  </div>
                </div>
              </div>

              <div style="width: 235px; height: 355px; left: 15.02px; top: 179px; position: absolute; border-radius: 20px; overflow: hidden">
                <img style="width: 235px; height: 420px; left: 0px; top: -117px; position: absolute; border-radius: 20px" alt="cookiecoklat" src="image/cookiecoklat.png" />
                <div style="width: 357px; height: 357px; left: -89px; top: 226px; position: absolute; background: #C7A07A; border-radius: 9999px"></div>
                <div style="left: 22px; top: 251px; position: absolute; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word">Cookie <br/>coklat</div>
                <div style="width: 55px; height: 40px; left: 6px; top: 9px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                  <div style="width: 55px; height: 40px; justify-content: center; align-items: center; display: inline-flex">
                    <img style="width: 55px; height: 40px" alt="logokecil" src="image/logokecil.png" />
                  </div>
                </div>
              </div>
          </div>
        </div>

      <!-- Footer -->
      <div style="width: 100vw; min-height: 50vh; background-color: #734128; display: flex; justify-content: space-around; padding: 3vw 5vw; box-sizing: border-box;">
        <!-- Bagian Kontak -->
        <div style="color: #E2CEB1; font-family: 'Roboto', sans-serif; font-size: 1vw; display: flex; flex-direction: column; gap: 15px; padding-left: 100px;">
          <div style="font-size: 1.8vw; font-weight: 500;">Kontak :</div>
          <!-- Garis di bawah judul "Kontak" lebih tebal -->
          <div style="width: 130px; height: 3px; background-color: #E2CEB1;"></div>
          
          <!-- Bagian Lokasi -->
          <div style="display: flex; flex-direction: column; gap: 5px; margin-top: 20px;">
            <div style="display: flex; gap: 10px;">
              <i class="fas fa-map-marker-alt"></i> 
              <span>Lokasi:</span>
            </div>
            <span>Sawojajar, Malang</span>
          </div>
          <!-- Garis di bawah Lokasi (dengan ketebalan standar) -->
          <div style="width: 200px; height: 1px; background-color: #E2CEB1;"></div>
          
          <!-- Bagian Hubungi Kami -->
          <div style="display: flex; flex-direction: column; gap: 5px;">
            <div style="display: flex; gap: 10px;">
              <i class="fas fa-phone-alt"></i> 
              <span>Kontak Kami :</span>
            </div>
            <span>+62 521 735 629 700</span>
          </div>
          <!-- Garis di bawah Hubungi Kami (dengan ketebalan standar) -->
          <div style="width: 200px; height: 1px; background-color: #E2CEB1;"></div>
          
          <!-- Bagian Email -->
          <div style="display: flex; flex-direction: column; gap: 5px;">
            <div style="display: flex; gap: 10px;">
              <i class="fas fa-envelope"></i> 
              <span>E-mail Kami :</span>
            </div>
            <span>joyfulcrunch@gmail.com</span>
          </div>
        </div>

        <!-- Bagian Laporan -->
        <div style="color: #E2CEB1; font-family: 'Roboto', sans-serif; font-size: 1vw; display: flex; flex-direction: column; gap: 20px;">
          <div style="font-size: 1.8vw; font-weight: 500;">Laporan :</div>
          <!-- Garis di bawah judul "Kontak" lebih tebal -->
          <div style="width: 130px; height: 3px; background-color: #E2CEB1;"></div>
          <!-- Batasi lebar teks <p> agar menjadi 3 baris -->
          <p style="max-width: 300px; margin-bottom: 5px;">Jika Anda memiliki pertanyaan, keluhan atau informasi lebih lanjut, silakan hubungi kami melalui email di :</p>
          <input type="email" placeholder="E-mail" style="padding: 10px; font-size: 1.2vw; border: 1px solid #E2CEB1; background-color: #734128; color: #E2CEB1;">
          <button style="margin-top: 5px; padding: 10px 20px; width: 100px; background-color: #E2CEB1; color: #734128; font-size: 1vw; border: none; cursor: pointer; border-radius: 10px; margin-left: auto;">Kirim</button>
        </div>

        <!-- Bagian Follow Us -->
        <div style="color: #E2CEB1; font-family: 'Roboto', sans-serif; font-size: 1vw; display: flex; flex-direction: column; gap: 20px;">
          <div style="font-size: 1.8vw; font-weight: 500;">Ikuti Kami :</div>
          <!-- Garis di bawah judul "Kontak" lebih tebal -->
          <div style="width: 130px; height: 3px; background-color: #E2CEB1;"></div>
          <div style="display: flex; gap: 15px; margin-top: 5px; flex-wrap: wrap; width: 10vw;">
            <a href="https://www.facebook.com" target="_blank" style="width: 3vw; height: 3vw; border-radius: 50%; border: 2px solid #E2CEB1; display: flex; justify-content: center; align-items: center;">
              <i class="fab fa-facebook-f" style="color: #E2CEB1; font-size: 1.4vw;"></i>
            </a>
            <a href="https://www.youtube.com" target="_blank" style="width: 3vw; height: 3vw; border-radius: 50%; border: 2px solid #E2CEB1; display: flex; justify-content: center; align-items: center;">
              <i class="fab fa-youtube" style="color: #E2CEB1; font-size: 1.4vw;"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" style="width: 3vw; height: 3vw; border-radius: 50%; border: 2px solid #E2CEB1; display: flex; justify-content: center; align-items: center;">
              <i class="fab fa-twitter" style="color: #E2CEB1; font-size: 1.4vw;"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" style="width: 3vw; height: 3vw; border-radius: 50%; border: 2px solid #E2CEB1; display: flex; justify-content: center; align-items: center;">
              <i class="fab fa-instagram" style="color: #E2CEB1; font-size: 1.4vw;"></i>
            </a>
          </div>
          <!-- Bagian hak cipta -->
          <div style="margin-top: 3px; text-align: center; font-size: 0.8vw;">
            © Copyright 2024. Design by Joyfull Crunch
          </div>
        </div>
      </div>
    </body>
