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
                <li><a href="#Account">Account</a></li>
                <li><a href="signup.php">Login</a></li>
            </ul>
            <div class="Button">
                <button id="book">Book Now</button>
                
            </div>
        </nav>

            <h1 style="margin: auto; text-align: center; padding: 20px;">Contact Us</h1>

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $name = $_POST["name"];
                $email = $_POST["email"];
                $message = $_POST["message"];

                echo "<p>Thank you, $name, for contacting us!</p>";
                echo "<p>Your email: $email</p>";
                echo "<p>Your message: $message</p>";

            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="margin: auto; text-align: center; ">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea><br>

                <button type="submit">Submit</button>
            </form>
        </body>
        </html>
