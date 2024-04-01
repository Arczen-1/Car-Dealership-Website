<?php
include '../Controller/connect.php';
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Models</title>
        <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
        <link href="../Public/style/models.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar">
            <div class="logo">
                <img src="../Public/img/Logo.webp" alt="Car Dealership Logo">
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="models.php">Models</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="account.php">Account</a></li>
                <?php
                    session_start();
                    if (isset($_SESSION['email'])) {
                        if ($_SESSION['role'] == 'admin') {
                            echo '<li><a href="dashboard.php">Dashboard</a></li>';
                        }
                        echo '<li><a href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li><a href="signup.php">Login</a></li>';
                    }
                 ?>
            </ul>
            <div class="Button">
            <button onclick="location.href='book.php'" id="book">Book Now</button>   
            </div>
        </nav>
        <nav class="navbar">
            <div class="spacer v40"></div>
            <ul class="nav-links">
                <li><a href="hatchback.php">HatchBacks & Sedans</a></li>
                <li><a href="suv.php">Crossovers & SUVs</a></li>
                <li><a href="mpv.php">MPVs</a></li>
                <li><a href="van.php">Vans & Pickups</a></li>
                <li><a href="elec.php">Electrified</a></li>
            </ul>
            <div class="spacer v40"></div>
        </nav>
        <div class="spacer v40"></div>
        <div class="wrap">
            <div class="modelsContainer">
                <div class="Models">
                    <div class="imgAndCarName">
                        <a href="carView.php?id=7"><img src="../Public/img/car5.png"></a>
                            <p>Lamborghini Urus</p>
                        </div>
                </div>
            </div>
        </div>
        <div class="spacer v80">
        </div>
        <footer>
    <div class="footContent">
        <div class="left">
            <div class="row">
                <div class="theFootLogo">
                    <img src="../Public/img/logoWhite.png" alt="Car Dealership Logo">
                </div>
                <div class="footTitle">
                    <h3>Car Dealership</h3>
                </div>
            </div>
            <div class="about">
                <h3>About Us</h3>
                <p>Welcome to our Car Dealership, where our passion for quality vehicles meets your driving dreams. With a commitment to excellence, we take pride in offering a curated selection of top-notch cars, ensuring every customer drives away with confidence and satisfaction.</p>
            </div>
        </div>
        <div class="mid">
            <h3>Contact Us</h3>
            <p>Email: cardealership@gmail.com</p>
            <p>Phone: 0917 111 1111</p>
            <p>De La Salle, Taft Avenue, Manila</p>
        </div>
        <div class="right">
            <h3>Follow our Socials</h3>
                <p>Facebook</p>
                <p>Instagram</p>
                <p>Twitter</p>
        </div>
    </footer>
    </body>

</html>