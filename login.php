<?php
// session_start(); // Initialize the session

require 'dbconnection.php';
session_start();
// if(!empty($_SESSION["id"])){
//   header("Location: homepage.php"); // Redirect to index.php if the user is already logged in
// }

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Remove the 'OR email' part from the query
  $result = mysqli_query($conn, "SELECT * FROM `user` WHERE username = '$username'");

  if (!$result) {
    // Query execution failed, show the error message
    echo "Error: " . mysqli_error($conn);
    exit; // Stop the script execution to prevent further issues
  }

  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {
    //   $_SESSION["id"] = $row["id"];
    session_start();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['username'] = $username;
      header("Location: homepage.php");
      exit; // Add exit here to prevent further execution
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
            margin-bottom: 20px;
        }
        
        .form-container h1 {
            color: #565959;
            margin-top: 0;
        }
        
        .form-container label {
            display: block;
            text-align: left;
            margin-bottom: 1px;
            color: #565959;
        }
        
        .form-container input {
            margin-bottom: 10px;
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
            margin-bottom: 0;
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
