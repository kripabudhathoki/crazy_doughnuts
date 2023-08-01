<?php
require '../dbconnection.php';
session_start(); // Add this line to start the session
$user_id = $_GET['updateid'];
$sql = "SELECT * FROM `user` WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$username = $row['username'];
$password = $row['password'];
$contact_number = $row['contact_number'];
$address = $row['address'];

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];

    // Updating the data in the database
    $sql = "UPDATE `user` SET username='$username', first_name='$first_name', last_name='$last_name', password='$password', contact_number='$contact_number', address='$address' WHERE user_id='$user_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
       // echo "<div class='success'>Record Updated Successfully!</div>";
        header("Location: display.php");
    
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Registration</title>
</head>
<body>
  <h2>Registration</h2>
  <form action="" method="post" autocomplete="off">
    <div class="container my_5">
      <div>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" placeholder="Enter your username" required value="<?php echo $username; ?>"><br><br>
      </div>

      <div>
        <label for="first_name">First Name: </label>
        <input type="text" name="first_name" id="first_name" placeholder="Enter your firstname" required value="<?php echo $first_name; ?>"><br><br>
      </div>

      <div>
        <label for="last_name">Last Name: </label>
        <input type="text" name="last_name" id="last_name" placeholder="Enter your lastname" required value="<?php echo $last_name; ?>"><br><br>
      </div>

      <div>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required value="<?php echo $password; ?>"><br><br>
      </div>

      <div>
        <label for="password2"> Password2: </label>
        <input type="password" name="password2" id="password2" placeholder="Enter your confirm password" required value="<?php echo $password; ?>"><br><br>
      </div>

      <div>
        <label for="contact_number">Contact Number: </label>
        <input type="text" name="contact_number" id="contact_number" placeholder="Enter your contact number" required value="<?php echo $contact_number; ?>"><br><br>
      </div>

      <div>
        <label for="address">Address: </label>
        <input type="text" name="address" id="address" placeholder="Enter your address" required value="<?php echo $address; ?>"><br><br>
      </div>

      <button type="submit" name="submit">Update</button>
    </div>
  </form>
  <br>
  <a href="login.php">Login</a>
</body>
</html>
