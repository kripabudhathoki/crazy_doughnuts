<?php
include '../dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chief Dashboard</title>
    <style>    
.chief {
  background-color: pink;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}  
.chief {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  vertical-align: middle;
  border: 1px solid transparent;
  padding: 10px 8px;
  font-size: 25px;
  line-height: 1.5;
  border-radius: 5px;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
    </style>
</head>
<body>
    <h1 > Chef Dashboard </h1>
    <div class =" container  my-5">
        <div>
            <button class ="chief"><a href="vieworder.php" >View Order</button>
            <button class ="chief"><a href="chieflogout.php" >Logout</button>
            
</body>
</html>
