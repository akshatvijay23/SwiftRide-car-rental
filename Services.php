<?php
session_start();
$loggedIn = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarRent</title>
    <!--Link to css  -->
    <link rel="stylesheet" href="Style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <!-- Header Section -->
    <header>
        <a href="#" class="logo img"><img src="img/jeep.png" alt=""></a>
        <div class="bx bx-menu" id="menu-icon"> </div>
        <ul class="navbar" id="menu">
            <li><a href="index.php">Home</a></li>

            <li><a href="Services.php">Services</a></li>
            <li><a href="Review.php">Review</a></li>
            <li><a href="About.php">About</a></li>
        </ul>

         <!-- Login -->
        <div class="header-btn">
            <?php if ($loggedIn): ?>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['fullname']); ?>!</span>
                <a href="logout.php" class="sign-in">Logout</a>
            <?php else: ?>
                <a href="login.php" class="sign-in">Sign-In</a>
            <?php endif; ?>
        </div>

    </header>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="heading">
            <span>Our Cars</span>
            <h1>Explore Our Car Collection</h1>
        </div>
        <div class="services-container">

            <?php
            include('db.php');
            $query = "SELECT * FROM cars ORDER BY id DESC";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="box">';
                echo '<div class="box-img">';
                if (!empty($row["image"])) {
                    echo '<img src="uploads/' . $row["image"] . '" alt="Car Image">';
                } else {
                    echo '<img src="img/default_car.jpg" alt="Default Car">';
                }
                echo '</div>';
                echo '<p>' . htmlspecialchars($row["year"]) . '</p>';
                echo '<h3>' . htmlspecialchars($row["car_name"]) . '</h3>';
                echo '<h2>₹' . $row["price_per_day"] . '<span>/Per day</span></h2>';
                echo '<a href="Summary.php?car=' . urlencode($row["car_name"]) . '" class="btn">Rent Now</a>';
                echo '</div>';
            }
            ?>


    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <p>&copy; 2023 CarRent. All rights reserved.</p>
                <ul class="social-icons">
                    <li><a href="#"><i class='bx bxl-facebook'></i></a></li>
                    <li><a href="#"><i class='bx bxl-twitter'></i></a></li>
                    <li><a href="#"><i class='bx bxl-instagram'></i></a></li>
                    <li><a href="#"><i class='bx bxl-linkedin'></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="Main.js"></script>

</body>

</html>