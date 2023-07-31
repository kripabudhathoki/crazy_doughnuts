<?php
session_start();
include ('dbconnection.php');

Print_r($_POST);


if(isset($_POST['register'])){

$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$contact_number = $_POST['contact_number'];
$address = $_POST['address'];


if($password == $password2){
    $password = md5($password);
}

$sql = "INSERT INTO users (`first_name`,`last_name`,`username`,`password`,`contact_number`,`address`, role_id)
        VALUES('$first_name','$last_name','$username','$password','$contact_number','$address',2)";


 $result = mysqli_query($conn,$sql);

 if($result){
    $_SESSION['message']="Registration Successfull !!!";
    $_SESSION['type'] = "success";
    header("Location: index.php");

 }

 else {
    $_SESSION['message']="Registration Failed !!!";
    $_SESSION['type'] = "fail";
    header("Location: index.php");
 }
   



if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql="SELECT * FROM user WHERE username='$username'";
    
    $result = mysqli_query($conn,$sql);

    if(!$result){
        die("Error". mysqli_error());
    }
    $row = $result -> fetch_assoc();


    if ($row['password'] == md5($password)) {
        $_SESSION['username'] = $row['username'];
    
        $role_id = $row['role_id']; 
        $sql_role = "SELECT * FROM `role` WHERE `role_id` = $role_id"; 
    
    
        $result_role = mysqli_query($conn, $sql_role);
        $row_role = $result_role->fetch_assoc();
    
        $_SESSION['role'] = $row_role['role_name'];
    
        if ($row_role['role_name'] == "Admin") {
            header("Location: adminDashboard.php");
        } elseif ($row_role['role_name'] == "User") {
            header("Location: Dashboard.php");
        }
    }
}

}


?>