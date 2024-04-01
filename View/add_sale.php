<?php
include '../Controller/connect.php';

if(isset($_POST["submit"])) {
    $carName = $_POST["car"];
    $price = $_POST["price"];
    $salesPerson = $_POST["salesPerson"];
    $soldTo = $_POST["soldTo"];

    $sql = "INSERT INTO sales (car, price, salesPerson, soldTo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sdss', $carName, $price, $salesPerson, $soldTo);
    $stmt->execute();
    
    header("Location: sales.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Sale</title>
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
    <h1 class="dashboard">Add Sale</h1>
    <div class="form-container">
        <form method="post">
            <label for="car">Car Name:</label><br>
            <input type="text" id="car" name="car" required><br>
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" required><br>
            <label for="salesPerson">Sales Person:</label><br>
            <textarea id="salesPerson" name="salesPerson" required></textarea><br><br>
            <label for="soldTo">Sold To:</label><br>
            <textarea id="soldTo" name="soldTo" required></textarea><br><br>
            <input type="submit" value="Add Sale">
        </form>
        <br>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" >
            Select XML file to upload:
            <br>
            <input type="file" name="fileToUpload" id="fileToUpload" style="padding-left: 80px">
            <br>
            <br>
            <input type="submit" value="Upload" name="upload">
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

<?php
include '../Controller/connect.php'; 

if(isset($_POST["upload"])) {
    $targetDir = "../View/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if($fileType != "xml") {
        echo "Sorry, only XML files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

            insertXMLToDatabase($targetFile, $conn);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function insertXMLToDatabase($xmlFile, $conn) {
    $xml = simplexml_load_file($xmlFile);

    foreach ($xml->car as $car) {
        $carName = $car->name;
        $price = $car->price;
        $salesPerson = $car->salesPerson;
        $soldTo = $car->soldTo;

        $sql = "INSERT INTO sales (car, price, salesPerson, soldTo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $carName, $price, $salesPerson, $soldTo);
        $stmt->execute();
        $stmt->close();
    }
}
?>