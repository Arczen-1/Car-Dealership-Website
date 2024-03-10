<html>
    <head>
        <meta charset="utf-8" />
        <title>Car</title>
        <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
        <link href="../Public/style/carView.css" rel="stylesheet" />
        <link href="../Public/style/checkout.css" rel="stylesheet" />
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
                <li><a href="signup.php">Login</a></li>

            </ul>
            <div class="Button">
                <button id="book">Book Now</button>
            </div>
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
                <td>Lamborghini Urus<br>
                <td>$240,000</td>
                <td>TAX: $100</td>
                <td>$240,100</td>
            </tr>
            <tr class="total-row">
                <td colspan="5">Total:</td>
                <td>$240,100</td>
            </tr>
        </table>
    </div>
            
            <div class="billing-address">
        <h2>Billing Address</h2>
        <form>
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
            
</body>
</html>

