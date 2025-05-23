<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        html, body {
            margin: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('assets/images/bgberanda.png') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 10%;
            height: 100vh;
            position: relative;
        }

        .btn-container {
            position: absolute;
            top: 70%; /* Ini bikin tombol berada di tengah agak ke bawah */
            left: 5%;
            transform: translateY(-50%);
        }

        .btn-rekomendasi {
            background-color: #FFD700; /* Kuning */
            color: black;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .btn-rekomendasi:hover {
            background-color: #e6c200;
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            body {
                justify-content: center;
                padding: 0 20px;
            }

            .btn-container {
                top: 65%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .btn-rekomendasi {
                width: 100%;
                max-width: 300px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="btn-container">
        <button class="btn-rekomendasi" onclick="window.location.href='user/rekomendasi/index'">
            <i class="fas fa-play"></i> Mulai Rekomendasi
        </button>
    </div>
</body>
</html>
