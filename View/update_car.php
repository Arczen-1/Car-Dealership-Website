<?php
include '../Controller/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM cars WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $car = $result->fetch_assoc();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $carName = $_POST["carName"];
            $carPrice = $_POST["carPrice"];
            $carDescription = $_POST["carDescription"];

            $sql = "UPDATE cars SET carName = ?, carPrice = ?, carDescription = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sdsi', $carName, $carPrice, $carDescription, $id);
            $stmt->execute();

            header("Location: inventory.php");
            exit();
        }
    } else {
        echo "Car not found.";
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
    <title>Update Car Details</title>
</head>
<body>
    <h2>Update Car Details</h2>
    <form method="post">
        <label for="carName">Car Name:</label><br>
        <input type="text" id="carName" name="carName" value="<?php echo $car['carName']; ?>"><br>
        <label for="carPrice">Price:</label><br>
        <input type="text" id="carPrice" name="carPrice" value="<?php echo $car['carPrice']; ?>"><br>
        <label for="carDescription">Description:</label><br>
        <textarea id="carDescription" name="carDescription"><?php echo $car['carDescription']; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>