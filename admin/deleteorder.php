<?php
include '../dbconnection.php';
$order_id = $_GET['id'];

$q = mysqli_query($conn, "DELETE FROM orders where order_id='$order_id'");

header('location:manageorder.php?page=manage_orders');
