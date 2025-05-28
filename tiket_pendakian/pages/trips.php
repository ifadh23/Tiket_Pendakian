<?php
session_start();
include '../includes/db.php'; // Menghubungkan ke database
include '../includes/header.php'; // Memanggil header yang sudah ada
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css"> <!-- CSS umum -->
    <link rel="stylesheet" href="../assets/css/trips.css"> <!-- CSS untuk halaman pemesanan -->
    <title>Pemesanan Tiket Pendakian</title>
</head>
<body>
    <main>
        <div class="form-container">
            <h1>Pemesanan Tiket Pendakian</h1>
            <form action="process_booking.php" method="POST">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="address">Alamat:</label>
                    <input type="text" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="mountain">Pilih Gunung:</label>
                    <select id="mountain" name="mountain" required>
                        <option value="">-- Pilih Gunung --</option>
                        <?php
                        // Mengambil data gunung dari database
                        $query = "SELECT * FROM mountains";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($row['name']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                            }
                        } else {
                            echo "<option value=''>Tidak ada gunung tersedia</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Pendakian:</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="tickets">Jumlah Tiket:</label>
                    <input type="number" id="tickets" name="tickets" min="1" max="10" required>
                </div>

                <button type="submit">Pesan Tiket</button>
            </form>
        </div>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>