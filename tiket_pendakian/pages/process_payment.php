<?php
session_start();
include '../includes/db.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaction_id = $_POST['transaction_id'];

    // Di sini Anda akan mengintegrasikan dengan gateway pembayaran
    // Untuk demonstrasi, kita anggap pembayaran berhasil

    // Update status pembayaran di database
    $stmt = $conn->prepare("UPDATE transactions SET payment_status = 'succeeded' WHERE id = ?");
    $stmt->bind_param("i", $transaction_id);

    if ($stmt->execute()) {
        // Arahkan ke halaman struk pembayaran
        header("Location: receipt.php?transaction_id=" . $transaction_id);
        exit();
    } else {
        echo "Terjadi kesalahan saat memperbarui status pembayaran: " . $stmt->error;
    }

    $stmt->close();
    $conn-> close();
}
?>