<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}
$conn = new mysqli("localhost", "root", "", "car_rental");

// Get car data
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$car = $stmt->get_result()->fetch_assoc();

if (!$car) {
    die("Car not found.");
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Car</title></head>
<body>
<h2>Edit Car</h2>
<form action="edit_car_process.php" method="post">
    <input type="hidden" name="id" value="<?= $car['id'] ?>">
    <label>Car Name:</label><br>
    <input type="text" name="car_name" value="<?= $car['car_name'] ?>" required><br><br>
    <label>Model:</label><br>
    <input type="text" name="model" value="<?= $car['model'] ?>" required><br><br>
    <label>Price per day:</label><br>
    <input type="number" name="price" value="<?= $car['price'] ?>" required><br><br>
    <input type="submit" value="Update Car">
</form>
</body>
</html>
