<?php
session_start();
include "dbconnection.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

if($_SESSION['role']!="Admin"){
    header("Location: dashboard.php");
}

Echo "Welcome to Admin DashBoard,".$_SESSION['username'];

?>

<a href="logout.php">Logout</a>

<table style="border: 2px solid black;">
   <tr>
    <th>S.N</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>UserName</th>
    <th>Role</th>
    <th>Action</th>
    <th>Action2</th>
   </tr>

<?php


$sql = "SELECT * FROM users";

$result = mysqli_query($conn,$sql);
$count=1;
if($result){
    while($row = $result->fetch_assoc()){
        echo "
        <tr> 
                <td>{$count}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['username']}</td>
                <td>{$row['role_name']}</td>
                <td>
                <a href='useredit.php'>Edit</a>
                </td>
                <td>
                <a href='userdelete.php'>Delete</a>
                </td>
            </tr>

                ";

    }

    ?>
    </table>

    <?php

}




?>

