<?php
include 'db.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

$products = array();
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

echo json_encode($products);
?>
