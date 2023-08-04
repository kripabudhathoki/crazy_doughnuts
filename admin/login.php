<?php

require '../dbconnection.php';


if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  
  $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$username'");

  if (!$result) {
   
    echo "Error: " . mysqli_error($conn);
    exit; 
  }

  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    if (md5($password) == $row['password']) {
      header("Location: admindashboard.php");
      exit; 
    } else {
      echo "<script>alert('Wrong Password');</script>";
    }
  } else {
    echo "<script>alert('User Not Registered');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../login.css"/>

</head>
<body>
<div class="form-container">
  <h2 style="color:#565959">Admin Login</h2>
  <form class="" action="" method="POST" autocomplete="off">
    <label for="username">Username : </label>
    <input type="text" name="username" id="username" required value=""> <br>
    <label for="password">Password : </label>
    <input type="password" name="password" id="password" required value=""> <br>
    <button type="submit" name="submit">Login</button>
  </form>
  <br>
  <a href="registration.php">Registration</a>
</div>
</body>
</html>