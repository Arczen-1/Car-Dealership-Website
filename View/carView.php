<?php
include '../Controller/connect.php';
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Car</title>
        <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
        <link href="../Public/style/carView.css" rel="stylesheet" />
    </head>

    <body>
        <?php
        if(isset($_GET['id'])) {
            $car_id = $_GET['id'];
        $carQuery = mysqli_query($conn, "SELECT * FROM cars WHERE id = '$car_id'"); 

            while($carResult = mysqli_fetch_assoc($carQuery)){
                $carName = $carResult['carName'];
                $carDescription = $carResult['carDescription'];
                $carPrice = $carResult['carPrice'];
                $carEngine = $carResult['carEngine'];
                $carPower = $carResult['carPower'];
                $carTopSpeed = $carResult['carTopSpeed'];
                $mph = $carResult['mph'];
                $consumption = $carResult['consumption'];
                $emissions = $carResult['emissions'];
                $length = $carResult['length'];
                $width = $carResult['width'];
                $height = $carResult['height'];
                $tankCapacity = $carResult['tankCapacity'];
                $maxPower = $carResult['maxPower'];
                $maxTorque = $carResult['maxTorque'];
                $maxEngineSpeed = $carResult['maxEngineSpeed'];
                $topSpeed = $carResult['topSpeed'];
                $acceleration = $carResult['acceleration'];
                $braking = $carResult['braking'];
                $img = $carResult['img'];
                }
        }
        ?>
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
        <div class="spacer v40"></div>
        <div class="wrap">
            <div class="container">
                <div class="car">
                    <img src="<?php echo $img ?>" alt="Car" />
                </div>
                <div class="carInfo">
                    <div class="carName"><h1><?php echo $carName ?></h1></div>
                    <div class="carDescription">
                        <p><?php echo $carDescription ?></p>
                    </div>
                </div>
            </div>
            <hr />
            <div class="carSpecsContainer">
                <div class="detailsAndButton">
                    <h1>Car Details</h1>
                    <div><button class="bookButton" onclick="location.href='checkout.php?id=<?php echo $car_id; ?>'" >Book Now</button></div>
                </div>
                <div class="specs">
                    <div class="spec">
                        <h2>Price</h2>
                        <div class="carPrice"><p><?php echo $carPrice ?></p></div>
                    </div>
                    <div class="spec">
                        <h2>Engine</h2>
                        <div class="carEngine"><p><?php echo $carEngine ?></p></div>
                    </div>
                    <div class="spec">
                        <h2>Max. Power</h2>
                        <div class="carPower"><p><?php echo $carPower ?></p></div>
                    </div>
                    <div class="spec">
                        <h2>Top Speed</h2>
                        <div class="carTopSpeed"><p><?php echo $carTopSpeed ?></p></div>
                    </div>
                    <div class="spec">
                        <h2>mph</h2>
                        <div class="mph"><p><?php echo $mph ?></p></div>
                    </div>
                </div>
                <div class="spacer v80"></div>
                <h1>Full Specifications</h1>
                <div class="fullSpecs">
                    <div class="fullSpecsRowOne">
                        <div class="spec">
                            <h2>Consumption</h2>
                            <div class="row">
                                <p>Consumption</p>
                                <div class="consumption"><p><?php echo $consumption ?></p></div>
                            </div>
                            <div class="row">
                                <p>Combined C02 Emissions</p>
                                <div class="emissions"><p><?php echo $emissions ?></p></div>
                            </div>
                        </div>
                        <div class="spec">
                            <h2>Dimensions</h2>
                            <div class="row">
                                <p>Length</p>
                                <div class="length"><p><?php echo $length ?></p></div>
                            </div>
                            <div class="row">
                                <p>Width</p>
                                <div class="width"><p><?php echo $width ?></p></div> 
                            </div>
                            <div class="row">
                                <p>Height</p>
                                <div class="height"><p><?php echo $height ?></p></div>
                            </div>
                            <div class="row">
                                <p>Fuel Tank Capacity</p>
                                <div class="tankCapacity"><p><?php echo $tankCapacity ?></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="fullSpecsRowTwo">
                        <div class="spec">
                            <h2>Engine</h2>
                            <div class="row">
                                <p>Max. Power</p>
                                <div class="maxPower"><p><?php echo $maxPower ?></p></div>
                            </div>
                            <div class="row">
                                <p>Max. Torque</p>
                                <div class="maxTorque"><p><?php echo $maxTorque ?></p></div>
                            </div>
                            <div class="row">
                                <p>Max. Engine Speed</p>
                                <div class="maxEngineSpeed"><p><?php echo $maxEngineSpeed ?></p></div>
                            </div>
                        </div>
                        <div class="spec">
                            <h2>Performance</h2>
                            <div class="row">
                                <p>Top Speed</p>
                                <div class="topSpeed"><p><?php echo $topSpeed ?></p></div>
                            </div>
                            <div class="row">
                                <p>acceleration</p>
                                <div class="acceleration"><p><?php echo $acceleration ?></p></div>
                            </div>
                            
                            <div class="row">
                                <p>Braking</p>
                                <div class="braking"><p><?php echo $braking ?></p></div>
                            </div>
                        </div>
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