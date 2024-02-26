<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Dealership</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="Logo.webp" alt="Car Dealership Logo">
            </div>
            <ul class="nav-links">
                <li><a href="#Home">Home</a></li>
                <li><a href="#models">Models</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#Account">Account</a></li>
                <li><a href="signup.php">Login</a></li>
            </ul>
            <div class="Button">
                <button id="book">Book Now</button>
                
            </div>
        </nav>
        <div class="header-content">

            <form class="searchbar">
                <div class="ser">
                    <div class="input-group">
                        <span class="input-title">Car, Model, or Brand</span>
                        <input class="search-input" id="brand" placeholder="Type the brand here..."> </input>
                    </div>
                    <div class="input-group">
                        <span class="input-title">Monthly Payment</span>
                        <input class="search-input" id="price" placeholder="Add an amount here..."> </input>
                    </div>
                    <div class="input-group">
                        <span class="input-title">Color</span>
                        <input class="search-input" id="color" placeholder="Type the color here..."> </input>
                    </div>
                    <button id="search"> Search </button>
                </div>
            </form>
        </div>
    </header>

    <div>

    </div>

    <div class="car-container" style="margin: auto">
        <div class="cars" style="margin: auto">
            <img src="car1.png">
            <img src="car2.png"style="height: 95px">
            <img src="car3.jpg"style="height: 150px">
            <img src="car4.jpeg">
            <img src="car5.png" >
        </div>
    </div>

</body>
</html>
