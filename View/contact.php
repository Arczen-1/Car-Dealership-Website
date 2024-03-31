<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Dealership</title>
    <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
    <link rel="stylesheet" href="../Public/style/contact.css">
        
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
            <script>
                document.addEventListener('DOMContentLoaded', (event) => {
                    document.getElementById('book').addEventListener('click', function() {
                        window.location.href = 'checkout.php';
                    });
                });
            </script>
        </nav>
    </header>

    <div class="wrap">
        
        <h1>Contact Us</h1>

        
        <?php

        $conn = mysqli_connect("localhost", "root", "") or die ("Unable to connect". mysqli_error());
        mysqli_select_db($conn, "dbcardealership");
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $inquiryQuery = mysqli_query($conn, "SELECT * FROM inquiries"); 
            while($inquiryResult = mysqli_fetch_assoc($inquiryQuery)){
                $id = $inquiryResult['id'];
            }

            $id++;

            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            $insert = "INSERT INTO inquiries (id, name, email, message) VALUES ('$id', '$name', '$email', '$message')";
            mysqli_query($conn, $insert);

            echo "<div class='box'><p>Thank you, $name, for contacting us!</p></div>";
        }
        ?>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="margin: auto; text-align: center; ">
                <div class="box">
                    
                    <div class=labels><label for="name">Name:</label></div>
                    <input type="text" id="name" name="name" required><br>
                    
                </div>

                <div class="box">
                    <div class="labels"><label for="email">Email:</label></div>
                    <input type="email" id="email" name="email" required><br>
                </div>

            <div class="box">
                <div id="messageBox">
                    <div class="labels"><label for="message">Message:</label></div>
                    <textarea id="message" name="message" rows="4" required></textarea><br>
                </div>
            </div>

            <div id="submit"><button type="submit">Submit</button></div>
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
