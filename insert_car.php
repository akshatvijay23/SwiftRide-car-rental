<?php
include('db.php');

$car_name = $_POST['car_name'];
$price = $_POST['price_per_day'];
$year = $_POST['year'];

$image_name = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image_name = basename($_FILES['image']['name']);
    $target_path = "uploads/" . $image_name;
    move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
}

$query = "INSERT INTO cars (car_name, price_per_day, year, image)
          VALUES ('$car_name', '$price', '$year', '$image_name')";

if (mysqli_query($conn, $query)) {
    echo "Car added successfully! <a href='view_edit_cars.php'>View Cars</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>