<?php
include '../dbconnection.php';

extract($_POST);

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$username'");
    $row = mysqli_num_rows($result);
    if ($row) {
        session_start();
        $_SESSION['username'] = $username;
        echo "<script>alert('Login Successful');window.location.href='./admindashboard.php';</script>";
    } else {
        echo "<script>alert('Please check your username or password');window.location.href='./login.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>
<body>
  <h2>Admin Login</h2>
  <form class="" action="" method="post" autocomplete="off">
    <label for="username">Username : </label>
    <input type="text" name="username" id="username" required value=""> <br>
    <label for="password">Password : </label>
    <input type="password" name="password" id="password" required value=""> <br>
    <button type="submit" name="submit">Login</button>
  </form>
  <br>
  <a href="registration.php">Registration</a>
</body>
</html>