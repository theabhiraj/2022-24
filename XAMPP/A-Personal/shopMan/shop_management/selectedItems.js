// selectedItems.js
document.addEventListener('DOMContentLoaded', () => {
    // Retrieve selected items from query parameters
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const itemsString = urlParams.get('items');
    
    if (itemsString) {
        // Decode the JSON string and parse it
        const selectedItems = JSON.parse(decodeURIComponent(itemsString));

        // Call functions to update UI with selected items
        updateSelectedItemsList(selectedItems);
        updateTotalPrice(selectedItems);
    } else {
        // Handle case where no items are passed
        alert('No items selected.');
    }
});

function updateSelectedItemsList(selectedItems) {
    const selectedItemsList = document.getElementById("selectedItemsList");
    selectedItemsList.innerHTML = "";

    selectedItems.forEach(item => {
        const listItem = document.createElement("li");
        listItem.textContent = `${item.name} - ₹${item.price}`;
        selectedItemsList.appendChild(listItem);
    });
}

function updateTotalPrice(selectedItems) {
    const totalPrice = document.getElementById("totalPrice");
    const total = selectedItems.reduce((sum, item) => sum + item.price, 0);
    totalPrice.textContent = total;
}

function proceedToPayment() {
    alert("Proceeding to payment. Total amount: ₹" + document.getElementById("totalPrice").textContent);
}
