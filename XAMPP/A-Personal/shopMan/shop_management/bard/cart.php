<?php

// Check if selected items provided
if (!isset($_GET['items'])) {
    header("Location: index.php");
    exit;
}

// Decode selected items
$selectedItems = json_decode(base64_decode($_GET['items']));

// Calculate total price
$totalPrice = 0;
foreach ($selectedItems as $itemId) {
    // Include item data file
    require_once 'item_data.php';

    // Get item data
    $item = getItemById($itemId);

    // Validate item data
    if (!$item) {
        die("Invalid item ID: {$itemId}");
    }

    $totalPrice += $item['price'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Management - Cart</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .cart-item {
            display: flex;
            margin: 10px 0;
        }

        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .cart-item-details {
            padding: 10px;
            flex-grow: 1;
        }

        .cart-item-details h3 {
            margin-bottom: 5px;
        }

        .cart-item-details p {
            margin-bottom: 0;
        }

        .total-price {
            font-weight: bold;
            text-align: right;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Cart</h1>

        <?php if (empty($selectedItems)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <?php foreach ($selectedItems as $itemId): ?>
                <?php $item = getItemById($itemId); ?>
                <div class="cart-item">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    <div class="cart-item-details">
                        <h3><?php echo $item['name']; ?></h3>
                        <p><?php echo $item['price']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="total-price">Total: <?php echo $totalPrice; ?></div>
            <a href="payment/qrcode.png">Proceed to Payment</a>
        <?php endif; ?>
    </div>
</body>
</html>
