<?php
session_start(); // Initialize the session

require 'dbconnection.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM `user` WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Index</title>
</head>
<body>
  <h1>Welcome <?php echo $row["first_name"]; ?></h1>
  <a href="logout.php">Logout</a>
</body>
</html>