document.addEventListener('DOMContentLoaded', () => {
    fetchProducts();

    // Search functionality
    const searchBar = document.getElementById('search-bar');
    searchBar.addEventListener('input', filterProducts);
});

function fetchProducts() {
    fetch('getProducts.php')
        .then(response => response.json())
        .then(data => {
            renderProducts(data);
        });
}

function renderProducts(products) {
    let productList = document.getElementById('product-list');
    productList.innerHTML = ''; // Clear the current list

    products.forEach(product => {
        productList.innerHTML += `
            <div class="product-item">
                <img src="uploads/${product.image}" alt="${product.name}">
                <div>
                    <h3>${product.name}</h3>
                    <p>Price: $${product.price}</p>
                    <p>Quantity: ${product.quantity}</p>
                    <button onclick="deleteProduct(${product.id})">Delete</button>
                </div>
            </div>
        `;
    });
}

function deleteProduct(id) {
    if (confirm('Are you sure you want to delete this product?')) {
        fetch(`removeProduct.php?id=${id}`, { method: 'POST' })
            .then(response => response.text())
            .then(data => {
                alert('Product deleted successfully.');
                fetchProducts();
            });
    }
}

function filterProducts() {
    const searchTerm = document.getElementById('search-bar').value.toLowerCase();
    fetch('getProducts.php')
        .then(response => response.json())
        .then(data => {
            const filteredProducts = data.filter(product => 
                product.name.toLowerCase().includes(searchTerm)
            );
            renderProducts(filteredProducts);
        });
}
