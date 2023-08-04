<?php
session_start(); // Initialize the session

require 'dbconnection.php';
if(!empty($_SESSION["user_id"])){
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
    if (md5($password) == $row['password']) {
      $_SESSION["user_id"] = $row["user_id"];
    session_start();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['username'] = $username;
      header("Location: homepage.php");
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
