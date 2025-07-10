<?php
session_start();

// Only allow admins
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "❌ Access denied. Admins only.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            margin: 0;
            padding: 0;
        }
        .header {
            background: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .sidebar {
            background: #444;
            width: 200px;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #666;
        }
        .content {
            margin-left: 200px;
            padding: 20px;
        }
        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
            background: red;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Admin Dashboard</h1>
    <a href="logout.php" class="logout">Logout</a>
</div>

<div class="sidebar">
    <h3 style="text-align:center;">Menu</h3>
    <a href="add_car.php">Add Car</a>
    <a href="view_cars.php">View / Edit Cars</a>
    <a href="view_bookings.php">View Bookings</a>
    <a href="users.php">View Users</a>
</div>

<div class="content">
    <h2>Welcome, Admin <?php echo $_SESSION['email']; ?>!</h2>
    <p>Select an option from the left menu to manage the site.</p>
</div>

</body>
</html>
