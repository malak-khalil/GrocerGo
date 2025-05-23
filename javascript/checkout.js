// Reina Najjar

let order = document.getElementById("order");
let total = document.getElementById("total");

let cart = JSON.parse(localStorage.getItem("data")) || [];


// displays the order details
function displayOrder() {
    order.innerHTML = `<h2>Order Summary</h2>` + cart.map((x) => {
        let { id, item } = x;
        let search = itemsData.find((y) => y.id === id) || []; 
        return `
        <div class="order-item">
            <h4>${search.name}</h4>

            <div class="amount-price">
                <p style="font-size: 1rem">Quantity: ${item}</p>
                <p id="price">$${(item * search.price).toFixed(2)}</p>
            </div>
        </div>
        `;
    }).join("");
};

displayOrder();

// display the total cost
function displayTotal() {
    let amount = cart.map((x) => {
        let { item, id } = x;
        let search = itemsData.find((y) => y.id === id) || [];

        return item * search.price;
    }).reduce((x, y) => x + y, 0);

    amount = Math.round(amount * 100) /100;
    let totalCost = amount + 2;
    total.innerHTML = `
        <p>Subtotal: $${amount.toFixed(2)}</p>
        <p>Delivery Charge: $2</p>
        <h3>Total: $${totalCost.toFixed(2)}</p>
        `;
};

displayTotal();

// function for submiting the multiple forms
submitForms = function(){
    document.getElementById("form1").submit();
    document.getElementById("form2").submit();
    document.getElementById("form3").submit();
}