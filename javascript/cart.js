// Reina Najjar

let label = document.getElementById("label");
let cartItems = document.getElementById("cart-items");

// cart is hardcoded for now for testing purposes
let cart = [
    {
        id: "item1",
        item: 1,
    },
    {
        id: "item2",
        item: 1,
    },
    {
        id: "item3",
        item: 1,
    },
    {
        id: "item4",
        item: 1,
    },
    {
        id: "item5",
        item: 1,
    },
    {
        id: "item6",
        item: 1,
    },
    {
        id: "item7",
        item: 1,
    },
    {
        id: "item8",
        item: 1,
    },
    {
        id: "item9",
        item: 1,
    },
    {
        id: "item10",
        item: 1,
    },
]
localStorage.setItem("data", JSON.stringify(cart));

// updates the amount of items to be displayed next to cart icon
function calculateItemsAmount() {
    let cartIcon = document.getElementById("items-amount");
    cartIcon.innerHTML = cart.map((x) => x.item).reduce((x, y) => x + y, 0);
};
  
calculateItemsAmount();

// displays the items in the cart
function displayCartItems() {
    if (cart.length !== 0){ // case 1: cart is not empty: display cart items
        cartItems.innerHTML = `<h3>My Cart</h3>` + cart.map((x) => {
            let { id, item } = x;
            let search = itemsData.find((y) => y.id === id) || []; 
            return `
                <div class="cart-item">
                    <img src=${search.img} alt="${search.alt}">
                    <div class="details">
                        <div class="title-x">
                            <h4 class="title">
                                <p>${search.name}</p>
                            </h4>
                            <i onclick="removeItem(${id})" class="bi bi-x-lg remove-button"></i>
                        </div>

                        <div class="price-buttons">
                            <p id="price">$${(item * search.price).toFixed(2)}</p>

                            <div class="cart-buttons">
                                <i onclick="decrement(${id})" class="bi bi-dash-lg"></i>
                                <div id=${id} class="quantity">${item}</div>
                                <i onclick="increment(${id})" class="bi bi-plus-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }).join("");
    }
    else{ // case 2: cart is empty
        cartItems.innerHTML = ``
        label.innerHTML = `
            <div class="empty-cart">
                <img width="25%" src="../images/home/cart-img.jpg" alt=""/>
                <h2>Your cart is empty.</h2>
                <a href="../frontend/categories.html"> 
                    <button class="to-categories-button">Keep shopping</button>
                </a>
            </div>
        `;
        document.getElementById("cart-page").style.display = "block";
    }
};

displayCartItems();

// adds more of the item to cart
function increment(id) {
    let selectedItem = id;
    let search = cart.find((x) => x.id === selectedItem.id);

    search.item += 1;
    
    displayCartItems();
    update(selectedItem.id);
    localStorage.setItem("data", JSON.stringify(cart));
};

// removes items from the cart
function decrement(id) {
    let selectedItem = id;
    let search = cart.find((x) => x.id === selectedItem.id);

    if (search.item === 0) 
        return;
    else {
        search.item -= 1;
    };

    update(selectedItem.id);
    cart = cart.filter((x) => x.item !== 0);
    displayCartItems();
    localStorage.setItem("data", JSON.stringify(cart));
};

// updates the amount in cart icon and in subtotal
function update(id) {
    let search = cart.find((x) => x.id === id);
    document.getElementById(id).innerHTML = search.item;
    calculateItemsAmount();
    calculateTotalAmount();
};

// removes item if quantity becomes 0
function removeItem(id) {
    let selectedItem = id;
    cart = cart.filter((x) => x.id !== selectedItem.id);
    displayCartItems();
    calculateTotalAmount();
    calculateItemsAmount();
};

// clears cart
function clearCart() {
    cart = [];
    displayCartItems();
    calculateItemsAmount();
};

// calculates the subtotal and displays it
function calculateTotalAmount() {
    if (cart.length !== 0) { // case 1: cart is not empty: display subtotal 
        let amount = cart.map((x) => {
            let { item, id } = x;
            let search = itemsData.find((y) => y.id === id) || [];

            return item * search.price;
        }).reduce((x, y) => x + y, 0);

        amount = Math.round(amount * 100) /100;
        label.innerHTML = `
        <div class="subtotal-buttons">
            <h2>Subtotal: $${amount.toFixed(2)}</h2>
            <a href="../frontend/checkout.html">
                <button class="checkout">Go to checkout</button>
            </a>
            <button onclick="openPop()" class="clear-all">Empty cart</button>
            
            <div id="popupDialog">
                <div id="popup-content">
                    <p>Are you sure you want to empty your cart?</p>
                    <button onclick="openPop()">
                        No
                    </button>
                    <button onclick="openPop();clearCart()">
                        Yes
                    </button>
                </div>
            </div>
            
        </div>
        `; 
    }
    else // case 2: cart is empty
        return;
};

calculateTotalAmount();

// popup that is displayed when user clicks empty cart
function openPop() {
    const popDialog = document.getElementById("popupDialog");
    popDialog.style.visibility = popDialog.style.visibility === "visible" ? "hidden" : "visible";
}