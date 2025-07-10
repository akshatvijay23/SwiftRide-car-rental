<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}

include('db.php');

$id = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

if ($id > 0) {
    $check = mysqli_query($conn, "SELECT * FROM cars WHERE id = $id");
    if (mysqli_num_rows($check) > 0) {
        $delete = mysqli_query($conn, "DELETE FROM cars WHERE id = $id");
        if ($delete) {
            header("Location: view_cars.php?deleted=1");
            exit();
        } else {
            echo "❌ Failed to delete.";
        }
    } else {
        echo "❌ Car not found.";
    }
} else {
    echo "<h3 style='color:red;'>❌ Invalid request: ID missing</h3>";
}
?>
