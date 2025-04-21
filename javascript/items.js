// Common JavaScript for all category pages


const productsGrid = document.getElementById('productsGrid');
const searchInput = document.getElementById('searchInput');
const productModal = document.getElementById('productModal');
const closeModal = document.getElementById('closeModal');
const modalBody = document.getElementById('modalBody');
const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
const navbar = document.getElementById('navbar');


let cart = JSON.parse(localStorage.getItem('cart')) || [];

function renderProducts(productsToRender) {
    productsGrid.innerHTML = '';
    productsToRender.forEach(product => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card';
        productCard.dataset.id = product.id;
        
        const cartItem = cart.find(item => item.id === product.id);
        const quantity = cartItem ? cartItem.quantity : 0;
        
        productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}" class="product-image">
            <div class="product-details">
                <h3 class="product-name">${product.name}</h3>
                <div class="product-info">
                    <span class="product-price">$${product.price.toFixed(2)}</span>
                    <span class="product-weight">${product.weight}</span>
                </div>
                <div class="quantity-controls">
                    <button class="quantity-btn minus-btn"><i class="bi bi-dash-lg"></i></button>
                    <span class="quantity">${quantity}</span>
                    <button class="quantity-btn plus-btn"><i class="bi bi-plus-lg"></i></button>
                </div>
                <button class="add-to-cart">${quantity > 0 ? 'Update Cart' : 'Add to Cart'}</button>
            </div>
        `;
        productsGrid.appendChild(productCard);
        
      
        const productImage = productCard.querySelector('.product-image');
        productImage.addEventListener('click', () => openProductModal(product));
        
       
        const plusBtn = productCard.querySelector('.plus-btn');
        const minusBtn = productCard.querySelector('.minus-btn');
        const quantityDisplay = productCard.querySelector('.quantity');
        const addToCartBtn = productCard.querySelector('.add-to-cart');
        
        plusBtn.addEventListener('click', () => {
            const newQuantity = parseInt(quantityDisplay.textContent) + 1;
            quantityDisplay.textContent = newQuantity;
            addToCartBtn.textContent = 'Update Cart';
            updateCart(product.id, newQuantity);
        });
        
        minusBtn.addEventListener('click', () => {
            const currentQuantity = parseInt(quantityDisplay.textContent);
            if (currentQuantity > 0) {
                const newQuantity = currentQuantity - 1;
                quantityDisplay.textContent = newQuantity;
                addToCartBtn.textContent = newQuantity > 0 ? 'Update Cart' : 'Add to Cart';
                updateCart(product.id, newQuantity);
            }
        });
        
        addToCartBtn.addEventListener('click', () => {
            const quantity = parseInt(quantityDisplay.textContent);
            if (quantity > 0) {
                updateCart(product.id, quantity);
                addToCartBtn.textContent = 'Update Cart';
                showToast(`${product.name} ${quantity > 1 ? 'items' : 'item'} added to cart`);
            } else {
                showToast('Please select at least 1 item');
            }
        });
    });
}

function updateCart(productId, quantity) {
 
    if (quantity === 0) {
        cart = cart.filter(item => item.id !== productId);
    } else {
      
        const existingItem = cart.find(item => item.id === productId);
        if (existingItem) {
            existingItem.quantity = quantity;
        } else {
            const product = products.find(p => p.id === productId);
            cart.push({
                id: product.id,
                name: product.name,
                price: product.price,
                image: product.image,
                quantity: quantity
            });
        }
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
}

function openProductModal(product) {
    const cartItem = cart.find(item => item.id === product.id);
    const quantity = cartItem ? cartItem.quantity : 0;
    
    modalBody.innerHTML = `
        <img src="${product.image}" alt="${product.name}" class="modal-image">
        <h2 class="modal-title">${product.name}</h2>
        <p class="modal-description">${product.description}</p>
        <p class="modal-price">$${product.price.toFixed(2)} / ${product.weight}</p>
        <div class="quantity-controls" style="justify-content: center; margin: 20px 0;">
            <button class="quantity-btn minus-btn"><i class="bi bi-dash-lg"></i></button>
            <span class="quantity">${quantity}</span>
            <button class="quantity-btn plus-btn"><i class="bi bi-plus-lg"></i></button>
        </div>
        <button class="add-to-cart" style="margin-top: 10px;">${quantity > 0 ? 'Update Cart' : 'Add to Cart'}</button>
    `;
    
    const modalQuantity = modalBody.querySelector('.quantity');
    const modalPlusBtn = modalBody.querySelector('.plus-btn');
    const modalMinusBtn = modalBody.querySelector('.minus-btn');
    const modalAddToCartBtn = modalBody.querySelector('.add-to-cart');
    
    modalPlusBtn.addEventListener('click', () => {
        const newQuantity = parseInt(modalQuantity.textContent) + 1;
        modalQuantity.textContent = newQuantity;
        modalAddToCartBtn.textContent = 'Update Cart';
    });
    
    modalMinusBtn.addEventListener('click', () => {
        const currentQuantity = parseInt(modalQuantity.textContent);
        if (currentQuantity > 0) {
            const newQuantity = currentQuantity - 1;
            modalQuantity.textContent = newQuantity;
            modalAddToCartBtn.textContent = newQuantity > 0 ? 'Update Cart' : 'Add to Cart';
        }
    });
    
    modalAddToCartBtn.addEventListener('click', () => {
        const quantity = parseInt(modalQuantity.textContent);
        if (quantity > 0) {
            updateCart(product.id, quantity);
            modalAddToCartBtn.textContent = 'Update Cart';
            showToast(`${product.name} ${quantity > 1 ? 'items' : 'item'} added to cart`);
            
            const productCard = document.querySelector(`.product-card[data-id="${product.id}"]`);
            if (productCard) {
                const cardQuantity = productCard.querySelector('.quantity');
                const cardAddToCartBtn = productCard.querySelector('.add-to-cart');
                cardQuantity.textContent = quantity;
                cardAddToCartBtn.textContent = 'Update Cart';
            }
        } else {
            showToast('Please select at least 1 item');
        }
    });
    
    productModal.style.display = 'flex';
}

function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.classList.add('show');
    }, 10);
    
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}

const toastStyles = document.createElement('style');
toastStyles.textContent = `
    .toast-notification {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: var(--primary-dark);
        color: white;
        padding: 12px 24px;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 10000;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .toast-notification.show {
        opacity: 1;
    }
`;
document.head.appendChild(toastStyles);

closeModal.addEventListener('click', () => {
    productModal.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target === productModal) {
        productModal.style.display = 'none';
    }
});

function searchProducts() {
    const searchTerm = searchInput.value.toLowerCase();
    const filteredProducts = products.filter(product => 
        product.name.toLowerCase().includes(searchTerm) ||
        product.description.toLowerCase().includes(searchTerm)
    );
    renderProducts(filteredProducts);
}

mobileNavToggle.addEventListener('click', () => {
    const visibility = navbar.getAttribute('data-visible');
    
    if (visibility === "false") {
        navbar.setAttribute('data-visible', "true");
        mobileNavToggle.setAttribute('aria-expanded', "true");
    } else {
        navbar.setAttribute('data-visible', "false");
        mobileNavToggle.setAttribute('aria-expanded', "false");
    }
});

ocument.addEventListener('DOMContentLoaded', () => {
    renderProducts(products);
    
    searchInput.addEventListener('input', searchProducts);
});