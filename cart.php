<?php
include("./dbconnection.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        
    /* Style the table */
    h1{
        text-align:center;
        margin-top:30px;
        margin-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
      text-align: left;
    }

   
    th {
      background-color: #FCAEAE;
      padding: 8px;
      border: 1px solid black;
    }

    td {
      padding: 8px;
      border: 1px solid black;
    }

   
    tr:nth-child(even) {
      background-color: #DBC4F0;
    }

   
   
    tr:nth-child(odd) {
      background-color: whitesmoke;
    }
   
    tr:hover {
      background-color: #FBA1B7;
    }

    

    </style>
</head>

<body class="">
    <?php
    include("./headernav.php");
    ?>
    <div class="">
        <div class="">
            <div class="">
                <h1 style="font-family: Courgette; color:#565959";>MY ORDER</h1>
            </div>

            <div class="" style=" color: #565959">
                <table class="">
                    <thead class="">
                        <tr>
                            <th scope="col">Order No.</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Flavor</th>
                            <th scope="col">Ingredients</th>
                            <th scope="col">Price</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        if (isset($_SESSION["user_id"])) {
                            $user_id = $_SESSION["user_id"];

                            $sql = "SELECT * FROM orders WHERE user_id = '$user_id'";
                            $result = mysqli_query($conn, $sql);
                            $totalPrice = 0; 

                            while ($order = mysqli_fetch_array($result)) {
                                echo "<tr>
                                    <td>$order[order_id]</td>
                                    <td>$order[order_date]</td>
                                    <td>$order[flavors]</td>
                                    <td>$order[ingredients]</td>
                                    <td>$order[price]</td>
                                    <td>$order[notes]</td>
                                    <td>$order[status]</td>
                                </tr>";

                                
                                $totalPrice += floatval($order['price']);
                            }
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                if (isset($_SESSION["user_id"])) {
                   
                    if (mysqli_num_rows($result) > 0) {
                        echo "<div class='grand-total' style='font-size:30px'>
                                <span><b>Total Price:  Rs. $totalPrice</b></span>
                            </div>";
                    } else {
                        echo "<div class='no-orders'>
                                <span>No orders found.</span>
                            </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
