<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}
$conn = new mysqli("localhost", "root", "", "car_rental");
$bookings = $conn->query("SELECT * FROM bookings");
?>

<!DOCTYPE html>
<html>
<head><title>View Bookings</title></head>
<body>
<h2>All Bookings</h2>
<table border="1">
    <tr><th>ID</th><th>User</th><th>Car</th><th>Start Date</th><th>End Date</th></tr>
    <?php while($b = $bookings->fetch_assoc()): ?>
        <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['user_id'] ?></td>
            <td><?= $b['car_id'] ?></td>
            <td><?= $b['start_date'] ?></td>
            <td><?= $b['end_date'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
