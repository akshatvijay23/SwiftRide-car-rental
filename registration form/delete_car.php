<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}
$conn = new mysqli("localhost", "root", "", "car_rental");

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: view_cars.php");
exit;
?>
