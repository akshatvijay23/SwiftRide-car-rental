<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['fullname']) || !isset($_SESSION['email'])) {
    echo "<p class='error'>Session expired or incomplete. Please login first.</p>";
    exit();
}

// Check if booking details exist
if (!isset($_SESSION['location'], $_SESSION['pickup_date'], $_SESSION['return_date'])) {
    echo "<p class='error'>⚠️ Session expired or incomplete. Please start your booking from the homepage.</p>";
    exit();
}

$location = $_SESSION['location'];
$startDate = $_SESSION['pickup_date'];
$endDate = $_SESSION['return_date'];

// Validate car selection
if (!isset($_GET['car'])) {
    echo "<p class='error'>⚠️ No car selected. Please choose a car from the Services page.</p>";
    exit();
}
$carName = urldecode($_GET['car']);

// Car data
$cars = [
    ["name" => "Honda Civic", "price" => 1200, "image" => "img/car1.jpg"],
    ["name" => "Honda Amaze", "price" => 1000, "image" => "img/car2.jpg"],
    ["name" => "Maruti Sizuki Baleno", "price" => 800, "image" => "img/car3.png.jpg"],
    ["name" => "Nisan Magnite", "price" => 800, "image" => "img/car4.jpeg"],
    ["name" => "Marceddes benz-S Class", "price" => 2500, "image" => "img/car5.jpeg"],
    ["name" => "Thar", "price" => 1500, "image" => "img/car14.jpg"],
    ["name" => "Fortuner Automatic", "price" => 2000, "image" => "img/car7.jpeg"],
    ["name" => "Land Rover Defender", "price" => 4000, "image" => "img/car8.jpg"],
    ["name" => "Audi A4", "price" => 3500, "image" => "img/car10.jpg"],
    ["name" => "Toyota Inova Hycross", "price" => 2200, "image" => "img/car9.jpg"],
    ["name" => "Mercedes Maybach GLA650", "price" => 6000, "image" => "img/car11.jpeg"],
    ["name" => "Kia Carnival Automatic", "price" => 3000, "image" => "img/car12.jpg"],
    ["name" => "Marceddes C-class", "price" => 3000, "image" => "img/car13.jpeg"],
    ["name" => "Range Rover Evoque", "price" => 5500, "image" => "img/Car15.jpg"],
    ["name" => "Hyundai Creata", "price" => 1200, "image" => "img/car16.jpg"],
    ["name" => "Tata Punch", "price" => 500, "image" => "img/car18.jpg"],
    ["name" => "Mahindra XUV700", "price" => 1500, "image" => "img/car19.jpg"],
    ["name" => "Mahindra Scorpio S3 plus", "price" => 2000, "image" => "img/car20.jpg"],
];

$selectedCar = null;
foreach ($cars as $car) {
    if ($car['name'] === $carName) {
        $selectedCar = $car;
        break;
    }
}

if (!$selectedCar) {
    echo "<p class='error'>❌ Invalid car selected.</p>";
    exit();
}

// Date calculation
try {
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);
} catch (Exception $e) {
    echo "<p class='error'>⚠️ Invalid dates provided.</p>";
    exit();
}

$days = $start->diff($end)->days;
$days = max($days, 1);

$total = $days * $selectedCar['price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Summary</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 30px;
            margin: 40px auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
        }
        h1 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 25px;
        }
        img {
            display: block;
            margin: 0 auto 20px;
            border-radius: 8px;
            max-width: 100%;
            height: auto;
        }
        p {
            font-size: 1.1em;
            margin: 12px 0;
        }
        .total-cost {
            font-size: 1.3em;
            font-weight: bold;
            color: #28a745;
            margin-top: 15px;
        }
        .pay-btn {
            display: block;
            width: 100%;
            background: #28a745;
            color: white;
            border: none;
            padding: 15px 0;
            font-size: 1.2em;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 30px;
            transition: background 0.3s ease;
        }
        .pay-btn:hover {
            background: #218838;
        }
        .error {
            background: #ffe0e0;
            border: 1px solid #ff5c5c;
            color: #a70000;
            padding: 15px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Booking Summary</h1>

    <p><strong>User Name:</strong> <?= htmlspecialchars($_SESSION['fullname']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?></p>

    <p><strong>Car:</strong> <?= htmlspecialchars($selectedCar['name']) ?></p>
    <img src="<?= htmlspecialchars($selectedCar['image']) ?>" alt="<?= htmlspecialchars($selectedCar['name']) ?>" />

    <p><strong>Location:</strong> <?= htmlspecialchars($location) ?></p>
    <p><strong>Start Date:</strong> <?= htmlspecialchars($startDate) ?></p>
    <p><strong>End Date:</strong> <?= htmlspecialchars($endDate) ?></p>
    <p><strong>Total Days:</strong> <?= $days ?></p>

    <p class="total-cost">Total Cost: ₹<?= number_format($total) ?></p>

    <!-- Payment Form -->
    <form action="payment.php" method="POST">
    <input type="hidden" name="car" value="<?= htmlspecialchars($selectedCar['name']) ?>">
    <input type="hidden" name="total" value="<?= $total ?>">
    <input type="hidden" name="location" value="<?= htmlspecialchars($location) ?>">
    <input type="hidden" name="start_date" value="<?= htmlspecialchars($startDate) ?>">
    <input type="hidden" name="end_date" value="<?= htmlspecialchars($endDate) ?>">
    <button type="submit">Pay Now</button>
</form>

</div>
</body>
</html>
