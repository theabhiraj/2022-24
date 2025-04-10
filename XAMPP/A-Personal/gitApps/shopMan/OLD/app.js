document.addEventListener("DOMContentLoaded", function () {
    const content = document.getElementById("content");
    const history = document.getElementById("history");
    let addedItems = []; // Store added items
    let purchaseHistory = [];

    function clearContent() {
        content.innerHTML = "";
    }

    function showAddItemForm() {
        clearContent();
        content.innerHTML = `
            <h2>Add Item</h2>
            <label for="item-name">Item Name:</label>
            <input type="text" id="item-name"><br>
            <label for="item-price">Item Price:</label>
            <input type="text" id="item-price"><br>
        `;
    
        const nameInput = document.getElementById("item-name");
        const priceInput = document.getElementById("item-price");
    
        nameInput.addEventListener("input", updatePayNowButton);
        priceInput.addEventListener("input", updatePayNowButton);
    
        
        payNowBtn.textContent = "Pay Now";
        content.appendChild(payNowBtn);
    
        payNowBtn.addEventListener("click", () => {
            if (nameInput.value.trim() && priceInput.value.trim()) {
                purchaseHistory.push({ id: getRandomId(), items: [{ name: nameInput.value, price: parseFloat(priceInput.value) }] });
                showHistory();
            }
        });
    }
    

    function updatePayNowButton() {
        const nameInput = document.getElementById("item-name").value;
        const priceInput = document.getElementById("item-price").value;
        const payNowBtn = document.getElementById("pay-now");

        if (nameInput.trim() && priceInput.trim()) {
            if (!payNowBtn) {
                const payNowButton = document.createElement("button");
                payNowButton.id = "pay-now";
                payNowButton.textContent = "Pay Now";
                content.appendChild(payNowButton);
                payNowButton.addEventListener("click", () => {
                    addedItems.push({ name: nameInput, price: parseFloat(priceInput) });
                    showAddedItems();
                });
            }
        }
    }

    function showAddItemsForm() {
        clearContent();
        content.innerHTML = `
            <h2>Add Items</h2>
            <label for="items-name">Enter Item Names (comma-separated):</label>
            <input type="text" id="items-name"><br>
            <label for="items-price">Enter Item Prices (comma-separated):</label>
            <input type="text" id="items-price"><br>
            <button id="show-added-items-btn">Show Added Items</button>
        `;

        const addedButton = document.getElementById("show-added-items-btn");
        addedButton.addEventListener("click", () => {
            const itemsNameInput = document.getElementById("items-name").value;
            const itemsPriceInput = document.getElementById("items-price").value;
            const itemsName = itemsNameInput.split(",").map(item => item.trim());
            const itemsPrice = itemsPriceInput.split(",").map(price => parseFloat(price.trim()));

            if (itemsName.length > 0 && itemsPrice.length > 0 && itemsName.length === itemsPrice.length) {
                for (let i = 0; i < itemsName.length; i++) {
                    addedItems.push({ name: itemsName[i], price: itemsPrice[i] });
                }
                showAddedItems();
            }
        });
    }

    function showAddedItems() {
        clearContent();
        let total = 0;
        content.innerHTML = `
            <h2>Added Items</h2>
            <ul id="items-list">
                ${addedItems.map((item, index) => {
                    total += item.price;
                    return `<li>${item.name} - $${item.price.toFixed(2)} <button class="delete-item" data-index="${index}">Delete</button></li>`;
                }).join("")}
            </ul>
            <p>Total: $${total.toFixed(2)}</p>
            <button id="pay-now">Pay Now</button>
        `;

        const deleteButtons = document.querySelectorAll(".delete-item");
        deleteButtons.forEach(deleteButton => {
            deleteButton.addEventListener("click", (event) => {
                const index = event.target.getAttribute("data-index");
                const item = addedItems[index];
                total -= item.price;
                addedItems.splice(index, 1);
                showAddedItems();
            });
        });

        const payNowBtn = document.getElementById("pay-now");
        payNowBtn.addEventListener("click", () => {
            if (addedItems.length > 0) {
                purchaseHistory.push({ id: getRandomId(), items: addedItems });
                addedItems = [];
                showAddedItems();
            }
        });
    }

    function showHistory() {
        clearContent();
        content.innerHTML = `
            <h2>Order History</h2>
            <ul id="history-list">
                ${purchaseHistory.map((purchase, index) => 
                `<li>Order ID: ${purchase.id} - Items: ${purchase.items.length > 1 ? 
                    `<button class="view-items" data-index="${index}">View Items</button>` 
                    : `[ ${purchase.items[0].name} ]`}</li>`).join("")}
            </ul>
        `;

        const viewItemButtons = document.querySelectorAll(".view-items");
        viewItemButtons.forEach(viewItemButton => {
            viewItemButton.addEventListener("click", (event) => {
                const index = event.target.getAttribute("data-index");
                const purchase = purchaseHistory[index];
                showItemsView(purchase.items);
            });
        });
    }

    function showItemsView(items) {
        clearContent();
        content.innerHTML = `
            <h2>Order Items</h2>
            <ul id="items-list">
                ${items.map((item) => `<li>${item.name} - $${item.price.toFixed(2)}</li>`).join("")}
            </ul>
        `;
    }

    function getRandomId() {
        return Math.floor(100000 + Math.random() * 900000);
    }

    // Event listeners for buttons
    const addBtn = document.getElementById("add-item");
    addBtn.addEventListener("click", showAddItemForm);

    const addItemsBtn = document.getElementById("add-items");
    addItemsBtn.addEventListener("click", showAddItemsForm);

    const addedItemsBtn = document.getElementById("added-items");
    addedItemsBtn.addEventListener("click", showAddedItems);

    const historyBtn = document.getElementById("history");
    historyBtn.addEventListener("click", showHistory);
});
