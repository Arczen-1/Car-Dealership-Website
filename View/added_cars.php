<?php
include '../Controller/connect.php';

// Fetch car data from the database
$sql = "SELECT * FROM cars"; // Adjust table name if necessary
$result = mysqli_query($conn, $sql);
$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Models</title>
    <link rel="icon" type="image/png" href="../Public/img/Logo.webp">
    <link href="../Public/style/models.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar">
    <!-- Navbar content -->
</nav>
<nav class="navbar">
    <!-- Other navigation content -->
</nav>
<div class="spacer v40"></div>
<div class="wrap">
    <div class="modelsContainer">
        <div class="Models">
            <?php foreach ($cars as $car): ?>
                <div class="imgAndCarName">
                    <a href="carView.php?id=<?php echo $car['id']; ?>">
                    <img src="<?php echo $car['img']; ?>" alt="<?php echo $car['carName']; ?>">
                    </a>
                    <p><?php echo $car['carName']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="spacer v80"></div>
<footer>
    <!-- Footer content -->
</footer>
</body>
</html>
