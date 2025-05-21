<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 40px;
        background-color: #f1f1f1;
        flex-wrap: wrap;
    }

    .logo img {
        height: 50px;
    }

    .menu {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .menu a {
        margin-left: 20px;
        text-decoration: none;
        color: black;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .menu a i {
        margin-right: 5px;
    }

        .content {
    height: 90vh;
    background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0)),
                url('assets/images/beranda.png') no-repeat left center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 20px;
}


    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        .navbar {
            flex-direction: column;
            align-items: flex-start;
            padding: 10px 20px;
        }

        .menu {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            margin-top: 10px;
        }

        .menu a {
            margin: 10px 0;
        }

        .content {
            height: auto;
            padding: 60px 20px;
        }
    }
</style>

</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="assets/images/logobonday.png" alt="Logo">
        </div>
        <div class="menu">
            <a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
        </div>
    </div>

    <div class="content">
    </div>
</body>
</html>
