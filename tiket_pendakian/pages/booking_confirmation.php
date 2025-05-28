<?php
session_start();
include '../includes/header.php'; // Memanggil header yang sudah ada

// Cek apakah ada data pemesanan di session
if (!isset($_SESSION['booking'])) {
    header("Location: trips.php"); // Redirect jika tidak ada pemesanan
    exit();
}

$booking = $_SESSION['booking'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css"> <!-- CSS umum -->
    <title>Konfirmasi Pemesanan</title>
</head>

<body>
    <main>
        <h1>Konfirmasi Pemesanan Tiket</h1>
        <p>Anda telah berhasil memesan tiket pendakian!</p>
        <ul>
            <li>Nama: <?php echo htmlspecialchars($name); ?></li>
            <li>Alamat: <?php echo htmlspecialchars($address); ?></li>
            <li>Nomor Telepon: <?php echo htmlspecialchars($phone); ?></li>
            <li>Gunung: <?php echo htmlspecialchars($booking['mountain']); ?></li>
            <li>Tanggal Pendakian: <?php echo htmlspecialchars($booking['date']); ?></li>
            <li>Jumlah Tiket: <?php echo htmlspecialchars($booking['tickets']); ?></li>
        </ul>
        <p>Terima kasih telah memesan tiket dengan kami!</p>
        <a href="trips.php">Kembali ke Pemesanan</a>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>

</html>

<?php
// Hapus data pemesanan dari session setelah ditampilkan
unset($_SESSION['booking']);
?>