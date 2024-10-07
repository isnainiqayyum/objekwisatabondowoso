<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>tentang</title>
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
            Tentang Kami
          </div>
        </div>
      </div>
  <div style="position: relative; width: 100%; height: 759px;">
    <div style="width: 294px; height: 160px; left: 235px; top: 279px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
      <div style="width: 294px; height: 226.36px; justify-content: center; align-items: center; display: inline-flex">
        <img style="width: 294px; height: 226.36px" src="image/logomaskot.png" />
      </div>
    </div>
    <div style="width: 578px; height: 29.23px; left: 650px; top: 136px; position: absolute; color: #391E10; font-size: 40px; font-family: Inika; font-weight: 700; line-height: 10px; word-wrap: break-word">Joyfull Crunch</div>
    <div style="width: 700px; height: 467px; left: 650px; top: 188px; position: absolute; color: #734128; font-size: 20px; font-family: Inika; font-weight: 400; line-height: 30px; word-wrap: break-word">Di Joyful Crunch, kami percaya bahwa kebahagiaan sejati dimulai dari gigitan pertama cookies yang sempurna. Terinspirasi oleh maskot ceria kami, Cookie, setiap cookies kami dibuat dengan penuh cinta menggunakan bahan-bahan berkualitas tinggi. Dengan kombinasi resep tradisional dan inovasi modern, kami menciptakan cookies yang menghadirkan kelezatan dalam setiap gigitan, mulai dari tekstur renyah hingga aroma yang menggugah selera.<br/><br/>Cookies kami lebih dari sekadar camilan manis; mereka adalah bagian dari momen spesial Anda, dari merayakan keberhasilan kecil hingga menghangatkan kebersamaan. Di Joyful Crunch, kami percaya bahwa setiap gigitan adalah perayaan rasa yang menyatukan dan menciptakan kenangan indah. Mari bergabung dengan kami dan rasakan sendiri bagaimana cookies kami dapat membawa kebahagiaan dan keceriaan ke dalam hidup Anda.</div>
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