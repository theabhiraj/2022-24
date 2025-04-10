<!-- cart.php -->
<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['item_name'];
    $itemPrice = $_POST['item_price'];

    if (isset($_SESSION['cart'][$itemName])) {
        $_SESSION['cart'][$itemName]['quantity']++;
    } else {
        $_SESSION['cart'][$itemName] = [
            'price' => $itemPrice,
            'quantity' => 1,
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Shopping Cart</h1>
    </header>
    <main>
        <section id="cartItems">
            <h2>Your Cart</h2>
            <ul>
                <?php foreach ($_SESSION['cart'] as $itemName => $item): ?>
                    <li>
                        <?= $itemName ?> - Quantity: <?= $item['quantity'] ?> - ₹<?= $item['price'] * $item['quantity'] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p>Total Price: ₹<?= calculateTotalPrice($_SESSION['cart']) ?></p>
            <a href="checkout.php">Proceed to Checkout</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 My Shopping Page</p>
    </footer>
</body>
</html>
