<?php
session_start();
include '../includes/db.php';
include '../includes/header.php';

// Cek apakah pengguna adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../pages/index.php");
    exit;
}
?>

<main>
    <h1>Dashboard Admin</h1>
    <p>Selamat datang di panel admin!</p>
    <ul>
        <li><a href="manage_trips.php">Kelola Pendakian</a></li>
        <li><a href="manage_bookings.php">Kelola Pemesanan</a></li>
    </ul>
</main>

<?php include '../includes/footer.php'; ?>