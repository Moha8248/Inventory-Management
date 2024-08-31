<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Stock</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Sell Stock</h1>

    <!-- Sell Stock Form -->
    <form action="processSale.php" method="POST">
        <select name="product_id" id="product-select" required>
            <option value="">Select Product</option>
            <!-- Product options will be populated by JavaScript -->
        </select>
        <input type="number" name="quantity_sold" placeholder="Quantity Sold" min="1" required />
        <button type="submit">Sell Stock</button>
    </form>

    <script>
        // Fetch products for the dropdown
        document.addEventListener('DOMContentLoaded', () => {
            fetch('getProducts.php')
                .then(response => response.json())
                .then(data => {
                    let productSelect = document.getElementById('product-select');
                    data.forEach(product => {
                        productSelect.innerHTML += `<option value="${product.id}">${product.name} (Available: ${product.quantity})</option>`;
                    });
                });
        });
    </script>
</body>
</html>
