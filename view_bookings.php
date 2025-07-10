<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}
include('db.php');

$result = mysqli_query($conn, "SELECT * FROM bookings ORDER BY rent_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Bookings</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        th { background-color: #444; color: white; }
    </style>
</head>
<body>
    <h2>All Bookings</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Email</th>
            <th>Car</th>
            <th>Rent Date</th>
            <th>Return Date</th>
            <th>Total Price</th>
            <th>Status</th>
        </tr>
        <?php while($booking = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $booking['id'] ?></td>
                <td><?= $booking['user_name'] ?></td>
                <td><?= $booking['user_email'] ?></td>
                <td><?= $booking['car_name'] ?></td>
                <td><?= $booking['rent_date'] ?></td>
                <td><?= $booking['return_date'] ?></td>
                <td>₹<?= $booking['total_price'] ?></td>
                <td><?= $booking['status'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
