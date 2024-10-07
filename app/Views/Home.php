<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Beranda</title>
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

            /* Konten responsif */
            .content {
                width: 100%;
                height: auto;
                min-height: calc(100vh - 83px); /* Sisa layar setelah header */
                display: flex;
                justify-content: center;
                align-items: center; /* Memusatkan elemen konten secara vertikal */
                background-image: url('image/cookiesbg.png');
                position: relative;
                background-size: cover;
                background-position: center;
            }

            .overlay {
                width: 100%;
                height: 100%;
                background: rgba(14, 26, 24, 0.70); /* Overlay dengan transparansi */
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1;
            }

            .text-container {
                position: relative;
                z-index: 10;
                text-align: center;
                color: #FDFCE8;
                width: 100%;
                padding: 20px;
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

             /* Body styling */
              body {
                  margin: 0;
                  padding: 0;
                  box-sizing: border-box;
              }

              /* Main container styling */
              .main-container {
                  width: 1512px;
                  padding-top: 10px;
                  background: #E2CEB1;
                  /* Remove margin to ensure it aligns with the left edge */
                  margin-left: 0;
                  margin-right: 0;
              }

              /* Centered text and emoji styling */
              .container {
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  height: 120px; /* Adjust as needed */
                  padding: 12px; /* Adjust as needed */
                  /* Ensure container uses full width of main container */
                  width: 100%;
              }

              .text-wrapper {
                  display: flex;
                  align-items: center;
                  justify-content: center; /* Center horizontally */
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

              /* Responsiveness */
              @media (max-width: 768px) {
                div {
                  font-size: 1.5vw;
                }
                i {
                  font-size: 1.5vw;
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

      <!-- Konten dengan teks yang responsif -->
        <div class="content">
            <div class="overlay"></div>
            
            <!-- Teks yang di atas overlay -->
            <div class="text-container">
                <h1>Welcome to Cookie</h1>
                <p>"At Joyful Crunch, every bite brings a smile. Each cookie is crafted with love, care, and a touch of magic. Let Cookie guide you to joyful flavors, adding a little extra happiness to your day, whether you're enjoying it alone or with loved ones."</p>
            </div>
        </div>

        <div style="width: 96px; height: 727px; padding-left: 32px; padding-right: 32px; padding-top: 584px; padding-bottom: 584px; left: 1343px; top: -23px; position: absolute; opacity: 0.50; justify-content: center; align-items: center; display: inline-flex">
          <div style="width: 50px; padding-top: 2.37px; padding-bottom: 2.37px; padding-left: 13.37px; border-radius: 25px; justify-content: flex-end; align-items: center; display: flex">
            <div style="width: 32px; height: 32px; transform: rotate(-45deg); transform-origin: 0 0; border: 3px white solid"></div>
          </div>
        </div>
        
        <!-- Main Section for About Us -->
        <div class="about-section" style="width: 100vw; height: auto; background: white; padding: 50px 0;">
          <div style="text-align: center;">
            <!-- About Us Header -->
            <div style="margin-bottom: 25px; text-align: left; margin: 0 auto; max-width: 1200px;">
                <h2 style="color: #734128; font-size: 35px; font-family: Inika; font-weight: 400; margin: 10px 0;">about us</h2>
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
                      At Joyful Crunch, we believe that happiness starts with the first bite of the perfect cookie. Guided by our cheerful mascot, Cookie, every cookie is made with love and the finest ingredients. We are committed to delivering deliciousness that brings a smile to every special moment. With every bite, we offer not only a delicious taste, but also an experience that spreads happiness into your life.
                  </p>
              </div>
            </div>

            <!-- Read More Button -->
            <div style="text-align: center; margin-bottom: 50px;">
                <button style="padding: 10px 30px; background-color: #734128; color: white; font-size: 16px; font-family: Inika; border: none; cursor: pointer; border-radius: 25px; margin-left: 800px;">Read More</button>
            </div>
          </div>
        </div>


        <!-- Separate Section for "Every Bite, a Burst of Joy" -->
        <div class="every-bite-section" style="width: 100vw; background-color: #E2CEB1; padding: 30px 0; margin-top: 30px;">
          <div class="container" style="text-align: center;">
            <div class="text-wrapper" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
              <div class="emoji" style="font-size: 3rem;">😊</div> <!-- Emoji as the icon -->
              <div class="text" style="font-size: 2rem; font-family: 'Inika', serif;">Every Bite, a Burst of Joy</div>
            </div>
          </div>
        </div>

        <!-- Product -->
        <div style="width: 100%; padding-right: 5%;padding-top: 50px; padding-bottom: 50px; background: white; justify-content: center; align-items: center; display: flex; flex-wrap: wrap;">
        <div style="width: 1070.02px; height: 538px; position: relative">
              <div style="width: 1070.02px; height: 421.75px; left: 0px; top: 0px; position: absolute; background: #734128; border-radius: 20px">
                <div style="width: 802px; height: 108px; left: 133px; top: 10px; position: absolute; text-align: center; color: #FDFCE8; font-size: 40px; font-family: Inika; font-weight: 700; line-height: 54px; word-wrap: break-word">Products</div>
                <div style="width: 580px; height: 48px; left: 244px; top: 70px; position: absolute; text-align: center; color: #FDFCE8; font-size: 16px; font-family: Inika; font-weight: 400; line-height: 24px; word-wrap: break-word">Find Delight in Every Bite!</div>
                <div style="width: 800px; height: 70px; left: 150px; top: 100px; position: absolute; text-align: center; color: #FDFCE8; font-size: 14px; font-family: Inika; font-weight: 400; line-height: 24px; word-wrap: break-word; font-style: italic;">"At Joyfull Crunch, we offer a wide selection of delicious snacks that will leave you craving more! From sweet to savory, every bite is guaranteed to bring an unforgettable pleasure."</div>
              </div>

              <div style="width: 235px; height: 355px; left: 817.02px; top: 183px; position: absolute; border-radius: 20px; overflow: hidden">
                <img style="width: 264px; height: 420px; left: -29px; top: -88px; position: absolute; border-radius: 20px" src="image/cookiegula.png" />
                <div style="width: 357px; height: 357px; left: -89px; top: 226px; position: absolute; background: #C7A07A; border-radius: 9999px"></div>
                <div style="left: 28px; top: 247px; position: absolute; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word">Cookie <br/>Gula</div>
                <div style="width: 55px; height: 40px; left: 6px; top: 9px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                  <div style="width: 55px; height: 40px; justify-content: center; align-items: center; display: inline-flex">
                    <img style="width: 55px; height: 40px" src="image/logokecil.png" />
                  </div>
                </div>
              </div>

              <div style="width: 235px; height: 355px; left: 283.02px; top: 179px; position: absolute; border-radius: 20px; overflow: hidden">
                <img style="width: 254px; height: 420px; left: 0px; top: -9px; position: absolute; border-radius: 20px" src="image/eskrimcookie.png" />
                <div style="width: 357px; height: 357px; left: -89px; top: 226px; position: absolute; background: #C7A07A; border-radius: 9999px"></div>
                <div style="left: 21px; top: 251px; position: absolute; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word">Es Krim <br/>Cookies</div>
                <div style="width: 55px; height: 40px; left: 6px; top: 9px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                  <div style="width: 55px; height: 40px; justify-content: center; align-items: center; display: inline-flex">
                    <img style="width: 55px; height: 40px" src="image/logokecil.png" />
                  </div>
                </div>
              </div>

              <div style="width: 235px; height: 355px; left: 551.02px; top: 179px; position: absolute; border-radius: 20px; overflow: hidden">
                <img style="width: 235px; height: 420px; left: 0px; top: -83px; position: absolute; border-radius: 20px" src="image/cookieboom.png" />
                <div style="width: 357px; height: 357px; left: -89px; top: 226px; position: absolute; background: #C7A07A; border-radius: 9999px"></div>
                <div style="left: 26px; top: 252px; position: absolute; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word">Cookie <br/>Boom</div>
                <div style="width: 55px; height: 40px; left: 6px; top: 9px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                  <div style="width: 55px; height: 40px; justify-content: center; align-items: center; display: inline-flex">
                    <img style="width: 55px; height: 40px" src="image/logokecil.png" />
                  </div>
                </div>
              </div>

              <div style="width: 235px; height: 355px; left: 15.02px; top: 179px; position: absolute; border-radius: 20px; overflow: hidden">
                <img style="width: 235px; height: 420px; left: 0px; top: -117px; position: absolute; border-radius: 20px" src="image/cookiecoklat.png" />
                <div style="width: 357px; height: 357px; left: -89px; top: 226px; position: absolute; background: #C7A07A; border-radius: 9999px"></div>
                <div style="left: 22px; top: 251px; position: absolute; color: #FDFCE8; font-size: 30px; font-family: Inika; font-weight: 400; text-decoration: underline; line-height: 40px; word-wrap: break-word">Cookie <br/>coklat</div>
                <div style="width: 55px; height: 40px; left: 6px; top: 9px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                  <div style="width: 55px; height: 40px; justify-content: center; align-items: center; display: inline-flex">
                    <img style="width: 55px; height: 40px" src="image/logokecil.png" />
                  </div>
                </div>
              </div>
          </div>
        </div>

      <!-- Footer -->
      <div style="width: 100vw; min-height: 50vh; background-color: #734128; display: flex; justify-content: space-around; padding: 3vw 5vw; box-sizing: border-box;">
        <!-- Bagian Kontak -->
        <div style="color: #E2CEB1; font-family: 'Roboto', sans-serif; font-size: 1vw; display: flex; flex-direction: column; gap: 15px; padding-left: 100px;">
          <div style="font-size: 1.8vw; font-weight: 500;">Contact :</div>
          <!-- Garis di bawah judul "Kontak" lebih tebal -->
          <div style="width: 130px; height: 3px; background-color: #E2CEB1;"></div>
          
          <!-- Bagian Lokasi -->
          <div style="display: flex; flex-direction: column; gap: 5px; margin-top: 20px;">
            <div style="display: flex; gap: 10px;">
              <i class="fas fa-map-marker-alt"></i> 
              <span>location:</span>
            </div>
            <span>Sawojajar, Malang</span>
          </div>
          <!-- Garis di bawah Lokasi (dengan ketebalan standar) -->
          <div style="width: 200px; height: 1px; background-color: #E2CEB1;"></div>
          
          <!-- Bagian Hubungi Kami -->
          <div style="display: flex; flex-direction: column; gap: 5px;">
            <div style="display: flex; gap: 10px;">
              <i class="fas fa-phone-alt"></i> 
              <span>contact us :</span>
            </div>
            <span>+62 521 735 629 700</span>
          </div>
          <!-- Garis di bawah Hubungi Kami (dengan ketebalan standar) -->
          <div style="width: 200px; height: 1px; background-color: #E2CEB1;"></div>
          
          <!-- Bagian Email -->
          <div style="display: flex; flex-direction: column; gap: 5px;">
            <div style="display: flex; gap: 10px;">
              <i class="fas fa-envelope"></i> 
              <span>E-mail us :</span>
            </div>
            <span>joyfulcrunch@gmail.com</span>
          </div>
        </div>

        <!-- Bagian Laporan -->
        <div style="color: #E2CEB1; font-family: 'Roboto', sans-serif; font-size: 1vw; display: flex; flex-direction: column; gap: 20px;">
          <div style="font-size: 1.8vw; font-weight: 500;">Report :</div>
          <!-- Garis di bawah judul "Kontak" lebih tebal -->
          <div style="width: 130px; height: 3px; background-color: #E2CEB1;"></div>
          <!-- Batasi lebar teks <p> agar menjadi 3 baris -->
          <p style="max-width: 300px; margin-bottom: 5px;">If you have any questions, complaints or further information, please contact us via email at :</p>
          <input type="email" placeholder="E-mail" style="padding: 10px; font-size: 1.2vw; border: 1px solid #E2CEB1; background-color: #734128; color: #E2CEB1;">
          <button style="margin-top: 5px; padding: 10px 20px; width: 100px; background-color: #E2CEB1; color: #734128; font-size: 1vw; border: none; cursor: pointer; border-radius: 10px; margin-left: auto;">Send</button>
        </div>

        <!-- Bagian Follow Us -->
        <div style="color: #E2CEB1; font-family: 'Roboto', sans-serif; font-size: 1vw; display: flex; flex-direction: column; gap: 20px;">
          <div style="font-size: 1.8vw; font-weight: 500;">Follow us :</div>
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
