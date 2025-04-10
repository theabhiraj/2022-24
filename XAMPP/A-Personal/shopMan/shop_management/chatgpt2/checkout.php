<!-- checkout.php -->
<?php
session_start();

function calculateTotalPrice($cart) {
    $total = 0;

    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    return $total;
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Checkout</h1>
    </header>
    <main>
        <section id="checkoutSummary">
            <h2>Order Summary</h2>
            <ul>
                <?php foreach ($_SESSION['cart'] as $itemName => $item): ?>
                    <li>
                        <?= $itemName ?> - Quantity: <?= $item['quantity'] ?> - ₹<?= $item['price'] * $item['quantity'] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p>Total Price: ₹<?= calculateTotalPrice($_SESSION['cart']) ?></p>
            <p>Thank you for your order!</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 My Shopping Page</p>
    </footer>
</body>
</html>
