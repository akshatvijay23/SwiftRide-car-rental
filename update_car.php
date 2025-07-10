<?php
include('db.php');

$id = $_POST['id'];
$car_name = $_POST['car_name'];
$price = $_POST['price_per_day'];
$year = $_POST['year'];

$image_query = "";
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image_name = basename($_FILES['image']['name']);
    $target_path = "uploads/" . $image_name;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        $image_query = ", image='$image_name'";
    }
}

$query = "UPDATE cars SET car_name='$car_name', price_per_day='$price', year='$year' $image_query WHERE id=$id";

if (mysqli_query($conn, $query)) {
    header("Location: view_edit_cars.php");
    exit();
} else {
    echo "Error updating car.";
}
?>