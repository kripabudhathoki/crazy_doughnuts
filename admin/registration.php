<?php
require '../dbconnection.php';
session_start(); 

if (!empty($_SESSION["id"])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

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
      $sql = "INSERT INTO user (`username`, `password`,role_id)
      VALUES(?, ?, 1)";


      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "ss", $username, $password);

      if (mysqli_stmt_execute($stmt)) {
        
        header('location:display.php');
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
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      background-image: url("img/photo.jpg");
    }

    .form-container {
      text-align: center;
      animation: slide-up 0.5s ease;
      background-color: transparent;
      backdrop-filter: blur(1.5px);
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    .form-container h1 {
      color: #565959;
    }

    .form-container label {
      display: block;
      text-align: left;
      margin-bottom: 3px; 
       margin-top: 0;
      font-weight: bold;
      color: #565959;
    }

    .form-container input {
      margin-bottom: 7px;      
     padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 100%;
      transition: border-color 0.3s ease;
    }

    .form-container input:focus {
      outline: none;
      border-color: dodgerblue;
    }

    .form-container button {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      background-color: #f75b26;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
    }

    .form-container button:hover {
      background-color: #565959;
    }

    .form-container p {
      margin-top: 10px;
      text-align: center;
      color: #565959;
    }

    @keyframes slide-up {
      0% {
        transform: translateY(50px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>
<form action="" method="post" autocomplete="off">
<div class="form-container">
    <div id="registration-form" padding:5px;>
  <h2>Registration</h2>
 
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
  </div>
  </form>
  <br>
  <a href="login.php">Login</a>
</body>
</html>