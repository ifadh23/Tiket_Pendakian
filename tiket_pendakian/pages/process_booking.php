<?php
session_start();
include '../includes/db.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $mountain = trim($_POST['mountain']);
    $date = $_POST['date'];
    $tickets = (int)$_POST['tickets'];

    // Validasi input
    if (empty($name) || empty($address) || empty($phone) || empty($mountain) || empty($date) || $tickets <= 0) {
        die("Semua field harus diisi dan jumlah tiket harus lebih dari 0.");
    }

    // Simpan data pemesanan ke tabel bookings
    $stmt = $conn->prepare("INSERT INTO bookings (name, address, phone, mountain, date, tickets) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $name, $address, $phone, $mountain, $date, $tickets);

    if ($stmt->execute()) {
        // Ambil ID pemesanan yang baru saja disimpan
        $booking_id = $stmt->insert_id;

        // Hitung total pembayaran (misalnya, Rp. 100.000 per tiket)
        $price_per_ticket = 100000;
        $total_amount = $price_per_ticket * $tickets;

        // Simpan transaksi ke tabel transactions
        $stmt_transaction = $conn->prepare("INSERT INTO transactions (booking_id, total_amount, payment_status) VALUES (?, ?, 'pending')");
        $stmt_transaction->bind_param("id", $booking_id, $total_amount);

        if ($stmt_transaction->execute()) {
            // Arahkan ke halaman struk pembayaran
            header("Location: receipt.php?transaction_id=" . $stmt_transaction->insert_id);
            exit();
        } else {
            echo "Terjadi kesalahan saat menyimpan transaksi: " . $stmt_transaction->error;
        }

        $stmt_transaction->close();
    } else {
        echo "Terjadi kesalahan saat memproses pemesanan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>