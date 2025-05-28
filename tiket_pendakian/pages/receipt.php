<?php
session_start();
include '../includes/db.php'; // Menghubungkan ke database

if (isset($_GET['transaction_id'])) {
    $transaction_id = $_GET['transaction_id'];

    // Ambil detail transaksi dari database
    $stmt = $conn->prepare("SELECT t.*, b.name, b.mountain, b.date, b.tickets FROM transactions t JOIN bookings b ON t.booking_id = b.id WHERE t.id = ?");
    $stmt->bind_param("i", $transaction_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $transaction = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../assets/css/styles.css"> <!-- CSS umum -->
            <link rel="stylesheet" href="../assets/css/receipt.css"> <!-- CSS untuk halaman struk -->
            <title>Struk Pembayaran</title>
        </head>
        <body>
            <main>
                <div class="receipt-container">
                    <h1>Struk Pembayaran</h1>
                    <p>Terima kasih, <strong><?php echo htmlspecialchars($transaction['name']); ?></strong>! Berikut adalah detail transaksi Anda:</p>
                    <ul>
                        <li><strong>Gunung:</strong> <?php echo htmlspecialchars($transaction['mountain']); ?></li>
                        <li><strong>Tanggal Pendakian:</strong> <?php echo htmlspecialchars($transaction['date']); ?></li>
                        <li><strong>Jumlah Tiket:</strong> <?php echo htmlspecialchars($transaction['tickets']); ?></li>
                        <li><strong>Total Pembayaran:</strong> Rp. <?php echo number_format($transaction['total_amount'], 2, ',', '.'); ?></li>
                        <li><strong>Status Pembayaran:</strong> <?php echo htmlspecialchars($transaction['payment_status']); ?></li>
                    </ul>
                    <a href="trips.php" class="btn">Kembali ke Halaman Pemesanan</a>
                </div>
            </main>
        </body>
        </html>
        <?php
    } else {
        echo "Transaksi tidak ditemukan.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID transaksi tidak diberikan.";
}
?>