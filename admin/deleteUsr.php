<?php
include '../dbconnection.php';
$user_id = $_GET['id'];

$q = mysqli_query($conn, "DELETE FROM user where user_id='$user_id'");

header('location:manageUsr.php?page=manage_users');
