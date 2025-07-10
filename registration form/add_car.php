<?php
// add_car.php
$conn = new mysqli("localhost", "root", "", "your_database"); // update with your DB name

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_name = $_POST['car_name'];
    $model = $_POST['model'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO cars (car_name, model, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $car_name, $model, $price);
    
    if ($stmt->execute()) {
        echo "✅ Car added successfully!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }
}
?>

<h2>Add New Car</h2>
<form method="POST">
    <input type="text" name="car_name" placeholder="Car Name" required><br><br>
    <input type="text" name="model" placeholder="Model" required><br><br>
    <input type="number" name="price" placeholder="Price Per Day" required step="0.01"><br><br>
    <button type="submit">Add Car</button>
</form>
