<?php
include '../dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDashboard</title>
    <style>    
.custom-btn {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}  
.btn {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
    </style>
</head>
<body>
    <h1 > AdminDashboard </h1>
    <div class =" container  my-5">
        <div   >
            <button class =" btn btn-primary custom-btn"><a href="display.php" >Manage user</button>
            <button class =" btn btn-primary custom-btn"><a href="manageorder.php" >Manage Order</button>
            <button class =" btn btn-primary custom-btn"><a href="logout.php" >Logout</button>
</body>
</html>
