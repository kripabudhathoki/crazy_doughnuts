<?php
require 'dbconnection.php';
session_start(); // Add this line to start the session

if (!empty($_SESSION["id"])) {
  header("Location: index.php");
  exit; // Add exit here to prevent further execution
}

if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $contact_number = $_POST['contact_number'];
  $address = $_POST['address'];

  // Check if the username already exists
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if (!$duplicate) {
    // Query execution failed, show the error message
    echo "Error: " . mysqli_error($conn);
    exit; // Stop the script execution to prevent further issues
  }

  if (mysqli_num_rows($duplicate) > 0) {
    echo "<script>alert('Username or Email Has Already Taken');</script>";
  } else {
    if ($password == $password2) {
      // Use prepared statements to prevent SQL injection
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $password = md5($password);
      $query = "INSERT INTO user (`first_name`, `last_name`, `username`, `password`, `contact_number`, `address`, role_id)
      VALUES(?, ?, ?, ?, ?, ?, 2)";


      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $username, $password, $contact_number, $address);

      if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Registration Successful');</script>";
        header ("Location:homepage.php");
      } else {
        echo "Error: " . mysqli_error($conn);
      }

      mysqli_stmt_close($stmt); // Close the prepared statement
    } else {
      echo "<script>alert('Password Does Not Match');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRAZY DOUGHNUTS</title>
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
    <form action="registration.php" method="POST">
  <div class="form-container">
    <div id="registration-form" padding:5px;>
      <h1>Registration</h1>
      <div>
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="first_name" required>
      </div>
      <div>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="last_name" required>
      </div>
      <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div>
        <label for="password">Confirm Password:</label>
        <input type="password" id="password" name="password2" required>
      </div>
      <div>
        <label for="contact-number">Contact Number:</label>
        <input type="text" id="contact-number" name="contact_number" required>
      </div>
      <div>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
      </div>
      <button type="submit" name="submit">Register</button>
      <p>Already registered? <a href="login.php">Sign in</a></p>
    </div>
  </div>
</form>
</body>

</html>
