<?php
include '../dbconnection.php';
session_start();
extract($_POST);

if (isset($login)) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $que = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    $row = mysqli_num_rows($que);
    if ($row) {
        $_SESSION['admin'] = $user;
        echo "<script>alert('Admin Login Successful');window.location.href='./dashboard.php';</script>";
    } else {
        $err = "<center><font style='Loco' color='red'>Invalid Username and Password!!</font></center>";
    }
}
?>

<html lang="en">

<head>
    <title>Crazy Doughnuts | Admin Login</title>
   
    <link rel="icon" type="image/x-icon" href="images/webw.png" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script type="text/javascript" src="js/login.js"></script>

<body class="bg-dark font">

    <section class="mt-5">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-5 d-flex justify-content-center m-auto">
                    <div class="d-flex justify-content-center mb-1 mt-5 wid text-white" style="border-radius: 25px;">
                        <h3><a href="#" class="nav-link text-white">
                                <span class="hov">Admin Login</span>
                            </a></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-5 d-flex justify-content-center m-auto">
                    <div class="card mb-5 p-4 py-0 text-black w-75 border" style="border-radius: 25px;">
                        <div class="border-2 card-body px-0 py-0 rounded-2">
                            <img src="../img/cdlogo.png" width="20%" height="300px" alt="Crazy Doughnuts" class="center mt-3 ">
                            <h4 class="text-dark d-flex justify-content-center mt-2 mb-2 font">Admin</h4>
                            <form method="POST" class="mt-2">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="username" class="mb-1"><b>Username</label>
                                        <span class="text-danger">*</span></b> <input class="form-control mb-2 border-secondary" name="user" type="text" required placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="mt-3">
                                            <b>Password: <span class="text-danger">*</span></b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control border-secondary mb-4" name="pass" id="password" placeholder="Password" onfocus="toggleVisibility()" aria-label=" Recipient's username" aria-describedby="button-addon2">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex form-group justify-content-center mb-1">
                                        <input name="login" type="submit" value="Login" class="d-flex justify-content-between btn btn-dark text-white btn-block">
                                    </div>
                                    <?php echo @$err; ?>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>