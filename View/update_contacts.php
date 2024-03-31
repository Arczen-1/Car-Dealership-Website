<?php
include '../Controller/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM inquiries WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $car = $result->fetch_assoc();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            $sql = "UPDATE inquiries SET name = ?, email = ?, message = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssi', $name, $email, $message, $id);
            $stmt->execute();

            header("Location: contacts.php");
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
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $car['name']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $car['email']; ?>"><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message"><?php echo $car['message']; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>