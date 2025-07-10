<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}
$conn = new mysqli("localhost", "root", "", "car_rental");
$cars = $conn->query("SELECT * FROM cars");
?>

<!DOCTYPE html>
<html>
<head><title>View Cars</title></head>
<body>
<h2>Cars List</h2>
<table border="1">
    <tr><th>ID</th><th>Name</th><th>Model</th><th>Price</th><th>Actions</th></tr>
    <?php while($car = $cars->fetch_assoc()): ?>
        <tr>
            <td><?= $car['id'] ?></td>
            <td><?= $car['car_name'] ?></td>
            <td><?= $car['model'] ?></td>
            <td><?= $car['price'] ?></td>
            <td>
                <a href="edit_car.php?id=<?= $car['id'] ?>">Edit</a> |
                <a href="delete_car.php?id=<?= $car['id'] ?>" onclick="return confirm('Delete this car?');">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
