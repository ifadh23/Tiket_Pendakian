<?php
session_start();
include '../includes/db.php';
include '../includes/header.php';

// Cek apakah pengguna adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../pages/index.php");
    exit;
}

$stmt = $pdo->query("SELECT bookings.id, users.username, trips.name, bookings.seats FROM bookings JOIN users ON bookings.user_id = users.id JOIN trips ON bookings.trip_id = trips.id");
$bookings = $stmt->fetchAll();
?>

<main>
    <h1>Kelola Pemesanan</h1>
    <table>
        <tr>
            <th>ID Pemesanan</th>
            <th>Pengguna</th>
            <th>Pendakian</th>
            <th>Jumlah Kursi</th>
        </tr>
        <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?php echo $booking['id']; ?></td>
            <td><?php echo $booking['username']; ?></td>
            <td><?php echo $booking['name']; ?></td>
            <td><?php echo $booking['seats']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php include '../includes/footer.php'; ?>