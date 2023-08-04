<?php
include("./dbconnection.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
</head>

<body class="">
    <?php
    include("./headernav.php");
    ?>
    <div class="">
        <div class="">
            <div class="">
                <h1>MY CART</h1>
            </div>

            <div class="">
                <table class="">
                    <thead class="">
                        <tr>
                            <th scope="col">Order No.</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Flavor</th>
                            <th scope="col">Ingredients</th>
                            <th scope="col">Price</th>
                            <th scope="col">Notes</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        if (isset($_SESSION["user_id"])) {
                            $user_id = $_SESSION["user_id"];

                            $sql = "SELECT * FROM orders WHERE user_id = '$user_id'";
                            $result = mysqli_query($conn, $sql);
                            while ($order = mysqli_fetch_array($result)) {
                        
                                echo "<tr>
            
                                    <td>$order[order_id]</td>
                                    <td>$order[order_date]</td>
                                    <td>$order[flavors]</td>
                                    <td>$order[ingredients]</td>
                                    <td>$order[price]</td>
                                    <td>$order[notes]</td>
                                </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php
            $username = $_SESSION['username'];
            $userDetail = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
            $userinfo = mysqli_fetch_array($userDetail);
            ?>
            <div class="">
                <div class="">
                    <h4>Grand Total:</h4>
                    <h5 class="text-right" id="gtotal"></h5>
                    <?php
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    ?>
                        <!--customer details for payment -->

                        <form method="POST" class="my-0" enctype="multipart/form-data" id="cart-form">
                            <div class="form-group mt-3 mb-3">
                                <b><label>Username: </label></b>
                                <?php echo $userinfo['username']; ?><input type="hidden" name="username" id="username" value="<?php echo $userinfo['username']; ?>" placeholder="Full Name" class="form-control border-success" required>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <b><label>Phone: </label></b>
                                <?php echo $userinfo['contact_number'] ?><input type="hidden" name="contact_number" id="contact_number" value="<?php echo $userinfo['contact_number'] ?>" placeholder="Phone Number" class="form-control border-success" required>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <b><label>Address: </label></b>
                                <?php echo $userinfo['address'] ?><input type="hidden" name="address" id="address" value="<?php echo $userinfo['address'] ?>" placeholder="Address" class="form-control border-success" required>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <!-- <input class="form-check-input border-success" checked type="radio" name="pay_mode" value="COD" id="flexRadioDefault1"> -->
                                <select name="pay_mode" required id="select" class="form-control">
                                    <option value="">Select Payment Method</option>
                                    <option value="COD">Cash On Delivery</option>
                                </select>
                            </div>
                            <button class="btn btn-dark text-white m-auto d-flex justify-content-center" id="purchase" name="purchase">Purchase</button>
                        </form>
                    <?php
                    } ?>
                </div>
            </div>
            <?php
            ?>
        </div>
    </div>

    <!--for grand total of the items-->
    <!-- <script type="text/javascript" defer>
        btn.onclick = function(event) {
                const form = document.getElementById("cart-form");
                const formdata = new FormData(form);
                const dataObject = {};
                formdata.forEach((value, key) => {
                    dataObject[key] = value;
                })
                if (payment.value === "COD") {
                    event.preventDefault();
                    $.post("./purchase.php", dataObject, result => {
                        if (result === 'Order Placed')
                            alert("Order placed");
                        window.location.href = "index.php";
                    })
                } -->
    </script>
    <?php
    require './footernav.php';
    ?>
</body>

</html>
