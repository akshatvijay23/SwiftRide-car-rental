<?php
session_start();

if (!isset($_SESSION['booking_success']) || $_SESSION['booking_success'] !== true) {
    die("No booking found. Please book a car first.");
}

$data = $_SESSION['invoice_data'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Invoice</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .invoice-box {
            background: #fff;
            padding: 30px 40px;
            max-width: 700px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
            line-height: 1.6;
            color: #333;
        }

        .invoice-box h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .invoice-data p {
            margin: 8px 0;
        }

        .amount {
            font-size: 18px;
            font-weight: bold;
        }

        .print-btn {
            margin-top: 30px;
            background: #007bff;
            border: none;
            padding: 12px 25px;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin-left: auto;
            margin-right: auto;
            font-size: 16px;
        }

        .print-btn:hover {
            background: #0056b3;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="invoice-box">
    <h2>✅ Booking Confirmed!</h2>

    <div class="invoice-data">
        <p><strong>Name:</strong> <?= htmlspecialchars($_SESSION['fullname']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?></p>
        <p><strong>Car:</strong> <?= htmlspecialchars($data['car']) ?></p>
        <p><strong>Location:</strong> <?= htmlspecialchars($data['location']) ?></p>
        <p><strong>From:</strong> <?= htmlspecialchars($data['rent_date']) ?> to <?= htmlspecialchars($data['return_date']) ?></p>
        <p class="amount"><strong>Total:</strong> ₹<?= number_format($data['total']) ?></p>
        <p><strong>Payment Mode:</strong> <?= htmlspecialchars(ucfirst($data['payment_method'])) ?></p>
    </div>

    <button class="print-btn" onclick="window.print()">🖨️ Download / Print Invoice</button>

    <br><br>
    <a href="index.php">← Back to Home</a>
</div>

</body>
</html>
