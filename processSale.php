<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity_sold = $_POST['quantity_sold'];

    // Fetch current product quantity
    $result = mysqli_query($conn, "SELECT quantity FROM products WHERE id = $product_id");
    $product = mysqli_fetch_assoc($result);

    if ($product['quantity'] >= $quantity_sold) {
        // Reduce stock quantity
        $new_quantity = $product['quantity'] - $quantity_sold;
        mysqli_query($conn, "UPDATE products SET quantity = $new_quantity WHERE id = $product_id");

        // Insert sale record
        mysqli_query($conn, "INSERT INTO sales (product_id, quantity_sold, sale_date) VALUES ($product_id, $quantity_sold, NOW())");

        echo "Stock sold successfully!";
    } else {
        echo "Insufficient stock to sell.";
    }
}
?>
