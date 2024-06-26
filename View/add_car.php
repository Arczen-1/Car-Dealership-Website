<?php
include '../Controller/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carName = $_POST["carName"];
    $carPrice = $_POST["carPrice"];
    $carDescription = $_POST["carDescription"];

    // File upload handling
    $targetDirectory = "../Public/img/";
    $fileName = basename($_FILES["carImage"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (in_array($fileType, $allowedFormats)) {
        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["carImage"]["tmp_name"], $targetFilePath)) {
            // Construct the image file path relative to the web root
            $imagePath = "../Public/img/" . $fileName;

            // Insert car details into the database
            $sql = "INSERT INTO cars (carName, carPrice, carDescription, img) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sdss', $carName, $carPrice, $carDescription, $imagePath);
            $stmt->execute();
            
            header("Location: inventory.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Car</title>
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
    <h1 class="dashboard">Add Car</h1>
    <div class="form-container">
        <form method="post" enctype="multipart/form-data">
            <label for="carName">Car Name:</label><br>
            <input type="text" id="carName" name="carName" required><br>
            <label for="carPrice">Price:</label><br>
            <input type="number" id="carPrice" name="carPrice" required><br>
            <label for="carDescription">Description:</label><br>
            <textarea id="carDescription" name="carDescription" required></textarea><br><br>
            <label for="carImage">Car Image:</label><br>
            <input type="file" id="carImage" name="carImage" accept="image/*" required><br><br>
            <input type="submit" value="Add Car">
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