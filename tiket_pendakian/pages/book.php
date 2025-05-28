<?php
include '../includes/db.php';
include '../includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $trip_id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM trips WHERE id = :id");
    $stmt->execute(['id' => $trip_id]);
    $trip = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $seats = $_POST['seats'];

    $stmt = $pdo->prepare("INSERT INTO bookings (user_id, trip_id, seats) VALUES (:user_id, :trip_id, :seats)");
    $stmt->execute(['user_id' => $user_id, 'trip_id' => $trip_id, 'seats' => $seats]);

    header("Location: trips.php");
    exit;
}
?>

<main>
    <h1>Pemesanan Tiket</h1>
    <h2><?php echo $trip['name']; ?></h2>
    <form method="POST" action="">
        <label for="seats">Jumlah Kursi:</label>
        <input type="number" name="seats" min="1" max="<?php echo $trip['available_seats']; ?>" required>
        <button type="submit">Pesan</button>
    </form>
</main>

<?php include '../includes/footer.php'; ?>