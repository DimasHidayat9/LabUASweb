<?php
// Mendeteksi URL saat ini untuk menentukan class 'active'
$current_url = isset($_GET['url']) ? $_GET['url'] : 'kendaraan/list';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom Luxury - Yang Mulia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/Style.css">
    <style>
        /* CSS Tambahan untuk efek navigasi aktif */
        .nav-link.active-custom {
            color: #f59e0b !important; /* Warna Kuning Emas */
            font-weight: 700;
            border-bottom: 2px solid #f59e0b;
        }
        .nav-link:hover {
            color: #f59e0b !important;
            transition: 0.3s;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">✨ SHOWROOM DIMAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                
                <li class="nav-item">
                    <a class="nav-link <?= ($current_url == 'kendaraan/list' || $current_url == '') ? 'active-custom' : '' ?>" 
                       href="index.php?url=kendaraan/list">Katalog</a>
                </li>

                <?php if(isset($_SESSION['login'])): ?>
                    <?php if($_SESSION['role'] == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos($current_url, 'admin') !== false) ? 'active-custom' : '' ?>" 
                               href="index.php?url=admin">Dashboard Admin</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item ms-lg-3 d-flex align-items-center">
                        <span class="text-light me-3 small opacity-75">Halo, <?= $_SESSION['username'] ?></span>
                        <a href="logout.php" class="btn btn-sm btn-outline-danger rounded-pill px-3">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-lg-3">
                        <a href="login.php" class="btn btn-sm btn-primary rounded-pill px-4">Login</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>