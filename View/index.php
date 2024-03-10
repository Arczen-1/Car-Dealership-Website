
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
            <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('book').addEventListener('click', function() {
            window.location.href = 'checkout.php';
        });
    });
</script>
        </nav>
        <div class="header-content">

            <form class="searchbar" action="searchresult.php" method="post">
                <div class="ser">
                    <div class="input-group">
                        <span class="input-title" id="brand">Car, Model, or Brand</span>
                        <input class="search-input" id="brand" name="brand" placeholder="Type the brand here..."> </input>
                    </div>
                    <div class="input-group">
                        <span class="input-title">Monthly Payment</span>
                        <input class="search-input" id="price" placeholder="Add an amount here..."> </input>
                    </div>
                    <div class="input-group">
                        <span class="input-title">Color</span>
                        <input class="search-input" id="color" placeholder="Type the color here..."> </input>
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
                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;">PHP 200,000/month</strong>
                <button style="height: 30px; width: 75px;"><a href="carView.php">More</a></button>
            </div>
            <div class="catalog" style="height: 500px; width: 400px; margin: auto; margin-right: 25px; display: flex; align-items: center; flex-direction: column; padding: 10px;">
                <img src="../Public/img/car1.png" style="display: flex; justify-content: center;">
                <strong style="font-size: 24px; font-weight: 700;">Rolls Royce</strong>
                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;">PHP 200,000/month</strong>
                <button style="height: 30px; width: 75px;"><a href="carView.php">More</a></button>
            </div>
            <div class="catalog" style="height: 500px; width: 400px; margin: auto; margin-right: 25px; display: flex; align-items: center; flex-direction: column; padding: 10px;">
                <img src="../Public/img/car2.png" style="display: flex; justify-content: center;">
                <strong style="font-size: 24px; font-weight: 700;">Rolls Royce</strong>
                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;">PHP 200,000/month</strong>
                <button style="height: 30px; width: 75px;"><a href="carView.php">More</a></button>
            </div>
            <div class="catalog" style="height: 500px; width: 400px; margin: auto; margin-right: 25px; display: flex; align-items: center; flex-direction: column; padding: 10px;">
                <img src="../Public/img/car4.jpeg" style="display: flex; justify-content: center;">
                <strong style="font-size: 24px; font-weight: 700;">Rolls Royce</strong>
                <strong style="font-size: 16px; font-weight: 700; padding-bottom: 20px;">PHP 200,000/month</strong>
                <button style="height: 30px; width: 75px;"><a href="carView.php">More</a></button>
            </div>
            
        </div>
    </div>

</body>
</html>
