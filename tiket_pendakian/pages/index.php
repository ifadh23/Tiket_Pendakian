<?php
session_start();
include '../includes/db.php';
include '../includes/header.php'; // Memanggil header yang sudah ada
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/home.css"> <!-- CSS untuk halaman utama -->
    <title>Beranda</title>
</head>
<body>
    <main>
        <div class="hero">
            <h1>Selamat Datang di Website Pemesanan Tiket Pendakian</h1>
            <p>Temukan pendakian terbaik untuk Anda!</p>
        </div>
        
        <div class="info-cards">
            <div class="card">
                <h2>Pemesanan Mudah</h2>
                <p>Pesan tiket pendakian dengan cepat dan mudah melalui platform kami.</p>
            </div>
            <div class="card">
                <h2>Informasi Lengkap</h2>
                <p>Dapatkan informasi lengkap tentang berbagai gunung dan jalur pendakian.</p>
            </div>
            <div class="card">
                <h2>Komunitas Pendaki</h2>
                <p>Bergabunglah dengan komunitas pendaki dan berbagi pengalaman Anda.</p>
            </div>
        </div>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>