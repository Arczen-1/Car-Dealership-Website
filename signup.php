<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="login.css">
<title>Signup</title>
</head>
<body>
<div class="container">
    <div class="left-section">
        
    </div>
    <div class="right-section">
        <div class="logo">
            <img src="Logo.webp" alt="Car Dealership Logo">
        </div>
        <h1> Signup to get started </h1>
        <form action="login.php" method="post">
            <span>Email</span>
            <input type="email" name="email" placeholder="Email" required>
            <span>Password</span>
            <input type="password" name="password" placeholder="Password" required>
            <div>
                <input type="checkbox" id="terms">
                <label for="terms">I agree with terms & conditions</label>
            </div>
            <button type="submit">Sign In</button>
        </form>
        <div class="divider">Or</div>
        <div class="social-login">

            <button>Sign up with Google</button>
            <button>Sign up with Facebook</button>
            <button>Sign up with Twitter</button>
        </div>
    </div>
</div>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($email === "user@example.com" && $password === "password123") {

        echo "Login successful. Welcome, " . htmlspecialchars($email) . "!";
    } else {

        echo "Login failed: Invalid email or password.";
    }
}
?>
