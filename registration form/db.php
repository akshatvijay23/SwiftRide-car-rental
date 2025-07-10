<?php
$host = 'localhost';
$user = 'email';
$pass = 'password';
$dbname = 'car_rental';

$conn = new mysqli("localhost", "root", "", "car_rental");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$host = 'localhost';       // Database host (usually localhost)
$dbname = 'car_rental';    // Name of your database
$username = 'root';        // Your MySQL username
$password = '';            // Your MySQL password (leave empty if none)

// Create a new PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Set error mode to exception for debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: uncomment the next line to confirm connection
    // echo "Connected successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
