<?php
include '../Controller/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO tblaccount (email, password) VALUES (?, ?)";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $hashedPassword);
    $stmt->execute();
    
    header("Location: accounts.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Account</title>
    <link rel="stylesheet" href="../Public/style/dash.css">
</head>
<body>
    <header>
        <!-- Your header content -->
    </header>

    <h1 class="dashboard">Add Car</h1>
    <div class="form-container">
        <form method="post">
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
            <input type="text" id="password" name="password" required><br>
            <input type="submit" value="Add Account">
        </form>
    </div>

    <footer>
        <!-- Your footer content -->
    </footer>
</body>
</html>
