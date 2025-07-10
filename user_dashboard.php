<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['email']) || !isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: login.html");
    exit();
}

// Get user email from session
$email = $_SESSION['email'];
$fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 'User';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .dashboard {
            max-width: 700px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h1 {
            color: #333;
        }
        .info {
            margin-top: 20px;
        }
        a.logout {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Welcome, <?php echo htmlspecialchars($fullname); ?>!</h1>
        <div class="info">
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Role:</strong> User</p>
        </div>
        <a class="logout" href="logout.php">Logout</a>
    </div>
</body>
</html>
