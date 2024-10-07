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
      <div style="width: 100vw; height: 100vh; display: flex; flex-direction: column; justify-content: space-between; background: white; margin-top: 70px;">
      <!-- Konten Utama -->
      <div style="flex-grow: 1; position: relative;">
          <div style="width: 61.11vw; height: 96.88vh; left: 4.44vw; top: 0; position: absolute;">
              <img style="width: 61.11vw; height: 34.9vh; left: 0; top: 0; position: absolute; border: 0.35vw #734128 solid" src="https://via.placeholder.com/880x545" />
              <div style="width: 61.11vw; height: 68.43vh; left: 0; top: 31.25vh; position: absolute; background: white; box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25); border: 0.35vw #734128 solid"></div>
              <div style="width: 7.77vw; height: 1.94vh; left: 2.15vw; top: 33.02vh; position: absolute; color: #734128; font-size: 0.97vw; font-family: Inika; font-weight: 400; word-wrap: break-word">7 Agust 2014</div>
              <div style="width: 50.48vw; height: 8.19vh; left: 2.15vw; top: 35.9vh; position: absolute; color: #734128; font-size: 3.13vw; font-family: Inika; font-weight: 700; word-wrap: break-word">Panduan Memulai Bisnis Cookies dari Rumah</div>
              <div style="width: 55.69vw; height: 52.08vh; left: 2.7vw; top: 45.1vh; position: absolute; color: #734128; font-size: 1.11vw; font-family: Inika; font-weight: 400; word-wrap: break-word">Mulai bisnis cookies dari rumah dengan panduan langkah demi langkah ini, dan bayangkan dapur Anda dipenuhi aroma manis dari cookies yang baru saja dipanggang. Setiap gigitan membawa senyum di wajah pelanggan, dan memulai bisnis cookies dari rumah bisa menjadi awal dari perjalanan sukses yang penuh kelezatan. Artikel ini akan membantu Anda memulainya dengan cara yang sederhana namun efektif.<br/><br/>1. Temukan Keunikan Brand Anda<br/>Identifikasi apa yang membuat cookies Anda berbeda dari yang lain—apakah itu bahan-bahan organik, resep turun-temurun, atau bentuk cookies yang kreatif dan menarik. Keunikan ini akan menjadi daya tarik utama yang membuat pelanggan penasaran dan ingin mencoba produk Anda.<br/><br/>2. Siapkan Dapur Anda<br/>Pastikan dapur Anda siap untuk produksi cookies dalam jumlah yang cukup. Anda tidak perlu peralatan mahal, tapi penting untuk memiliki peralatan dasar seperti oven dan mixer yang berkualitas. Dapur yang terorganisir dan bersih akan memudahkan proses produksi dan memastikan kualitas cookies tetap konsisten.<br/><br/>3. Kreasikan Resep yang Memikat<br/>Ciptakan resep cookies yang unik dan lezat, yang bisa membuat pelanggan kembali lagi. Bereksperimenlah dengan berbagai bahan dan rasa untuk menemukan kombinasi yang sempurna, dan pastikan cookies Anda menawarkan keseimbangan antara tekstur yang renyah dan rasa yang menggugah selera.<br/><br/>4. Manfaatkan Kekuatan Media Sosial<br/>Manfaatkan media sosial untuk memperkenalkan produk Anda kepada pasar yang lebih luas. Buat akun Instagram atau Facebook yang menarik, unggah foto-foto cookies yang menggugah selera, dan gunakan cerita serta testimoni pelanggan untuk meningkatkan kepercayaan dan menarik lebih banyak pembeli.<br/><br/>5. Kelola Keuangan dengan Bijak<br/>Pengelolaan keuangan yang tepat sangat penting untuk kesuksesan bisnis. Hitung semua biaya produksi secara detail dan tetapkan harga jual yang menguntungkan namun tetap kompetitif. Pastikan juga untuk mengatur arus kas dengan baik, sehingga bisnis Anda dapat tumbuh dan berkembang.<br/><br/>Dengan sedikit kreativitas dan perencanaan, Anda bisa mengubah hasrat memanggang cookies menjadi bisnis yang menguntungkan. Jadikan setiap batch cookies Anda istimewa, dan biarkan pelanggan menikmati hasil kerja keras Anda. Selamat memulai perjalanan manis ini!</div>
          </div>
          <div style="width: 27.99vw; height: 58.75vh; left: 68.61vw; top: -3.89vh; position: absolute;">
              <div style="width: 16.39vw; height: 6.39vh; left: 0.76vw; top: 0; position: absolute;">
                  <div style="width: 16.39vw; height: 3.68vh; left: 0; top: 0; position: absolute; background: white; border: 0.14vw #C7A07A solid"></div>
                  <div style="width: 15.07vw; height: 1.39vh; left: 0; top: 2.5vh; position: absolute; text-align: center; color: #391E10; font-size: 2.78vw; font-family: Inika; font-weight: 400; line-height: 3.06vh; word-wrap: break-word">Baca Juga</div>
              </div>
              <div style="width: 27.99vw; height: 0.1vh; left: 0.14vw; top: 9.26vh; position: absolute; border: 0.21vw #391E10 solid"></div>
              <div style="width: 27.99vw; height: 48.19vh; left: 0; top: 10.97vh; position: absolute;">
                  <div style="width: 27.99vw; height: 48.19vh; left: 0; top: 0; position: absolute; background: white; box-shadow: 0px 0.28vw 0.28vw rgba(0, 0, 0, 0.25); border: 0.07vw #734128 solid"></div>
                  <div style="width: 23.19vw; height: 6.94vh; left: 2.43vw; top: 0.97vh; position: absolute;">
                      <div style="width: 23.19vw; height: 6.94vh; left: 0; top: 0; position: absolute; background: white; box-shadow: 0.28vw 0.28vw 0.28vw; filter: blur(0.28vw)"></div>
                      <img style="width: 10.21vw; height: 7.43vh; left: 0; top: 0; position: absolute;" src="https://via.placeholder.com/147x107" />
                      <div style="width: 11.88vw; height: 3.96vh; left: 1.1vw; top: 1.39vh; position: absolute;">
                          <div style="width: 11.88vw; height: 3.96vh; left: 0; top: 0; position: absolute; background: white;"></div>
                          <div style="width: 8.33vw; height: 0.97vh; left: 0; top: 0; position: absolute; color: #734128; font-size: 0.97vw; font-family: Inika; font-weight: 400; word-wrap: break-word">20 Agust 2024</div>
                          <div style="width: 11.18vw; height: 1.67vh; left: 0; top: 1.87vh; position: absolute; color: #734128; font-size: 1.11vw; font-family: Inika; font-weight: 400; word-wrap: break-word">"Resep Cookies Suks...</div>
                      </div>
                  </div>
                  <div style="width: 23.19vw; height: 6.94vh; left: 2.43vw; top: 12.5vh; position: absolute;">
                      <div style="width: 23.19vw; height: 6.94vh; left: 0; top: 0; position: absolute; background: white; box-shadow: 0.28vw 0.28vw 0.28vw; filter: blur(0.28vw)"></div>
                      <img style="width: 10.21vw; height: 7.43vh; left: 0; top: 0; position: absolute;" src="https://via.placeholder.com/147x107" />
                      <div style="width: 11.88vw; height: 3.96vh; left: 1.1vw; top: 1.39vh; position: absolute;">
                          <div style="width: 11.88vw; height: 3.96vh; left: 0; top: 0; position: absolute; background: white;"></div>
                          <div style="width: 8.33vw; height: 0.97vh; left: 0; top: 0; position: absolute; color: #734128; font-size: 0.97vw; font-family: Inika; font-weight: 400; word-wrap: break-word">18 Agust 2024</div>
                          <div style="width: 11.18vw; height: 1.67vh; left: 0; top: 1.87vh; position: absolute; color: #734128; font-size: 1.11vw; font-family: Inika; font-weight: 400; word-wrap: break-word">"Kiat Memulai Bisn...</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- Footer -->
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