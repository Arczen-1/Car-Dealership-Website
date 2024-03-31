<?php
include '../Controller/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $car = $_POST["car"];
    $price = $_POST["price"];
    $salesPerson = $_POST["salesPerson"];
    $soldTo = $_POST["soldTo"];

    $sql = "INSERT INTO sales (car, price, salesPerson, soldTo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sdss', $car, $price, $salesPerson,$soldTo);
    $stmt->execute();
    
    header("Location: sales.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Car</title>
    <link rel="stylesheet" href="../Public/style/dash.css">
</head>
<body>
    <header>
        <!-- Your header content -->
    </header>

    <h1 class="dashboard">Add Car</h1>
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
    </div>

    <footer>
        <!-- Your footer content -->
    </footer>
</body>
</html>
