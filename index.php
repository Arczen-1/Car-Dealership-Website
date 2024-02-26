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
                <li><a href="#Login">Login</a></li>
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

    <div class="car-container">
        <div class="cars">
        </div>
    </div>

</body>
</html>
