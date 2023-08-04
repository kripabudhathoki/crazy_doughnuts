<?php
require '../dbconnection.php';
session_start(); 

if (!empty($_SESSION["id"])) {
  header("Location: chiefdashboard.php");
  exit;
}

if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $duplicate = mysqli_query($conn, "SELECT * FROM chief WHERE username = '$username'");

  if (!$duplicate) {
    
    echo "Error: " . mysqli_error($conn);
    exit; 
  }

  if (mysqli_num_rows($duplicate) > 0) {
    echo "<script>alert('Username Has Already Taken');</script>";
  } else {
    if ($password == $password2) {
      
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $password = md5($password);
      $sql = "INSERT INTO chief (`username`, `password`)
      VALUES(?, ?)";


      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "ss", $username, $password);

      if (mysqli_stmt_execute($stmt)) {
        
        header('location:chiefdashboard.php');
      } else {
        echo "Error: " . mysqli_error($conn);
      }

      mysqli_stmt_close($stmt); 
    } else {
      echo "<script>alert('Password Does Not Match');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Registration</title>
</head>
<body>
  <h2>Registration</h2>
  <form action="" method="post" autocomplete="off">
  <div class =" container my_5">
    <div>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required value=""><br><br>
</div>

    <div>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" required value=""><br><br>
    </div>

    <div>
      <label for="password2">Confirm Password: </label>
      <input type="password" name="password2" id="password2" required value=""><br><br>
    </div>
    

   
      <button type="submit" name="submit">Register</button>

    </div>
  </form>
  <br>
  <a href="chieflogin.php">Login</a>
</body>
</html>