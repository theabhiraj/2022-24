<!-- selectedItems.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Items</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Selected Items</h1>
    </header>
    <main>
        <ul id="selectedItemsList"></ul>
        <p>Total Price: ₹<span id="totalPrice">0</span></p>
        <button onclick="proceedToPayment()">Proceed to Payment</button>
    </main>
    <footer>
        <p>&copy; 2023 Shop Management WebApp</p>
    </footer>
    <script src="selectedItems.js"></script>
</body>
</html>
