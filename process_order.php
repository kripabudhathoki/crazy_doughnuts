<?php
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
            $user_id = 1;
            $oid = 1;
            $order_date = date('Y-m-d');

            $sql = "INSERT INTO orders (oid,user_id, order_date, flavors, ingredients, notes, price)
                    VALUES ('$oid','$user_id', '$order_date', '$flavor', '$ingredient', '$notes', '$price')";
            if ($conn->query($sql) === TRUE) {
                header("Location: create.php");
                exit;
            } else {
                echo "Error inserting order: " . $conn->error;
            }
        } else {
            echo "Invalid ingredient selected.";
        }
    } else {
        echo "Flavor, ingredients, and notes are required.";
    }
}

$conn->close();
