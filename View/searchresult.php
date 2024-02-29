<?php
include '../Controller/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Dealership</title>
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
                <li><a href="signup.php">Login</a></li>
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

            if($result){
            ?>
             <body>
                <div class="Models" style="padding: 75px;">
                    <h1 style="padding: 50px;">Our Models</h1>
                    <div class="cars" style="display: flex; padding-right: 25px; ">
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="catalog" style="height: 500px; width: 400px; margin-right: 25px; display: flex; align-items: center; flex-direction: column; padding: 10px;">
                                <img src="../Public/img/car5.png" style="display: flex; justify-content: center;">
                                <strong style="font-size: 24px; font-weight: 700;"><?php echo $row['car']; ?></strong>
                                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;"><?php echo 'PHP 200,000/month'; ?></strong>
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
                <h1> <b> No Results Found <b> </h1>
            </body>
            </html>
            <?php
        }
    }
    ?>