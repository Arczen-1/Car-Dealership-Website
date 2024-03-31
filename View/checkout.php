<html>
    <head>
        <meta charset="utf-8" />
        <title>Car</title>
        <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
        <link href="../Public/style/carView.css" rel="stylesheet" />
        <link href="../Public/style/checkout.css" rel="stylesheet" />
    </head>
    

    <body>
        <?php
        $conn = mysqli_connect("localhost", "root", "") or die ("Unable to connect". mysqli_error());
        mysqli_select_db($conn, "dbcardealership");

        $carQuery = mysqli_query($conn, "SELECT * FROM cars WHERE id = '1'"); //must change id
        while($carResult = mysqli_fetch_assoc($carQuery)){
            $carName = $carResult['carName'];
            $carPrice = $carResult['carPrice'];
        }

        $total = preg_replace("/[^0-9]/", '', $carPrice); 
        $total+=100;
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
                <li><a href="signup.php">Login</a></li>
            </ul>
        </nav>


        <div class="checkout-summary">
            <table>
                <tr>
                    <th>CAR</th>
                    <th>PRICE</th>
                    <th>TAX</th>
                    <th>SUBTOTAL</th>
                </tr>
                <tr>
                    <td><?php echo $carName ?><br>
                    <td><?php echo $carPrice ?></td>
                    <td>TAX: $100</td>
                    <td>$<?php echo number_format($total) ?></td>
                </tr>
                <tr class="total-row">
                    <td>Total:</td>
                    <td></td>
                    <td></td>
                    <td>$<?php echo number_format($total) ?></td>
                </tr>
            </table>
        </div>
            
        <div class="billing-address">
        <h2>Set Appointment</h2>
        <form>
            <div class="date" >
                <label for="selectedDate">Appointment Date: </label>
                <input type="date" id="reservation" name="selectedDate" >
                <label for="selectedTime">Time: </label>
                <select name="time" id="time" onchange="fetchReservedSeats()">
                <option value="7:00" >7:00</option>
                <option value="7:30">7:30</option>
                <option value="8:00">8:00</option>
                <option value="8:30" >8:30</option>
                <option value="9:00">9:00</option>
                <option value="9:30">9:30</option>
                <option value="10:00" >10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30" >11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="1:00">1:00</option>
                <option value="1:30" >1:30</option>
                <option value="2:00">2:00</option>
                <option value="2:30">2:30</option>
                <option value="3:00">3:00</option>
                <option value="3:30" >3:30</option>
                <option value="4:00">4:00</option>
                <option value="4:30">4:30</option>
                <option value="5:00">5:00</option>
                </select>
            </div>
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter your email" required>

            <label for="confirm_email">Re-enter Email</label>
            <input type="email" id="confirm_email" placeholder="Confirm your email" required>

            <label for="title">Title/Salutation</label>
            <input type="text" id="title" placeholder="Optional">

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" placeholder="Enter your first name" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" placeholder="Enter your last name" required>

            <input type="submit" value="Submit" class="submit-button">
        </form>
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

