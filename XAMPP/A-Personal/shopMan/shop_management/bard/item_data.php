<?php

// Include items data file
require_once 'item_data.php';

// Function to get item by ID
function getItemById($id) {
    global $items;

    // Check if items array exists and is not empty
    if (!is_array($items) || empty($items)) {
        return null;
    }

    // Loop through items and find the matching one
    foreach ($items as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }

    // Return null if item not found
    return null;
}
