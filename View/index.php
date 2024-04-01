
<?php
include '../Controller/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Dealership</title>
    <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
    <link rel="stylesheet" href="../Public/style/sty.css">
</head>
<body>
    <header>
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
        <div class="header-content">

            <form class="searchbar" action="searchresult.php" method="post">
                <div class="ser">
                    <div class="input-group">
                        <span class="input-title" id="brand">Car, Model, or Brand</span>
                        <input class="search-input" id="brand" name="brand" placeholder="Type the brand here..."> </input>
                    </div>
                    <div class="input-group">
                        <span class="input-title">Price</span>
                        <input class="search-input" id="price" name="price" placeholder="Add an amount here..."> </input>
                    </div>
                    <div class="input-group">
                        <span class="input-title">Color</span>
                        <input class="search-input" id="color" name="color"placeholder="Type the color here..."> </input>
                    </div>
                    <button id="search" name="search"> Search </button>
                </div>
            </form>
        </div>
    </header>

    <div class="motto" style="padding: 75px; width: 750px; margin: auto; text-align: center;">
        <h1 style="padding: 25px;"> About Us </h1>
        <span> Welcome to XCars, where our passion for quality vehicles meets your driving dreams. With a commitment to excellence, we take pride in offering a curated selection of top-notch cars, ensuring every customer drives away with confidence and satisfaction.</span>
    </div>

    <div class="Models" style="padding: 75px;">
        <h1 style="padding: 50px;">Our Models</h1>
        <div class="cars" style="display: flex; padding-right: 25px; ">
            <div class="catalog" style="height: 500px; width: 400px; margin: auto; margin-right: 25px; display: flex; align-items: center; flex-direction: column; padding: 10px;">
                <img src="../Public/img/car5.png" style="display: flex; justify-content: center;">
                <strong style="font-size: 24px; font-weight: 700;">Lamborghini Urus</strong>
                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;">$229,268</strong>
                <button style="height: 30px; width: 75px;"><a href="carView.php?id=7">More</a></button>
            </div>
            <div class="catalog" style="height: 500px; width: 400px; margin: auto; margin-right: 25px; display: flex; align-items: center; flex-direction: column; padding: 10px;">
                <img src="../Public/img/car1.png" style="display: flex; justify-content: center;">
                <strong style="font-size: 24px; font-weight: 700;">Rolls-Royce Wraith</strong>
                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;">$330,488</strong>
                <button style="height: 30px; width: 75px;"><a href="carView.php?id=4">More</a></button>
            </div>
            <div class="catalog" style="height: 500px; width: 400px; margin: auto; margin-right: 25px; display: flex; align-items: center; flex-direction: column; padding: 10px;">
                <img src="../Public/img/car2.png" style="display: flex; justify-content: center;">
                <strong style="font-size: 24px; font-weight: 700;">Rolls-Royce Ghost Black</strong>
                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;">$450,000</strong>
                <button style="height: 30px; width: 75px;"><a href="carView.php?id=5">More</a></button>
            </div>
            <div class="catalog" style="height: 500px; width: 400px; margin: auto; margin-right: 25px; display: flex; align-items: center; flex-direction: column; padding: 10px;">
                <img src="../Public/img/car4.jpeg" style="display: flex; justify-content: center;">
                <strong style="font-size: 24px; font-weight: 700;">Mercedes-AMG GT 63</strong>
                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;">$136,050</strong>
                <button style="height: 30px; width: 75px;"><a href="carView.php?id=6">More</a></button>
            </div>
            
        </div>
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
