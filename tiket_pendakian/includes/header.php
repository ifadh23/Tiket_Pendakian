<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Hanya mulai sesi jika belum ada sesi yang aktif
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/header-footer.css"> <!-- CSS untuk header dan footer -->
    <link rel="stylesheet" href="../assets/css/styles.css"> <!-- CSS umum -->
    <title>Website Pemesanan Tiket Pendakian</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">Tiket Pendakian</a>
            </div>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="trips.php">Pemesanan</a></li>
                <li><a href="mountain_info.php">Info Gunung</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>