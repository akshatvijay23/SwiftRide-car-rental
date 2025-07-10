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
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
   <!-- Header Section -->
    <header>
        <a href="#" class="logo img"><img src="img/jeep.png" alt=""></a>
        <div class="bx bx-menu" id="menu-icon">  </div>
        <ul class="navbar"  id="menu">
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
    <!-- About Section -->
    <section class="about" id="about">
        <div class="heading">
            <span>About Us</span>
            <h1>Who We Are</h1>
        </div>
        <div class="about-container">
            <div class="about-img">
                <img src="img/about.png" alt="About CarRent">
            </div>
            <div class="about-text">
                <span>Welcome to CarRent</span>
                <p>At CarRent, we are passionate about making your journey comfortable, safe, and enjoyable. Founded in 2020, we have grown into one of the most trusted car rental providers, offering a wide range of vehicles to suit every need and budget.</p>
                <p>Our mission is to deliver top-notch customer service, affordable rates, and a seamless rental experience. Whether you're traveling for business or leisure, our team is dedicated to helping you find the perfect car for your trip.</p>
                <p>Thank you for choosing CarRent — we look forward to serving you!</p>
                <a href="#" class="btn">Learn More</a>
            </div>
        </div>
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