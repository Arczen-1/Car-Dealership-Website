<?php
include '../Controller/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
    <link rel="stylesheet" href="../Public/style/style.css">
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
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="signup.php">Login</a></li>';
                }
                ?>
            </ul>
            <div class="Button">
                <button id="book">Book Now</button>
                
            </div>
        </nav>
        <?php
        if(isset($_POST['search'])){
            $search = $_POST['brand'];
            $sql="SELECT * FROM `tblproducts` WHERE car='$search'";
            $result=mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
            ?>
             <body>
                <div class="Models" style="padding: 75px;">
                    <h1 style="padding: 50px;">Our Models</h1>
                    <div class="cars" style="display: flex; padding-right: 25px; ">
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="catalog" style="height: 500px; width: 400px; margin-right: 25px; display: flex; align-items: center; flex-direction: column; padding: 10px;">
                                <img src="../Public/img/<?php echo $row['image_path']; ?>" style="display: flex; justify-content: center;">
                                <strong style="font-size: 24px; font-weight: 700;"><?php echo $row['car']; ?></strong>
                                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;"><?php echo 'PHP '.$row['price'].'/month'; ?></strong>
                                <button style="height: 30px; width: 75px;"><a href="carView.php">More</a></button>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="Models" style="padding: 75px;">
                    <h1 style="padding: 50px; color: Red">No Results Found</h1>
                </div>
                <?php
            }
        }
        ?>
    </header>
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