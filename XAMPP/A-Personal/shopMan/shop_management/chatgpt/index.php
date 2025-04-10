<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Management WebApp</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Shop Management WebApp</h1>
    </header>
    <main>
        <div id="itemList">
            <h2>Available Items</h2>
            <div class="item" data-name="Coffee" data-price="20">
                <span>Coffee - ₹20</span>
                <button onclick="addItem('Coffee')">+</button>
            </div>
            <div class="item" data-name="Tea" data-price="10">
                <span>Tea - ₹10</span>
                <button onclick="addItem('Tea')">+</button>
            </div>
        </div>

        <button onclick="openSelectedItemsPage()">Review Selected Items</button>
    </main>
    <footer>
        <p>&copy; 2023 Shop Management WebApp</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
