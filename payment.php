<?php
// payment.php
session_start();

// Save booking details to session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['car'] = $_POST['car'] ?? null;
    $_SESSION['location'] = $_POST['location'] ?? null;
    $_SESSION['start_date'] = $_POST['start_date'] ?? null;
    $_SESSION['end_date'] = $_POST['end_date'] ?? null;
    $_SESSION['total'] = $_POST['total'] ?? null;
}
$total = $_SESSION['total'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Options</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
        h2, h3 { text-align: center; }
        .tabs button {
            padding: 10px; margin: 5px; border: none; cursor: pointer;
            background: #ccc; border-radius: 5px;
        }
        .tabs button.active { background: #007bff; color: white; }
        .payment-form { display: none; margin-top: 20px; }
        .payment-form.active { display: block; }
        input[type="text"], input[type="number"] {
            width: 100%; padding: 10px; margin-bottom: 10px;
            border: 1px solid #ccc; border-radius: 5px;
        }
        .btn-pay {
            background-color: #28a745; color: white;
            padding: 10px 20px; border: none;
            cursor: pointer; border-radius: 5px;
        }
        .total-amount {
            background: #e9f8ed; border: 1px solid #28a745;
            color: #155724; padding: 12px; margin-bottom: 15px;
            text-align: center; border-radius: 5px;
            font-weight: bold; font-size: 1.1em;
        }
    </style>
    <script>
        function showForm(formId) {
            let forms = document.querySelectorAll('.payment-form');
            forms.forEach(form => form.classList.remove('active'));

            let buttons = document.querySelectorAll('.tabs button');
            buttons.forEach(btn => btn.classList.remove('active'));

            document.getElementById(formId).classList.add('active');
            document.getElementById(formId + '-btn').classList.add('active');
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Select Payment Method</h2>

    <div class="tabs">
        <button id="card-btn" onclick="showForm('card')">Card</button>
        <button id="upi-btn" onclick="showForm('upi')">UPI</button>
        <button id="netbanking-btn" onclick="showForm('netbanking')">Net Banking</button>
    </div>

    <!-- Card Payment Form -->
    <form class="payment-form" id="card" method="post" action="process_payment.php">
        <h3>Card Payment</h3>
        <div class="total-amount">Total Amount to Pay: ₹<?= number_format($total) ?></div>

        <input type="text" name="card_number" placeholder="Card Number" required>
        <input type="text" name="card_name" placeholder="Name on Card" required>
        <input type="text" name="expiry" placeholder="MM/YY" required>
        <input type="number" name="cvv" placeholder="CVV" required>
        <input type="hidden" name="method" value="card">

        <!-- Hidden Booking Details -->
        <input type="hidden" name="car" value="<?= htmlspecialchars($_SESSION['car'] ?? '') ?>">
        <input type="hidden" name="location" value="<?= htmlspecialchars($_SESSION['location'] ?? '') ?>">
        <input type="hidden" name="start_date" value="<?= htmlspecialchars($_SESSION['start_date'] ?? '') ?>">
        <input type="hidden" name="end_date" value="<?= htmlspecialchars($_SESSION['end_date'] ?? '') ?>">
        <input type="hidden" name="total" value="<?= htmlspecialchars($total) ?>">
        <input type="hidden" name="payment_method" value="card">

        <button type="submit" class="btn-pay">Pay</button>
    </form>

    <!-- UPI Payment Form -->
    <form class="payment-form" id="upi" method="post" action="process_payment.php">
        <h3>UPI Payment</h3>
        <div class="total-amount">Total Amount to Pay: ₹<?= number_format($total) ?></div>

        <input type="text" name="upi_id" placeholder="Enter UPI ID" required>
        <input type="hidden" name="method" value="upi">

        <!-- Hidden Booking Details -->
        <input type="hidden" name="car" value="<?= htmlspecialchars($_SESSION['car'] ?? '') ?>">
        <input type="hidden" name="location" value="<?= htmlspecialchars($_SESSION['location'] ?? '') ?>">
        <input type="hidden" name="start_date" value="<?= htmlspecialchars($_SESSION['start_date'] ?? '') ?>">
        <input type="hidden" name="end_date" value="<?= htmlspecialchars($_SESSION['end_date'] ?? '') ?>">
        <input type="hidden" name="total" value="<?= htmlspecialchars($total) ?>">
        <input type="hidden" name="payment_method" value="upi">

        <button type="submit" class="btn-pay">Pay</button>
    </form>

    <!-- Net Banking Form -->
    <form class="payment-form" id="netbanking" method="post" action="process_payment.php">
        <h3>Net Banking</h3>
        <div class="total-amount">Total Amount to Pay: ₹<?= number_format($total) ?></div>

        <input type="text" name="bank_name" placeholder="Bank Name" required>
        <input type="text" name="account_number" placeholder="Account Number" required>
        <input type="hidden" name="method" value="netbanking">

        <!-- Hidden Booking Details -->
        <input type="hidden" name="car" value="<?= htmlspecialchars($_SESSION['car'] ?? '') ?>">
        <input type="hidden" name="location" value="<?= htmlspecialchars($_SESSION['location'] ?? '') ?>">
        <input type="hidden" name="start_date" value="<?= htmlspecialchars($_SESSION['start_date'] ?? '') ?>">
        <input type="hidden" name="end_date" value="<?= htmlspecialchars($_SESSION['end_date'] ?? '') ?>">
        <input type="hidden" name="total" value="<?= htmlspecialchars($total) ?>">
        <input type="hidden" name="payment_method" value="netbanking">

        <button type="submit" class="btn-pay">Pay</button>
    </form>
</div>

<script>
    // Show Card by default
    showForm('card');
</script>

</body>
</html>
