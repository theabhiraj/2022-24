<?php

// Decode selected items
$selectedItems = json_decode(base64_decode($_GET['items']));

// Calculate total price
$totalPrice = 0;
foreach ($selectedItems as $itemId) {
    $item = getItemById($itemId);
    $totalPrice += $item['price'];
}

// Function to get item by ID
function getItemById($id) {
    global $items;

    foreach ($items as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }

    return null;
}
