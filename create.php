
<!DOCTYPE html>
<html>

<head>
    <title>Create Doughnut</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        .image {
            background-image: url("img/create.jpg");
            height: 500px;
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            justify-content: center;
        }

        .maincreate {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px;
            font-family: Courgette;
            color: #565959;

        }

        .flavor {
            justify-content: center;
            display: flex;
            font-family: Montserrat;
            margin-bottom: 20px;

        }

        .flavor label {
            margin-bottom: 0px;
            padding: 5px;

        }

        .price {
            width: 100%;
            display: flex;
            justify-content: center;
            font-family: Montserrat;

        }

        .notes {
            width: 100%;
            display: flex;
            justify-content: center;
            font-family: Montserrat;
        }

        #ingredientscontainter {
            top: 10%;

        }
        .make {
            display: block;
            padding: 18px 20px;
            font-size: 22px;  
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: white;
            background-color: #FF9494;
            border: none;
            border-radius: 50px;
            box-shadow: 0 7px #999;
            margin-bottom: 5px !important;

        }
        .make:hover {
            background-color: #F75b26;
        }

        .make:active {
        background-color: #565959;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
        }
    </style>
</head>

<body>
    <?php
    include("headernav.php");
    ?>
    <div class="image">
        <div class="maincreate">
            <h1>Create Your Own Doughnut!</h1>
        </div>
        <div style='text-align:center; color:#565959; background-color:#FCAEAE; margin-bottom:10px';>
            <?php
                if(isset($_SESSION['orderPlaced'])){
                echo $_SESSION['orderPlaced'];
                $_SESSION['orderPlaced'] = "";


                }
            ?>
        </div>
        <div class="flavor" style='color:#565959'>
            <form id="doughnutForm" action="./process_order.php" method="POST">
                <label for="flavor">Select Doughnut Flavor:</label>
                <select id="flavor" name="flavor">
                    <option value="" style='color:#565959'>-- Select Flavor --</option>
                    <option value="Strawberry" style='color:#565959'>Strawberry</option>
                    <option value="Blueberry" style='color:#565959'>Blueberry</option>
                    <option value="Custard" style='color:#565959'>Custard</option>
                    <option value="Vanilla" style='color:#565959'>Vanilla</option>
                    <option value="Dark Chocolate" style='color:#565959'>Dark Chocolate</option>
                    <option value="White Chocolate" style='color:#565959'>White Chocolate</option>
                    <option value="Chocolate Truffle" style='color:#565959'>Chocolate Truffle</option>
                    <option value="Pineapple" style='color:#565959'>Pineapple</option>
                    <option value="Mango" style='color:#565959'>Mango</option>
                    <option value="Green Mint" style='color:#565959'>Green Mint</option>
                </select>

                <br>
                <br>

                <label style='color:#565959'>Select Ingredients:</label>
                <div id="ingredientsContainer">
                    <?php
                    include './dbconnection.php';

                    $sql = "SELECT DISTINCT product_name, unit_price FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $ingredient = $row["product_name"];
                            $price = $row["unit_price"];
                            echo '<br><input type="radio" id="' . $ingredient . '" name="product_name" value="' . $ingredient . '" data-price="' . $price . '">';
                            echo '<label for="' . $ingredient . '">' . $ingredient . '</label><br>';
                        }
                    }

                    ?>
                </div>
        </div>

        <div class="price">
            <span id="priceDisplay"></span>
          
        </div>
        

        <br>

        <div class="notes">
            <label for="notes" style='color:#565959'>Additional Notes:</label><br>
            <textarea id="notes" name="notes" rows="2" cols="50" placeholder="Enter any additional notes here..."></textarea>

            <br>

            <div>
                <?php
                if ((isset($_SESSION['username']))||(isset($_SESSION['user_id']))) {
                    echo '<button class ="make" type="submit" value="" name="button";>Make Doughnuts</button>';
                } else {
                    echo '<a href="./login.php">Please login</a>';
                }
                ?>

            </div>
        </div>

        </form>
    </div>
    <script>
        const priceDisplay = document.getElementById('priceDisplay');
      
        const radioButtons = document.querySelectorAll('input[name="product_name"]');
       
        

        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', () => {
                if (radioButton.checked) {
                    const price = radioButton.getAttribute('data-price');
                    priceDisplay.textContent = 'Price: Rs. ' + price;
                }
            });
        });

        
    </script>
    <?php
include("footernav.php");
?>
</body>
</html>

