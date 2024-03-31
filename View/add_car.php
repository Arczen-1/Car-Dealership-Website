<?php
include '../Controller/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $carName = $_POST["carName"];
    $carPrice = $_POST["carPrice"];
    $carDescription = $_POST["carDescription"];

    $sql = "INSERT INTO cars (carName, carPrice, carDescription) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sds', $carName, $carPrice, $carDescription);
    $stmt->execute();
    
    header("Location: inventory.php");
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
            <label for="carName">Car Name:</label><br>
            <input type="text" id="carName" name="carName" required><br>
            <label for="carPrice">Price:</label><br>
            <input type="number" id="carPrice" name="carPrice" required><br>
            <label for="carDescription">Description:</label><br>
            <textarea id="carDescription" name="carDescription" required></textarea><br><br>
            <input type="submit" value="Add Car">
        </form>
    </div>

    <footer>
        <!-- Your footer content -->
    </footer>
</body>
</html>
