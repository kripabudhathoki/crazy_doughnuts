<?php
session_start();
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['flavor']) && isset($_POST['ingredients']) && isset($_POST['notes'])) {
        $flavor = $_POST['flavor'];
        $ingredient = $_POST['ingredients'];
        $notes = $_POST['notes'];
        
        
        $sql = "SELECT unit_price FROM products WHERE ingredients = '$ingredient'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $price = $row["unit_price"];

            $user_id = $_SESSION['user_id'];
            $order_date = date('Y-m-d');

            $sql = "INSERT INTO orders (user_id, order_date, flavors, ingredients, notes, price)
                    VALUES ('$user_id', '$order_date', '$flavor', '$ingredient', '$notes', '$price')";
          if ($conn->query($sql) === TRUE) {
            $_SESSION["orderPlaced"] = "Your Order has been placed successfully!";
            header("Location: create.php");
            
            exit;
        } else {
            $_SESSION["orderPlaced"] = "Cannot place order".$conn->error;
            header("Location: create.php");


        }
        
        
        } else {
            echo "Invalid ingredient selected.";
        }
    } else {
        echo "Flavor, ingredients, and notes are required.";
    }
}

$conn->close();
?>
