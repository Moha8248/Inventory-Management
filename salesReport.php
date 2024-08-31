<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Sales Report</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity Sold</th>
                <th>Sale Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db.php';
            $result = mysqli_query($conn, "SELECT sales.quantity_sold, sales.sale_date, products.name FROM sales JOIN products ON sales.product_id = products.id ORDER BY sales.sale_date DESC");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['quantity_sold']}</td>
                        <td>{$row['sale_date']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
