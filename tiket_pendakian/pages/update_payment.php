<?php
session_start();
include '../includes/db.php'; // Menghubungkan ke database

if (isset($_POST['transaction_id']) && isset($_POST['payment_status'])) {
    $transaction_id = (int)$_POST['transaction_id'];
    $payment_status = $_POST['payment_status'];

    // Validasi status pembayaran
    if (!in_array($payment_status, ['success', 'failed'])) {
        die("Status pembayaran tidak valid.");
    }

    // Update status pembayaran di database
    $stmt = $conn->prepare("UPDATE transactions SET payment_status = ? WHERE id = ?");
    $stmt->bind_param("si", $payment_status, $transaction_id);

    if ($stmt->execute()) {
        echo "Status pembayaran berhasil diupdate.";
    } else {
        echo "Terjadi kesalahan saat mengupdate status pembayaran: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID transaksi atau status pembayaran tidak diberikan.";
}
?>