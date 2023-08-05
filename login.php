<?php
session_start(); // Initialize the session

require 'dbconnection.php';
if (!empty($_SESSION["user_id"])) {
    header("Location: homepage.php");
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM `user` WHERE username = '$username'");

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $role_id = $row['role_id'];

        if ($role_id == '1') {
            // Admin login
            if (md5($password) == $row['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['role_id'] = '1';
                header('location: admin/admindashboard.php');
                exit;
            } else {
                echo "<script>alert('Wrong Password');</script>";
            }
        } elseif ($role_id == '2') {
            // User login
            if (md5($password) == $row['password']) {
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['username'] = $username;
                $_SESSION['role_id'] = '2';
                header('location: homepage.php');
                exit;
            } else {
                echo "<script>alert('Wrong Password');</script>";
            }
        } elseif ($role_id == '3') {
            // Chef login
            if (md5($password) == $row['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['role_id'] = '3';
                header('location: chief/chiefdashboard.php');
                exit;
            } else {
                echo "<script>alert('Wrong Password');</script>";
            }
        }
    } else {
        echo "<script>alert('User Not Registered');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="login.css"/>
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username">
            <label for="password">Password</label>
            <input type="password" name="password">
            <button type="submit" name="submit">Login</button>
        </form>
        <p>Don't have an Account? <a href="registration.php">Register Now</a></p>
    </div>
    
    
</body>
</html>
