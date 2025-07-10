<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $car = $_POST['car_name'];
    $rent_date = $_POST['rent_date'];
    $return_date = $_POST['return_date'];
    $total_price = $_POST['total_price'];

    $query = "INSERT INTO bookings (user_name, user_email, car_name, rent_date, return_date, total_price) 
              VALUES ('$name', '$email', '$car', '$rent_date', '$return_date', $total_price)";

    if (mysqli_query($conn, $query)) {
        echo "<h3 style='color:green;'>Booking Confirmed!</h3>";
        echo "<a href='index.php'>Back to Home</a>";
    } else {
        echo "<h3 style='color:red;'>Booking Failed.</h3>";
    }
}
?>
