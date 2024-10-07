<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
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

                    @media (max-width: 1024px) {
                      img {
                        width: 70%;
                        left: 50%;
                        transform: translateX(-50%);
                      }

                      div[style*="left: 798px"] {
                        left: 50% !important;
                        transform: translateX(-50%);
                      }

                      div[style*="left: 234px"] {
                        left: 50% !important;
                        transform: translateX(-50%);
                      }
                    }

                    @media (max-width: 768px) {
                      img {
                        width: 90%;
                        height: auto;
                        left: 50%;
                        transform: translateX(-50%);
                      }

                      div[style*="left: 798px"] {
                        left: 50% !important;
                        transform: translateX(-50%);
                      }

                      div[style*="left: 234px"] {
                        left: 50% !important;
                        transform: translateX(-50%);
                      }

                      div[style*="font-size: 48px"] {
                        font-size: 36px;
                      }

                      div[style*="width: 458px"] {
                        width: 90%;
                      }
                    }
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
      <div style="width: 100%; height: 701px; left: 0; top: 84px; position: absolute; background: #E2CEB1;"></div>
      <div style="width: 252px; left: 50%; top: 123px; position: absolute; text-align: center; color: #734128; font-size: 48px; font-family: Inika; font-weight: 700; line-height: 44px; transform: translateX(-50%);">
  Contact
</div>
<div style="width: 252px; height: 0px; left: 50%; top: 169.50px; position: absolute; border: 1px black solid; transform: translateX(-55%);"></div>

      <img style="width: 458px; height: 211px; left: 798px; top: 240px; position: absolute; border-radius: 10px; border: 2px #391E10 solid;" src="https://via.placeholder.com/458x211" />

      <div style="width: 458px; padding: 15px; left: 798px; top: 473px; position: absolute; background: #FDFCE8; border-radius: 15px; justify-content: center; align-items: center; display: inline-flex;">
        <div style="flex: 1 1 0; align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 9.50px; display: inline-flex;">
          <div style="align-self: stretch; height: 42px; padding-left: 10px; padding-right: 3.44px; justify-content: flex-end; align-items: center; gap: 10px; display: inline-flex;">
            <div style="width: 19.50px; height: 20px; background: #BD6B43; border-radius: 9.88px; display: inline-flex; justify-content: center; align-items: center;">
              <div style="width: 7.50px; height: 10px; background: white;"></div>
            </div>
            <div style="width: 384.56px; height: 42px; color: black; font-size: 14px; font-family: Inika; font-weight: 400; line-height: 21px; word-wrap: break-word;">Sawojajar, Kota Malang, Jawa Timur, Indonesia.</div>
          </div>

          <div style="align-self: stretch; height: 26.50px; padding-bottom: 5px; padding-left: 10px; padding-right: 182.28px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: inline-flex;">
            <div style="width: 22px; height: 20px; background: #BD6B43; border-radius: 10.50px; display: inline-flex; justify-content: center; align-items: center;">
              <div style="width: 10px; height: 10px; background: white;"></div>
            </div>
            <div style="width: 203.22px; height: 21px; color: black; font-size: 14px; font-family: Inika; font-weight: 400; line-height: 21px;">+62 521 735 629 700 (WhatsApp)</div>
          </div>

          <div style="align-self: stretch; height: 26.50px; padding-bottom: 5px; padding-left: 10px; padding-right: 184.50px; justify-content: flex-start; align-items: flex-end; gap: 10px; display: inline-flex;">
            <div style="width: 22px; height: 20px; background: #BD6B43; border-radius: 10.50px; display: inline-flex; justify-content: center; align-items: center;">
              <div style="width: 9.69px; height: 9.69px; background: white;"></div>
            </div>
            <div style="width: 201px; height: 21px; color: black; font-size: 14px; font-family: Inika; font-weight: 400; line-height: 21px;">joyfullcrunch@gmail.com</div>
          </div>

          <div style="align-self: stretch; height: 26.50px; padding-bottom: 5px; padding-left: 10px; padding-right: 258.50px; justify-content: flex-start; align-items: flex-end; gap: 10.25px; display: inline-flex;">
            <div style="width: 20.75px; height: 20px; background: #BD6B43; border-radius: 10.19px; display: inline-flex; justify-content: center; align-items: center;">
              <div style="width: 9.14px; height: 10px; color: white; font-size: 10px; font-family: Font Awesome 5 Brands;"></div>
            </div>
            <div style="width: 128px; height: 21px; color: black; font-size: 14px; font-family: Inika; font-weight: 400; line-height: 21px;">@joyfull.crunch</div>
          </div>
        </div>
      </div>

      <div style="width: 389px; height: 419px; left: 234px; top: 279px; position: absolute;">
        <div style="width: 46.62px; height: 22.50px; left: 0px; top: 0px; position: absolute; color: #734128; font-size: 15px; font-family: Causten-Regular;">Nama</div>
        <div style="width: 390px; height: 33px; padding: 6px; left: 0px; top: 33px; position: absolute; background: white; border-radius: 4px;">
          <input type="text" placeholder="Enter name" style="width: 100%; border: none; background: none; font-family: Causten-Regular; color: #999;">
        </div>

        <div style="width: 40.99px; height: 27.50px; left: 0px; top: 75.50px; position: absolute; color: #734128; font-size: 15px; font-family: Causten-Regular;">Email</div>
        <div style="width: 390px; height: 33px; padding: 6px; left: 0px; top: 113px; position: absolute; background: white; border-radius: 4px;">
          <input type="email" placeholder="Enter email" style="width: 100%; border: none; background: none; font-family: Causten-Regular; color: #999;">
        </div>

        <div style="width: 45.90px; height: 27.50px; left: -1px; top: 156px; position: absolute; color: #734128; font-size: 15px; font-family: Causten-Regular;">Pesan</div>
        <div style="width: 390px; height: 74px; left: 0px; top: 193px; position: absolute; background: white; border-radius: 4px; border: 1px #999999 solid;"></div>
        <div style="width: 117px; height: 32px; left: 273px; top: 294px; position: absolute; background: #BD6B43; border-radius: 5px;"></div>
        <div style="width: 117px; left: 273px; top: 300px; position: absolute; text-align: center; color: black; font-size: 15px; font-family: Inika;">Kirim</div>
      </div>
      <div style="width: 252px; height: 0px; left: 594px; top: 169.50px; position: absolute; border: 1px black solid;"></div>
</body>