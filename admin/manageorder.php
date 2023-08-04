<?php
session_start();
include '../dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.custom-btn {
  background-color: pink;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;}

  .table {
      border-collapse: block;
      width: 100%;
      max-width: 100%;
      margin-bottom: 80px;
    }
    th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6;
      text-align: left;
      padding: 8px;
    }
    td {
      vertical-align: top;
      border-top: 1px solid #dee2e6;
      text-align: left;
      padding: 10px;
    }
    tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, 0.05);
    }
   
.btn {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  user-select: none;
  border: 1px solid transparent;
  padding: 5px 5px;
  font-size: 20px;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  

}

.btn-danger {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
}
.btn-danger:hover {
  color: #fff;
  background-color: #c82333;
  border-color: #bd2130;
}

    </style>
<body>
    
<h1 > AdminDashboard </h1>
    <div class =" container  my-5">
        <div   >
        <a href="display.php" > <button class =" btn btn-primary custom-btn">Manage user</button></a>
        <a href="manageorder.php" >   <button class =" btn btn-primary custom-btn">Manage Order</button></a>
        <a href="logout.php" >   <button class =" btn btn-primary custom-btn">Logout</button></a>
</body>
                        <table class="table">
            <thead>
                <tr>
                <th scope="col">order_id</th>
                <th scope="col">user_id</th>
                <th scope="col">order_date</th>
                <th scope="col">flavors</th>
                <th scope="col">ingredients</th>
                <th scope="col">notes</th>
                <th scope="col">price</th>
                <th scope="col">Delete</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
  $sql = "SELECT * FROM `orders`";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      // Get the order_id from the row data
      $order_id = $row['order_id'];
      echo "<tr>";
      echo "<td>" . $row['order_id'] . "</td>";
      echo "<td>" . $row['user_id'] . "</td>";
      echo "<td>" . $row['order_date'] . "</td>";
      echo "<td>" . $row['flavors'] . "</td>";
      echo "<td>" . $row['ingredients'] . "</td>";
      echo "<td>" . $row['notes'] . "</td>";
      echo "<td>" . $row['price'] . "</td>";
      echo "<td>";
     
      echo '<button class="btn btn-danger"><a href="deleteorder.php?deleteid=' . $order_id . '">Delete</a></button>';
      ?>
      <td>
    <select name="status" id="status">
      <option value="<?php echo $row['status']?>"><?php echo $row['status']?>Pending</option>
      <option value="cancelled">Cancelled</option>
      <option value="delivered">Delivered</option>


    </select>
    </td>
    </tr>
<?php
    }
  } else {
    echo "Error: " . mysqli_error($conn);
  }
  ?>
 </tbody>
</body>
</html>
