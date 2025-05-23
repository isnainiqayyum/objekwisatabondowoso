<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #f8f9fa; /* Latar belakang abu terang */
            font-family: 'Segoe UI', sans-serif;
        }

        /* HEADER */
        header.admin-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 56px;
            background-color: #ffffff;
            color: #333;
            z-index: 1030;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* SIDEBAR */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            height: 100vh;
            background-color: #212529; /* Warna sidebar hitam */
            color: #fff;
            overflow-y: auto;
            padding-top: 56px;
            box-sizing: border-box;
        }

        #sidebar .nav-link {
            padding: 0.75rem 1.25rem;
            color: #adb5bd;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: 0.3s;
        }

        #sidebar .nav-link:hover,
        #sidebar .nav-link.active {
            background-color: #343a40;
            color: #fff;
        }

        #sidebar .nav-link i {
            width: 20px;
            text-align: center;
        }

        /* CONTENT */
        #content {
            margin-left: 220px;
            padding: 2rem;
            padding-top: 70px;
            box-sizing: border-box;
        }

        @media (max-width: 768px) {
            #sidebar {
                width: 60px;
            }

            #sidebar .nav-link span {
                display: none;
            }

            #content {
                margin-left: 60px;
                padding: 1.5rem 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <?= $this->include('admin/layout/header') ?>

    <!-- SIDEBAR / NAVBAR -->
    <?= $this->include('admin/layout/navbar') ?>

    <!-- MAIN CONTENT -->
    <div id="content">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Bootstrap Bundle + FontAwesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>
