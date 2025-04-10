// script.js
let selectedItems = [];

document.querySelectorAll('.itemCheckbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateTotal);
});

function updateTotal() {
    selectedItems = [];

    document.querySelectorAll('.itemCheckbox:checked').forEach(checkbox => {
        const itemContainer = checkbox.closest('.item');
        const itemName = itemContainer.getAttribute('data-name');
        const itemPrice = parseInt(itemContainer.getAttribute('data-price'));

        selectedItems.push({ name: itemName, price: itemPrice });
    });

    updateTotalPrice();
}

function updateTotalPrice() {
    const totalPrice = document.getElementById("totalPrice");
    const total = selectedItems.reduce((sum, item) => sum + item.price, 0);
    totalPrice.textContent = total;
}

function openSelectedItemsPage() {
    // Convert selected items to JSON string
    const selectedItemsString = JSON.stringify(selectedItems);

    // Redirect to selectedItems.php with the encoded selected items as a parameter
    window.location.href = `selectedItems.php?items=${selectedItemsString}`;
}
