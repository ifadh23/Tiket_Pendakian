<?php
session_start();
include '../includes/db.php';
include '../includes/header.php';

// Cek apakah pengguna adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../pages/index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $available_seats = $_POST['available_seats'];

    $stmt = $pdo->prepare("INSERT INTO trips (name, date, price, available_seats) VALUES (:name, :date, :price, :available_seats)");
    $stmt->execute(['name' => $name, 'date' => $date, 'price' => $price, 'available_seats' => $available_seats]);
}

$stmt = $pdo->query("SELECT * FROM trips");
$trips = $stmt->fetchAll();
?>

<main>
    <h1>Kelola Pendakian</h1>
    <form method="POST" action="">
        <label for="name">Nama Pendakian:</label>
        <input type="text" name="name" required>
        <label for="date">Tanggal:</label>
        <input type="date" name="date" required>
        <label for="price">Harga:</label>
        <input type="number" name="price" required>
        <label for="available_seats">Kursi Tersedia:</label>
        <input type="number" name="available_seats" required>
        <button type="submit">Tambah Pendakian</button>
    </form>

    <h2>Daftar Pendakian</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Harga</th>
            <th>Kursi Tersedia</th>
        </tr>
        <?php foreach ($trips as $trip): ?>
        <tr>
            <td><?php echo $trip['name']; ?></td>
            <td><?php echo $trip['date']; ?></td>
            <td><?php echo $trip['price']; ?></td>
            <td><?php echo $trip['available_seats']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php include '../includes/footer.php'; ?>