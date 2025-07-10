<?php
session_start();
include('db.php');

// Step 1: Retrieve session + POST data
$name = $_SESSION['fullname'] ?? '';
$email = $_SESSION['email'] ?? '';
$car = $_POST['car'] ?? '';
$location = $_POST['location'] ?? '';
$start_date = $_POST['start_date'] ?? '';
$end_date = $_POST['end_date'] ?? '';
$total = $_POST['total'] ?? 0;
$payment_method = $_POST['payment_method'] ?? '';

// Step 2: Validate
if (!$name || !$email || !$car || !$location || !$start_date || !$end_date || !$total || !$payment_method) {
    die("❌ Missing required booking details.");
}

// ✅ Step 3: Insert into bookings table
$sql = "INSERT INTO bookings (user_name, user_email, car_name, rent_date, return_date, total_price, status, created_at)
        VALUES (?, ?, ?, ?, ?, ?, 'confirmed', NOW())";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $name, $email, $car, $start_date, $end_date, $total);

if ($stmt->execute()) {
    // ✅ Step 4: Set invoice session data
    $_SESSION['booking_success'] = true;
    $_SESSION['invoice_data'] = [
        'car' => $car,
        'location' => $location,
        'rent_date' => $start_date,
        'return_date' => $end_date,
        'total' => $total,
        'payment_method' => $payment_method
    ];

    // ✅ Redirect to invoice
    header("Location: invoice.php");
    exit;
} else {
    echo "❌ Error inserting booking: " . $stmt->error;
}
?>
