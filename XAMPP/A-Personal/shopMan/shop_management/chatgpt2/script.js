// script.js
let selectedItems = [];

function addItem(itemName) {
    const existingItem = selectedItems.find(item => item.name === itemName);

    if (existingItem) {
        existingItem.quantity += 1;
        updateQuantityDisplay(itemName, existingItem.quantity);
    } else {
        selectedItems.push({ name: itemName, price: getItemPrice(itemName), quantity: 1 });
        updateQuantityDisplay(itemName, 1);
    }

    updateTotalPrice();
}

function updateQuantityDisplay(itemName, quantity) {
    document.getElementById(`${itemName.toLowerCase()}Quantity`).textContent = `[ ${quantity} ]`;
}

function getItemPrice(itemName) {
    const itemContainer = document.querySelector(`.product[data-name="${itemName}"]`);
    return parseInt(itemContainer.getAttribute('data-price'));
}

function viewCart() {
    updateSelectedItemsListPopup();
    updateTotalPricePopup();
    document.getElementById("cartPopup").style.display = "block";
}

function closePopup() {
    document.getElementById("cartPopup").style.display = "none";
}

function updateSelectedItemsListPopup() {
    const selectedItemsListPopup = document.getElementById("selectedItemsListPopup");
    selectedItemsListPopup.innerHTML = "";

    selectedItems.forEach(item => {
        const listItem = document.createElement("li");
        listItem.textContent = `${item.name} - Quantity: ${item.quantity} - ₹${item.price * item.quantity}`;
        selectedItemsListPopup.appendChild(listItem);
    });
}

function updateTotalPricePopup() {
    const totalPricePopup = document.getElementById("totalPricePopup");
    const total = selectedItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
    totalPricePopup.textContent = total;
}

function proceedToPaymentPopup() {
    alert("Proceeding to payment. Total amount: ₹" + document.getElementById("totalPricePopup").textContent);
    closePopup();
}
