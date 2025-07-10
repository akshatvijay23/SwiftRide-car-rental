<?php
// Show all PHP errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to database
$conn = new mysqli("localhost", "root", "", "car_rental");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from form (use null coalescing in case some are missing)
$fullname = $_POST['fullname'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm-password'] ?? ''; // Hyphen matches HTML form name

// Validate password match
if ($password !== $confirmPassword) {
    die("❌ Passwords do not match.");
}

// Securely hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert into database using prepared statement
$sql = "INSERT INTO users (fullname, email, phone, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssss", $fullname, $email, $phone, $hashedPassword);

    if ($stmt->execute()) {
        echo "✅ Registration successful!";
        // Optional: redirect to login page
        // header("Location: login.php");
        // exit;
    } else {
        echo "❌ Database error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "❌ SQL prepare failed: " . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental - User Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form class="register-form"  action="register.php" method="post">
            
            <h2>Create an Account</h2>

            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <button type="submit">Register</button>

            <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
        
    </div>
</body>
</html>
