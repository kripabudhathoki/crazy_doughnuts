<?php

// Get the order details from the request
$order_id = $_POST['order_id'];
$user_id = $_POST['user_id'];
$order_date = $_POST['order_date'];
$required_date = $_POST['required_date'];
$products = $_POST['products']; // Assuming an array of product details

// Create a new order file
$orderFile = fopen("orders/{$orderNumber}.txt", "w");

// Write the order details to the file
fwrite($orderFile, "Order Number: {$orderNumber}\n");
fwrite($orderFile, "Customer Name: {$customerName}\n");
fwrite($orderFile, "Customer Email: {$customerEmail}\n");

fwrite($orderFile, "\nProducts:\n");
foreach ($products as $product) {
    $productName = $product['name'];
    $productPrice = $product['price'];
    fwrite($orderFile, "- {$productName}: {$productPrice}\n");
}

// Close the order file
fclose($orderFile);

// Send a response to the client
$response = [
    'status' => 'success',
    'message' => 'Order file created successfully.'
];
echo json_encode($response);
?>
