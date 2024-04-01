<?php
include '../Controller/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Dealership</title>
    <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
    <link rel="stylesheet" href="../Public/style/acc.css">
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
                <li><a href="#Account">Account</a></li>
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
            <div class="Button">
                <button id="book">Book Now</button>
                
            </div>
        </nav>
    </header>

    <div class="spacer v40"></div>
    <div class="wrap">
        <h1 class="account" >Account Settings</h1>
        
        <div class="rows">
            <div class="accountInfo">
                <div class="text">
                    <h1>Profile</h1>
                    <h2>email: <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></h2>
                </div>
            </div>
            <div class="changeInfo">
                <div class="contents">
                    <h2>Change Account Information</h2>
                    <form class="formacc" method="post">
                        <div class="row">
                        <label for="new_email">New Email:</label>
                        <input type="email" id="new_email" name="new_email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>

                        <br>
                        <br>
                        <label id="pass" for="new_password">New Password:</label>
                        <input type="password" id="new_password" name="new_password" required>
                        <br>
                        </div>
                        <button id="save" type="submit" name="update">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="spacer v40"></div>
        <div class="billing-address">
            <?php 
                $userEmail = $_SESSION['email'];

                $checkIfExists = "SELECT * FROM appointments WHERE email = '$userEmail'";
                $result = mysqli_query($conn, $checkIfExists);

                if(mysqli_num_rows($result) == 0) {
                    echo "<h2>No Appointments</h2>";
                } else {
                    echo "<h2>Appointments</h2>";
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Appointment ID</th>";
                    echo "<th>Date</th>";
                    echo "<th>Time</th>";
                    echo "<th>Actions</th>"; 
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    while($appointmentsResult = mysqli_fetch_assoc($result)) {
                        $id = $appointmentsResult['id'];
                        $date = $appointmentsResult['date'];
                        $time = $appointmentsResult['time'];
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$date</td>";
                        echo "<td>$time</td>";
                        echo "<td>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='appointment_id' value='$id'>";
                        echo "<button id='submits' type='submit' name='delete' value='Delete'>Delete</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                }

                if(isset($_POST['delete'])) {
                    $appointmentId = $_POST['appointment_id'];

                    $deleteQuery = "DELETE FROM appointments WHERE id = '$appointmentId'";
                    $deleteResult = mysqli_query($conn, $deleteQuery);
                    if($deleteResult) {
                        echo "<script>alert('Appointment deleted successfully.');</script>";
                    } else {
                        echo "<script>alert('Failed to delete appointment.');</script>";
                    }
                }
            ?>
        </div>
    </div>
</body>

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
    </div>
</footer>

<?php

if (!isset($_SESSION['email'])) {
    header("Location: signup.php");
    exit(); 
}

$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $new_email = $_POST['new_email'];
    $new_password = $_POST['new_password'];

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE `tblaccount` SET email = '$new_email', password = '$hashed_password' WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Account updated successfully.");</script>';
    } else {
        echo '<script>alert("Failed to update account. Please try again.");</script>';
    }
}
?>