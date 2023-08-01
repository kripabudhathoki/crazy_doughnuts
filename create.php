<!DOCTYPE html>
<html>
<head>
    <title>Create Doughnut</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        .image{
            background-image:url("img/create.jpg");
            height:500px;
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            justify-content: center;  
        }
        .maincreate{
            width: 100%;
            display:flex;
            align-items: center;
            justify-content: center;
            height: 100px;
            font-family: Courgette;
            color: #565959;
            
        }
        .flavor{
            justify-content: center;
            display: flex;
            font-family: Montserrat;
            margin-bottom: 20px;

        }
        .flavor label{
            margin-bottom: 0px;
            padding: 5px;
            
        }
        .price{
            width: 100%;
            display:flex;
            justify-content: center;
            font-family: Montserrat;
            
        }
        .notes{
            width: 100%;
            display:flex;
            justify-content: center;
            font-family: Montserrat;
        }
        #ingredientscontainter{
            top: 10%;

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

        <div class="flavor">
            <form id="doughnutForm" action="process_order.php" method="POST">
                <label for="flavor">Select Doughnut Flavor:</label>
                <select id="flavor" name="flavor">
                <option value="">-- Select Flavor --</option>
                <option value="Strawberry">Strawberry</option>
                <option value="Blueberry">Blueberry</option>
                <option value="Custard">Custard</option>
                <option value="Vanilla">Vanilla</option>
                <option value="Dark Chocolate">Dark Chocolate</option>
                <option value="White Chocolate">White Chocolate</option>
                <option value="Chocolate Truffle">Chocolate Truffle</option>
                <option value="Pineapple">Pineapple</option>
                <option value="Mango">Mango</option>
                <option value="Green Mint">Green Mint</option>
        </select>                

                <br>
                <br>

                <label>Select Ingredients:</label>
                <div id="ingredientsContainer">
                    <?php
                    include './dbconnection.php';

                    $sql = "SELECT DISTINCT ingredients, unit_price FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $ingredient = $row["ingredients"];
                            $price = $row["unit_price"];
                            echo '<br><input type="radio" id="' . $ingredient . '" name="ingredients" value="' . $ingredient . '" data-price="' . $price . '">';
                            echo '<label for="' . $ingredient . '">' . $ingredient . '</label><br>';
                            // Move the hidden input fields inside the while loop
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
            <label for="notes">Additional Notes:</label><br>
            <textarea id="notes" name="notes" rows="2" cols="50" placeholder="Enter any additional notes here..."></textarea>

            <br>

            <div>
            <button type="submit" value="makedoughnuts" name="makedoughnuts">Make Doughnuts</button>
            <?php 
            if(isset($_SESSION['username'])){
                echo'<buton onclick="makedoughnuts">Your Doughnut have been created!!</button>';}
                ?>
                <?php 
                $sql = "SELECT DISTINCT ingredients, unit_price FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($prod = $result->fetch_assoc()) {
                            $ingredient = $prod["ingredients"];
                            $price = $prod["unit_price"];

                  echo'<input type="hidden" name="Item_name" id="Item_name" value="'. $ingredient .'">
                  <input type="hidden" name="price" id="price" value="'. $price .'">';
                        }
                    }?>
            </div>
        </div>

        </form>
    </div>
    <script>
        const priceDisplay = document.getElementById('priceDisplay');
        const radioButtons = document.querySelectorAll('input[name="ingredients"]');

        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', () => {
                if (radioButton.checked) {
                    const price = radioButton.getAttribute('data-price');
                    priceDisplay.textContent = 'Price: Rs. ' + price;
                }
            });
        });
    </script>
</body>
</html>

<?php
    include("footernav.php");
?>
