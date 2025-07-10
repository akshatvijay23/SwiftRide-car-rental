
<?php
// insert_user.php (run this once to insert a test user)
$mysqli = new mysqli("localhost", "root", "", "car_rental");
$password = password_hash("test123", PASSWORD_DEFAULT); // hash password

$query = "INSERT INTO users (email, password) VALUES (?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $email, $password);

$email = "test@example.com";
$stmt->execute();

echo "User inserted.";
?>
