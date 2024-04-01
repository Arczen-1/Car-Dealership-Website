<?php
include '../Controller/connect.php';

$query = "SELECT COUNT(*) AS total FROM cars";
$query_acc = "SELECT COUNT(*) AS total_accs FROM tblaccount";
$query_sales = "SELECT COUNT(*) AS total_sales FROM sales";
$query_contacts = "SELECT COUNT(*) AS total_contacts FROM inquiries";

$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query_acc);
$result3 = mysqli_query($conn, $query_sales);
$result4 = mysqli_query($conn, $query_contacts);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $row_1 = mysqli_fetch_assoc($result2);
    $row_2 = mysqli_fetch_assoc($result3);
    $row_3 = mysqli_fetch_assoc($result4);
    $total = $row['total'];
    $total_accs = $row_1['total_accs'];
    $total_sales = $row_2['total_sales'];
    $total_contacts = $row_3['total_contacts'];
} else {

    $total = "Error: " . mysqli_error($conn);
    $total_accs = "Error: " . mysqli_error($conn);
    $total_sales = "Error: " . mysqli_error($conn);
    $total_contacts = "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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
        <h1 class="dashboard"> Dashboard </h1>
        <div class="control">
          <button onclick="location.href='inventory.php'"> INVENTORY 
            <div> <?php echo 'Total: ' .$total; ?> </div>
          </button>
          <button onclick="location.href='accounts.php'"> USERS 
          <div> <?php echo 'Total: ' .$total_accs; ?> </div>
          </button>
          <button onclick="location.href='sales.php'"> SALES 
          <div> <?php echo 'Total: ' .$total_sales; ?> </div>
          </button>
          <button onclick="location.href='reservations.php'"> RESERVATIONS 
          <div>  <?php echo 'Total: ' .$total_contacts; ?></div>
          </button>
          <button onclick="location.href='contacts.php'"> INQUIRIES 
          <div> <?php echo 'Total: ' .$total_contacts; ?> </div>
          </button>
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
        