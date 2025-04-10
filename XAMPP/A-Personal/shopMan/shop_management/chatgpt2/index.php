<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>My Shopping Page</h1>
    </header>
    <main>
        <section id="productList">
            <!-- Product 1 -->
            <div class="product" data-name="Coffee" data-price="20">
                <img src="coffee.jpg" alt="Coffee">
                <h2>Coffee</h2>
                <p>Price: ₹20</p>
                <button onclick="addItem('Coffee')">+</button>
            </div>

            <!-- Product 2 -->
            <div class="product" data-name="Tea" data-price="10">
                <img src="tea.jpg" alt="Tea">
                <h2>Tea</h2>
                <p>Price: ₹10</p>
                <button onclick="addItem('Tea')">+</button>
            </div>
        </section>

        <div id="cartContainer">
            <button onclick="viewCart()">View Cart</button>

            <div id="cartPopup" class="popup">
                <h2>Selected Items</h2>
                <ul id="selectedItemsListPopup"></ul>
                <p>Total Price: ₹<span id="totalPricePopup">0</span></p>
                <button onclick="proceedToPaymentPopup()">Proceed to Payment</button>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 My Shopping Page</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
