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

    <!-- Reviews Section -->
    <section class="reviews" id="reviews">
        <div class="heading" id="menu">
            <span>Reviews</span>
            <h1>What Our Customers Say</h1>
        </div>
        <div class="reviews-container">
            <div class="box">
                <div class="rev-img">
                    <img src="img/Nik.jpg" alt="">
                </div>
                <h2>Keshav Somani</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Best services in the town! Highly recommend for everyone looking for reliable car rentals.</p>
            </div>

            <div class="box">
                <div class="rev-img">
                    <img src="img/Nova.jpg" alt="">
                </div>
                <h2>Nova Macro</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Best car rental experience I’ve had.</p>
            </div>

            <div class="box">
                <div class="rev-img">
                    <img src="img/Nehal.jpg" alt="">
                </div>
                <h2>Nehal Jain</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>What I really liked was the clear pricing — no hidden fees or last-minute surprises. The cost breakdown was simple and honest</p>
            </div>
            <div class="box">
                <div class="rev-img">
                    <img src="img/Salman Khan.jpg" alt="">
                </div>
                <h2>Salman Khan</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Really liked and appriciate it, and also higly recomended</p>
            </div>
            <div class="box">
                <div class="rev-img">
                    <img src="img/Vidhyut.jpg" alt="">
                </div>
                <h2>Vidhyut Jamwal</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Booking my car took less than 5 minutes, and I received instant confirmation. Highly recommend for anyone.</p>
            </div>
            <div class="box">
                <div class="rev-img">
                    <img src="img/Shambhavi.jpg" alt="">
                </div>
                <h2>Shambhavi Singh</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Fast and easy booking process!</p>
            </div>
            <div class="box">
                <div class="rev-img">
                    <img src="img/Ghulathi.jpg" alt="">
                </div>
                <h2>Sidharth Shah</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Smooth pickup and return experience.</p>
            </div>
            <div class="box">
                <div class="rev-img">
                    <img src="img/grey.jpg" alt="">
                </div>
                <h2>Cristian Grey</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Website is user-friendly and responsive</p>
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

    <!-- ScrollReveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Link to JS -->
    <script src="Main.js"></script>
</body>
</html>
