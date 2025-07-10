<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}
$conn = new mysqli("localhost", "root", "", "car_rental");

$id = $_POST['id'];
$car_name = $_POST['car_name'];
$model = $_POST['model'];
$price = $_POST['price'];

$stmt = $conn->prepare("UPDATE cars SET car_name=?, model=?, price=? WHERE id=?");
$stmt->bind_param("ssdi", $car_name, $model, $price, $id);
$stmt->execute();

header("Location: view_cars.php");
exit;
?>
