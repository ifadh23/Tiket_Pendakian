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
    <link rel="stylesheet" href="../assets/css/mountain_info.css"> <!-- CSS untuk halaman info gunung -->
    <title>Informasi Gunung</title>
</head>
<body>
    <main>
        <div class="mountain-info-container">
            <h1>Informasi Gunung</h1>
            <?php
            // Mengambil data gunung dari database
            $query = "SELECT * FROM mountains";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="mountain-card">
                        <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                        <p><strong>Lokasi:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                        <p><strong>Tinggi:</strong> <?php echo htmlspecialchars($row['height']); ?> m</p>
                        <p><strong>Deskripsi:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Tidak ada informasi gunung yang tersedia.</p>";
            }
            ?>
        </div>
    </main>

    <?php include '../includes/footer.php'; // Memanggil footer yang sudah ada ?>
</body>
</html>