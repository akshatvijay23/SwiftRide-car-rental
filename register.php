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
    // Registration successful, redirect to login page
    header("Location: login.php"); 
    exit;
}
 else {
        echo "❌ Database error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "❌ SQL prepare failed: " . $conn->error;
}

$conn->close();
?>
