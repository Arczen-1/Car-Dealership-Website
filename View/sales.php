<?php
include '../Controller/connect.php';

if(isset($_POST["generate_xml"])) {
    $sql = "SELECT * FROM sales";
    $result = $conn->query($sql);

    $xml = new SimpleXMLElement('<cars></cars>');

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $car = $xml->addChild('car');
            $car->addChild('name', $row["car"]);
            $car->addChild('price', $row["price"]);
            $car->addChild('salesPerson', $row["salesPerson"]);
            $car->addChild('soldTo', $row["soldTo"]);
        }
    }

    header('Content-Type: application/xml');
    header('Content-Disposition: attachment; filename="sales_data.xml"');

    echo $xml->asXML();
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory</title>
    <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
    <link rel="stylesheet" href="../Public/style/dash.css">
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
            <h1> Admin Dashboard </h1>
        </nav>
    </header>
        <h1 class="dashboard"> Sales </h1>
        <div class="table">
    <table>
        <tr>
            <th>Car Name</th>
            <th>Price</th>
            <th>Sales Person</th>
            <th>Sold To</th>
            <th>Actions</th>
        </tr>
        <?php

        $sql = "SELECT * FROM sales";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["car"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["salesPerson"] . "</td>";
                echo "<td>" . $row["soldTo"] . "</td>";
                echo "<td>";
                echo "<a href='update_sale.php?id=" . $row["id"] . "'>Update</a> | ";
                echo "<a href='delete_sale.php?id=" . $row["id"] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No sales found.</td></tr>";
        }
        ?>
    </table>
    <br>
    <div class="last-buttons">
        <div class="add-butt">
        <a href="add_sale.php" class="add-button">Add Sales</a>
        </div>
        <br>
        <div class="gen-butt">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <button type="submit" name="generate_xml">XML</button>
        </form>
        </div>
    </div>


</div>
<div class="spacer v250">
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
  
