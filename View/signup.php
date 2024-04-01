<?php
include '../Controller/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="../Public/img/Logo.webp">
<link rel="stylesheet" href="../Public/style/login.css">
<title>Signup</title>
</head>
<body>
<div class="container">
    <div class="left-section">
        
    </div>
    <div class="right-section">
        <div class="logo">
            <img src="../Public/img/Logo.webp" alt="Car Dealership Logo">
        </div>
        <h1> Signup to get started </h1>
        <form method="post">
            <span>Email</span>
            <input type="email" name="email" placeholder="Email" required>
            <span>Password</span>
            <input type="password" name="password" placeholder="Password" required>
            <div>
                <input type="checkbox" name="agree" id="terms">
                <label for="terms">I agree with terms & conditions</label>
            </div>
            <button type="submit" name="submit">Sign In</button>
            <button type="register" name="register">Register</button>
        </form>
    </div>
</div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $agree_terms = isset($_POST['agree']) ? $_POST['agree'] : '';

    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $agree_terms = htmlspecialchars($agree_terms);

    if (empty($agree_terms)) {
        echo '<script> alert("Please agree to the terms & conditions."); </script>';
    } else {
        if (empty($email) || empty($password)) {
            echo '<script> alert("Please provide both email and password."); </script>';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<script> alert("Invalid email format."); </script>';
            } else {
                $sql = "SELECT * FROM `tblaccount` WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($password, $row['password'])) {
                        session_start();
                        $_SESSION['email'] = $email;
                        $_SESSION['role'] = $row['role'];
                        echo '<script> alert("Login successful. Welcome, ' . $email . '!"); </script>';
                        header("Location: index.php");
                        exit();
                    } else {
                        echo '<script> alert("Invalid password."); </script>';
                    }
                } else {
                    echo '<script> alert("User not found."); </script>';
                }
            }
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $agree_terms = isset($_POST['agree']) ? $_POST['agree'] : '';

    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $agree_terms = htmlspecialchars($agree_terms);

    if (empty($agree_terms)) {
        echo '<script> alert("Please agree to the terms & conditions."); </script>';
    } else {
        if (empty($email) || empty($password)) {
            echo '<script> alert("Please provide both email and password."); </script>';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<script> alert("Invalid email format."); </script>';
            } else {
                $sql_check_email = "SELECT * FROM `tblaccount` WHERE email = '$email'";
                $result_check_email = mysqli_query($conn, $sql_check_email);

                if ($result_check_email && mysqli_num_rows($result_check_email) > 0) {
                    echo '<script> alert("Email already exists. Please choose a different email."); </script>';
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql_insert_user = "INSERT INTO `tblaccount` (email, password) VALUES ('$email', '$hashed_password')";
                    $result_insert_user = mysqli_query($conn, $sql_insert_user);

                    if ($result_insert_user) {
                        echo '<script> alert("Registration successful. Please log in."); </script>';
                    } else {
                        echo '<script> alert("Registration failed. Please try again later."); </script>';
                    }
                }
            }
        }
    }
}
?>