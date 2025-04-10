<?php
session_start();

// Function to get item price (replace this with your actual logic)
function getItemPrice($itemName) {
    // Replace this with your logic to get item price based on the item name
    $prices = [
        'Item 1' => 10.00,
        'Item 2' => 1.00,
        'Item 3' => 5.00,
        'Item 4' => 25.00,
    ];

    return $prices[$itemName];
}

// Display selected items and allow users to remove items
if (isset($_SESSION['selected_items']) && !empty($_SESSION['selected_items'])) {
    echo '<h2>Shopping Cart</h2>';
    echo '<div class="cart-items">';

    $totalSum = 0;

    foreach ($_SESSION['selected_items'] as $selectedItem) {
        // Fetch item details
        $itemName = $selectedItem;
        $itemPrice = getItemPrice($itemName);
        $itemImage = 'items/' . strtolower(str_replace(' ', '', $itemName)) . '.jpg';

        // Display item information
        echo '<div class="cart-item">';
        echo '<img src="' . $itemImage . '" alt="' . $itemName . '" class="cart-item-img">';
        echo '<h3>' . $itemName . '</h3>';
        echo '<p>$' . number_format($itemPrice, 2) . '</p>';
        echo '</div>';

        // Calculate the total sum
        $totalSum += $itemPrice;
    }

    // Clear the selected items in the session
    $_SESSION['selected_items'] = [];

    echo '</div>';

    // Display total sum and Proceed to Payment button
    echo '<div class="cart-summary">';
    echo '<p>Total: $' . number_format($totalSum, 2) . '</p>';
    echo '<form action="payment.php" method="post">';
    echo '<input type="submit" value="Proceed to Payment">';
    echo '</form>';
    echo '</div>';
} else {
    echo '<p>Your cart is empty.</p>';
}
?>
