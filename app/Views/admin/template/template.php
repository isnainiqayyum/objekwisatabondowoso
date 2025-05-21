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
    </* Reset margin/padding dasar */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
}

/* Header fixed di atas */
header.admin-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 56px;
    background-color: #67a4ff;
    color: white;
    z-index: 1030; /* pastikan di atas sidebar */
    display: flex;
    align-items: center;
    padding: 0 1rem;
}

/* Sidebar fixed dari atas 0 */
#sidebar {
    position: fixed;
    top: 0; /* mulai dari paling atas */
    left: 0;
    width: 200px;
    height: 100vh; /* tinggi penuh */
    background-color: #67a4ff;
    overflow-y: auto;
    font-size: 0.9rem;
    user-select: none;
    padding-top: 56px; /* beri padding top sama dengan tinggi header agar isi sidebar tidak tertutup header */
    box-sizing: border-box;
    z-index: 1020; /* di bawah header */
}

/* Link sidebar */
#sidebar .nav-link {
    margin: 0;
    padding: 0.5rem 1rem;
    color: #adb5bd;
    text-decoration: none;
    transition: background-color 0.2s ease, color 0.2s ease;
    cursor: pointer;
}

/* Hover dan active link */
#sidebar .nav-link:hover,
#sidebar .nav-link.active {
    color: white;
    background-color: #67a4ff;
    text-decoration: none;
}

/* Main content */
#content {
    margin-left: 200px; /* sesuaikan dengan sidebar */
    padding: 2rem;
    min-height: 100vh;
    padding-top: 56px; /* beri ruang supaya tidak tertutup header */
    box-sizing: border-box;
}

/* Responsive */
@media (max-width: 768px) {
    #sidebar {
        width: 60px;
        padding-top: 56px;
    }

    #sidebar .nav-link {
        padding: 0.75rem 1rem;
        font-size: 0;
    }

    #sidebar .nav-link i {
        font-size: 1.2rem;
    }

    #content {
        margin-left: 60px;
        padding: 1.5rem 1rem;
        padding-top: 56px;
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

    <!-- Bootstrap Bundle JS + FontAwesome JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>
