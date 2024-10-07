<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>produk</title>
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
            Produk Joyful Crunch
          </div>
        </div>
      </div>
  <div style="width: 1440px; height: 747px; position: relative; background: white">
    <div style="height: 542px; padding-top: 38px; padding-bottom: 38px; padding-right: 60px; left: 192px; top: 86px; position: absolute; justify-content: flex-start; align-items: flex-start; gap: 136px; display: inline-flex">
      <img style="width: 389px; height: 466px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px" src="image/produk1.png" />
      <div style="width: 544px; height: 466px; position: relative">
        <div style="width: 544px; height: 466px; left: 0px; top: 0px; position: absolute; background: #734128; border-radius: 10px"></div>
        <div style="width: 497px; height: 403px; left: 28px; top: 37px; position: absolute; color: #FDFCE8; font-size: 16px; font-family: Inika; font-weight: 400; word-wrap: break-word">Cookie Coklat di Joyful Crunch menyuguhkan kelezatan yang luar biasa dengan kombinasi kerenyahan di luar dan kelembutan coklat premium yang meleleh di dalam. Setiap gigitan cookies ini menawarkan rasa manis yang mendalam dan aroma panggangan yang menggugah selera, menciptakan pengalaman kuliner yang tak terlupakan. Cocok sebagai teman minum kopi di pagi hari, camilan santai di sore hari, atau penutup makan malam, Cookies Coklat ini membuat setiap momen lebih spesial dan berkesan.<br/><br/>Lebih dari sekadar camilan biasa, Cookie Coklat di Joyful Crunch juga memberikan manfaat emosional dengan setiap gigitannya. Kandungan coklat berkualitas dalam cookie ini dikenal dapat meningkatkan mood dan menghadirkan perasaan bahagia. Teksturnya yang seimbang antara renyah dan lembut tidak hanya memuaskan selera tetapi juga membantu mengurangi keinginan ngemil berlebihan. Nikmati kelezatan yang memanjakan lidah dan memberikan dorongan energi yang cepat, menjadikannya camilan ideal untuk menemani aktivitas sehari-hari atau memberikan semangat tambahan sebelum berolahraga.</div>
      </div>
    </div>
    <div style="width: 644px; height: 53px; left: 710px; top: 41px; position: absolute; color: #734128; font-size: 45px; font-family: Inika; font-weight: 700; word-wrap: break-word">Cookie Coklat</div>
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