<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image']['name'];

    // Move uploaded file to the desired folder
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);

    $sql = "INSERT INTO products (name, price, quantity, image) VALUES ('$name', '$price', '$quantity', '$image')";
    mysqli_query($conn, $sql);

    header("Location: index.html");
}
?>
