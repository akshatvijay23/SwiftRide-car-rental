<?php
include('db.php');
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM cars WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<h2>Edit Car</h2>
<form action="update_car.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    Car Name: <input type="text" name="car_name" value="<?= $row['car_name'] ?>"><br>
    Price/Day: <input type="text" name="price_per_day" value="<?= $row['price_per_day'] ?>"><br>
    Year: <input type="text" name="year" value="<?= $row['year'] ?>"><br>

    <?php if (!empty($row['image'])): ?>
        Current Image:<br>
        <img src="uploads/<?= $row['image'] ?>" style="width: 150px;"><br>
    <?php endif; ?>

    Change Image: <input type="file" name="image"><br><br>
    <input type="submit" value="Update" style="padding: 5px 10px;">
</form>

<br>

<!-- Delete Button -->
<form method="post" action="delete_car.php" onsubmit="return confirm('Are you sure you want to delete this car?');">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <button type="submit" style="background-color: red; color: white; padding: 5px 10px;">Delete This Car</button>
</form>
