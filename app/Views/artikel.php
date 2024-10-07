<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Artikel</title>
    <style>
          html, body {
              height: 100%;
              margin: 0;
              padding: 0;
              box-sizing: border-box;
              font-family: Inika, sans-serif;
          }

          /* Responsif pada ukuran layar */
          .header {
              width: 100%; /* Sesuaikan dengan lebar layar */
              height: 83px;
              background: white;
              display: flex;
              align-items: center;
              padding: 0 15px;
              box-sizing: border-box;
              justify-content: space-between; /* Space between logo and nav elements */
          }

          .logo {
              margin-right: 2vw;
              margin-left: 12vw; /* Menggunakan vw agar lebih responsif */
          }

          .logo img {
              height: 60px;
              width: auto;
              max-width: 100%;
          }

          /* Mengatur font umum untuk seluruh elemen */
            .nav-container,
            .nav-links a,
            .language-selector .selected-language div,
            .language-selector .language-menu div {
                font-family: Arial, sans-serif; /* Jenis teks yang sama */
                font-size: 16px; /* Ukuran teks yang sama */
                color: black; /* Warna teks sama */
            }

            /* Style untuk link navigasi */
            .nav-container {
                display: flex;
                align-items: center;
                justify-content: flex-start; /* Meratakan ke kiri */
                z-index: 10; /* Tetap di atas overlay */
            }

            .nav-links {
                display: flex;
                align-items: center;
                margin-right: 2vw; /* Lebih fleksibel */
            }

            .nav-links a {
                font-weight: 400;
                line-height: 24px;
                text-decoration: none;
                padding: 15px;
                display: flex;
                align-items: center;
            }

            /* Language Selector */
            .language-selector {
                position: relative;
                display: flex;
                align-items: center;
                margin-left: -1.5vw; /* Digeser ke kiri */
                z-index: 10; /* Tetap di atas overlay */
            }

            .language-selector .language-menu {
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

            .language-selector .language-menu div {
                padding: 5px 10px;
                cursor: pointer;
            }

            .language-selector .language-menu div:hover {
                background: #f0f0f0;
            }

            .language-selector .selected-language {
                display: flex;
                align-items: center;
                cursor: pointer;
            }

            .language-selector .arrow {
                width: 14px;
                height: 9px;
                background: black;
                margin-left: 5px;
            }
            /* Container for title */
            .responsive-box {
              width: 100%;
              max-width: 325px;
              margin: 50px auto 0 auto; /* Menambahkan margin-top 50px */
              position: relative;
            }

            .box {
              width: 100%;
              padding-top: 22.46%;
              position: relative;
              background: white;
              border: 3px #C7A07A solid;
            }

            .text {
              position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%); /* Menjaga teks tetap di tengah vertikal */
            text-align: center;
            color: #391E10;
            font-size: calc(10px + 2vw); /* Ukuran font responsif */
            font-family: Inika, serif;
            font-weight: 400;
            line-height: 1.1;
            width: 100%; /* Lebar penuh */
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
              text-align: center;
            }

            /* Responsive Design */
            @media (max-width: 1200px) {
              .Container {
                width: 95%;
              }

              .Frame299 {
                justify-content: center;
              }

              .ListitemLink {
                width: 100%;
                max-width: 300px;
              }
            }

            @media (max-width: 768px) {
              .Container {
                width: 100%;
              }

              .Frame299 {
                justify-content: space-between;
              }

              .ListitemLink {
                width: 100%;
                max-width: 100%;
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
                  const languageSelector = document.querySelector('.language-selector');
                  languageSelector.classList.toggle('active');
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
    <!-- Header with navigation -->
    <div class="header">
          <!-- Logo -->
          <div class="logo">
              <img src="image/logo.png" alt="Logo">
          </div>

          <!-- Navigation Container -->
          <div class="nav-container">
              <div class="nav-links">
                  <a href="#">Home</a>
                  <a href="#">About</a>
                  <a href="#">Blog</a>
                  <a href="#">Products</a>
                  <a href="#">Activities</a>
                  <a href="#">Contact</a>
              </div>

              <!-- Language Selector -->
              <div class="language-selector">
                  <div class="selected-language" onclick="toggleLanguageMenu()">
                      <div>Language</div>
                      <div class="arrow"></div>
                  </div>
                  <div class="language-menu">
                      <div onclick="changeLanguage('English')">English</div>
                      <div onclick="changeLanguage('Indonesia')">Indonesia</div>
                  </div>
              </div>
          </div>
      </div>
      <div style="position: relative; width: 100%; height: 30vh;"> <!-- Mengatur tinggi dengan vh -->
        <!-- Gambar responsif -->
        <img src="image/tentang.png" style="width: 100%; height: 100%; object-fit: cover; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" />

        <!-- Overlay untuk gambar -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.50);"></div>

        <!-- Teks responsif di tengah gambar -->
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; text-align: center;">
          <div style="color: #E2CEB1; font-size: 3vw; font-family: Inika; font-weight: 700; line-height: 1.1; word-wrap: break-word;">
            Artikel Joyful Crunch
          </div>
        </div>
      </div>
      <div class="responsive-box">
        <div class="box"></div>
        <div class="text">Artikel Terbaru</div>
      </div>
    <div class="Background">
      <div class="Container">
        <div class="Frame299">
          <!-- artikel 1 -->
          <div class="ListitemLink">
            <img src="image/artikel1.png" />
            <div class="Heading3">
              <a href="artikel1.html" style="text-decoration: none; color: inherit;">
                "Kemasan Ramah Lingkungan untuk Bisnis Cookies"
              </a>
            </div>
            <div class="text2">Ketahui bagaimana kemasan ramah lingkungan bisa membuat bisnis cookies Anda lebih menarik bagi konsumen yang peduli lingkungan.</div>
          </div>

          <!-- artikel 2 -->
          <div class="ListitemLink">
            <img src="image/artikel2.png" />
            <div class="Heading3">
              <a href="artikel2.html" style="text-decoration: none; color: inherit;">
                "Panduan Memulai Bisnis Cookies dari Rumah"
              </a>
            </div>
            <div class="text2">Mulai bisnis cookies dari rumah dengan panduan langkah demi langkah. Temukan cara efektif untuk memulai dan mengembangkan usaha Anda hingga sukses.</div>
          </div>

          <!-- artikel 3 -->
          <div class="ListitemLink">
            <img src="image/artikel3.png" />
            <div class="Heading3">
              <a href="artikel3.html" style="text-decoration: none; color: inherit;">
                "Resep Cookies Sukses: Bahan dan Teknik Penting"
              </a>
            </div>
            <div class="text2">Ingin tahu rahasia cookies yang selalu enak? Pelajari cara memilih bahan terbaik dan teknik memanggang yang bisa membuat perbedaan besar!</div>
          </div>

          <!-- artikel 4 -->
          <div class="ListitemLink">
            <img src="image/artikel4.png" />
            <div class="Heading3">
              <a href="artikel4.html" style="text-decoration: none; color: inherit;">
                "Inovasi Rasa Cookies yang Memikat Pelanggan"
              </a>
            </div>
            <div class="text2">Buat cookies Anda beda dari yang lain! Jelajahi ide rasa baru yang bisa menarik perhatian dan selera pelanggan.</div>
          </div>

          <!-- artikel 5 -->
          <div class="ListitemLink">
            <img src="image/artikel5.png" />
            <div class="Heading3">
              <a href="artikel5.html" style="text-decoration: none; color: inherit;">
                "Program Langganan: Tingkatkan Loyalitas Pelanggan"
              </a>
            </div>
            <div class="text2">Pelajari cara membuat pelanggan tetap setia dengan program langganan yang menawarkan nilai lebih dan keuntungan jangka panjang.</div>
          </div>

          <!-- artikel 6 -->
          <div class="ListitemLink">
            <img src="image/artikel6.png" />
            <div class="Heading3">
              <a href="artikel6.html" style="text-decoration: none; color: inherit;">
                "Media Sosial untuk Mengembangkan Bisnis Cookies"
              </a>
            </div>
            <div class="text2">Optimalkan media sosial untuk memperluas jangkauan bisnis cookies Anda. Dapatkan tips untuk menarik lebih banyak pelanggan secara online.</div>
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
</html>
