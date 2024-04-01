<?php
include '../Controller/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $car = $result->fetch_assoc();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $date = $_POST["date"];
            $time = $_POST["time"];
            $email = $_POST["email"];
            $title = $_POST["title"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];

            $sql = "UPDATE appointments SET date = ?, time = ?,email = ?, title = ?, firstName = ?, lastName = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ddsssi', $date, $time, $email, $title, $firstName, $lastName, $id);
            $stmt->execute();

            header("Location: reservations.php");
            exit();
        }
    } else {
        echo "No appointments found.";
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
    <h1>Update Records</h1>
    <br>
    <form method="post">
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" value="<?php echo $car['date']; ?>"><br>
        <label for="time">Time:</label><br>
        <input type="text" id="time" name="time" value="<?php echo $car['time']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $car['email']; ?>"><br>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $car['title']; ?>"><br>
        <label for="firstName">First Name:</label><br>
        <input type="text" id="firstName" name="firstName" value="<?php echo $car['firstName']; ?>"><br>
        <label for="lastName">Last Name:</label><br>
        <textarea id="lastName" name="lastName"><?php echo $car['lastName']; ?></textarea><br><br>
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