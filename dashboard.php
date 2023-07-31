<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

Echo "Welcome to DashBoard,".$_SESSION['username'];

?>

<a href="logout.php">Logout</a>