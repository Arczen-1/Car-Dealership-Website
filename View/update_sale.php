<?php
include '../Controller/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM sales WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $car = $result->fetch_assoc();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $car = $_POST["car"];
            $price = $_POST["price"];
            $salesPerson = $_POST["salesPerson"];
            $soldTo = $_POST["soldTo"];

            $sql = "UPDATE sales SET car = ?, price = ?, salesPerson = ?, soldTo = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sdssi', $car, $price, $salesPerson, $soldTo, $id);
            $stmt->execute();

            header("Location: sales.php");
            exit();
        }
    } else {
        echo "Sale not found.";
    }
} else {
    echo "ID not provided.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Sales</title>
    <link rel="stylesheet" href="../Public/style/admin_control.css">
</head>
<body style="margin: auto; text-align: center">
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
    <br>
    <br>
    <h1>Update Sales</h1>
    <br>
    <form method="post">
        <label for="car">Car:</label><br>
        <input type="text" id="car" name="car" value="<?php echo $car['car']; ?>"><br>
        <label for="price">Email:</label><br>
        <input type="number" id="price" name="price" value="<?php echo $car['price']; ?>"><br>
        <label for="salesPerson">Sales Person:</label><br>
        <textarea id="salesPerson" name="salesPerson"><?php echo $car['salesPerson']; ?></textarea><br><br>
        <label for="soldTo">Sold To:</label><br>
        <textarea id="soldTo" name="soldTo"><?php echo $car['soldTo']; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>
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