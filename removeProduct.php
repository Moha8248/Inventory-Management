<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = $id";
    mysqli_query($conn, $sql);
}
?>
