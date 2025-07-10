<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['location'] = $_POST['location'];
    $_SESSION['pickup_date'] = $_POST['pickup_date'];
    $_SESSION['return_date'] = $_POST['return_date'];

    // Redirect to Services
    header("Location: Services.php");
    exit();
}
?>
