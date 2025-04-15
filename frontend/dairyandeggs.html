<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy & Eggs - GrocerGo</title>
    <link rel="icon" href="../Images/home/cart3.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="..\styling\items.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <a href="../frontend/categories.html">
            <img src="../Images/LogoForLogin.png" alt="GrocerGo Logo" class="logo">
        </a>
        
        <button class="mobile-nav-toggle" aria-controls="navbar" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>
    
        <ul id="navbar" class="navbar" data-visible="false">
            <li>
                <a href="../frontend/categories.html"><i class="bi bi-house"></i> Home</a>
            </li>
            <li>
                <a href="../frontend/Profile.html"><i class="bi bi-person-circle"></i> My Account</a>
            </li>
            <li>
                <a href="../frontend/cart.php"><i class="bi bi-cart3"></i> Cart</a>
            </li>
        </ul>
    </nav>
    
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search for products...">
        <button class="search-btn">
            <i class="bi bi-search"></i> Search
        </button>
    </div>
    
    <!-- Main Content -->
    <main class="main-content">
        <h1 class="page-title">Dairy & Eggs</h1>
        
        <div class="products-grid" id="productsGrid">
            <!-- Product cards will be generated here -->
        </div>
    </main>
    
    <!-- Product Modal -->
    <div class="modal" id="productModal">
        <div class="modal-content">
            <span class="close-modal" id="closeModal">&times;</span>
            <div class="modal-body" id="modalBody">
                <!-- Modal content will be inserted here -->
            </div>
        </div>
    </div>
    
    <script>
    const products = [
        {
            id: 1,
            name: "Horizon Organic Grassfed Whole Milk",
            price: 6.99,
            weight: "1.75L",
            image: "../images/dairy and eggs/wholeMilk.webp",
            description: "Organic whole milk from grass-fed cows. Rich in nutrients and packed with natural goodness."
        },
        {
            id: 2,
            name: "Wellsley Greek Plain Nonfat Yogurt",
            price: 5.49,
            weight: "2.5lbs",
            image: "../images/dairy and eggs/greekYogurt.avif",
            description: "Creamy Greek yogurt with 0% fat. High in protein and perfect for healthy breakfasts or snacks."
        },
        {
            id: 3,
            name: "Philadelphia Whipped Cream Cheese",
            price: 4.99,
            weight: "8oz",
            image: "../images/dairy and eggs/CreamCheese.webp",
            description: "Light and fluffy whipped cream cheese. Spreads easily and tastes delicious on bagels or crackers."
        },
        {
            id: 4,
            name: "Plein Soleil Shredded Cheddar",
            price: 5.99,
            weight: "400g",
            image: "../images/dairy and eggs/cheddar.jpg",
            description: "Premium quality shredded cheddar cheese. Perfect for melting, cooking, or snacking."
        },
        {
            id: 5,
            name: "Kiri Cheese",
            price: 3.99,
            weight: "Pack: 5x6",
            image: "../images/dairy and eggs/kiri.avif",
            description: "Creamy and smooth cheese portions. Great for kids' snacks or as a dessert cheese."
        },
        {
            id: 6,
            name: "Lurpak Unsalted Butter",
            price: 4.49,
            weight: "200g",
            image: "../images/dairy and eggs/butter.jpg",
            description: "Premium quality unsalted butter made from pure cream. Ideal for baking and cooking."
        },
        {
            id: 7,
            name: "White Eggs",
            price: 6.99,
            weight: "Pack: 30 pcs",
            image: "../images/dairy and eggs/eggs30.jpg",
            description: "Fresh white eggs from free-range chickens. Pack of 30 large eggs."
        },
        {
            id: 8,
            name: "Brown Eggs",
            price: 3.99,
            weight: "Pack: 15 pcs",
            image: "../images/dairy and eggs/eggs15.png",
            description: "Farm-fresh brown eggs with rich yolks. Pack of 15 medium eggs."
        }
    ];

    // DOM elements
    const productsGrid = document.getElementById('productsGrid');
    const searchInput = document.getElementById('searchInput');
    const productModal = document.getElementById('productModal');
    const closeModal = document.getElementById('closeModal');
    const modalBody = document.getElementById('modalBody');
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const navbar = document.getElementById('navbar');

    // Cart functionality
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Generate product cards
    function renderProducts(productsToRender) {
        productsGrid.innerHTML = '';
        productsToRender.forEach(product => {
            const productCard = document.createElement('div');
            productCard.className = 'product-card';
            productCard.dataset.id = product.id;
            
            // Check if product is already in cart
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
            
            // Add click event to product image
            const productImage = productCard.querySelector('.product-image');
            productImage.addEventListener('click', () => openProductModal(product));
            
            // Add event listeners for quantity controls
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

    // Update cart function
    function updateCart(productId, quantity) {
        // Remove if quantity is 0
        if (quantity === 0) {
            cart = cart.filter(item => item.id !== productId);
        } else {
            // Check if already in cart
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
        
        // Save to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Open product modal
    function openProductModal(product) {
        // Check if product is in cart
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
        
        // Get modal elements
        const modalQuantity = modalBody.querySelector('.quantity');
        const modalPlusBtn = modalBody.querySelector('.plus-btn');
        const modalMinusBtn = modalBody.querySelector('.minus-btn');
        const modalAddToCartBtn = modalBody.querySelector('.add-to-cart');
        
        // Add event listeners for modal controls
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
                
                // Update the main product card if it's visible
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

    // Show toast notification
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

    // Add toast styles dynamically
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

    // Close product modal
    closeModal.addEventListener('click', () => {
        productModal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', (event) => {
        if (event.target === productModal) {
            productModal.style.display = 'none';
        }
    });

    // Search functionality
    function searchProducts() {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredProducts = products.filter(product => 
            product.name.toLowerCase().includes(searchTerm) ||
            product.description.toLowerCase().includes(searchTerm)
        );
        renderProducts(filteredProducts);
    }

    // Mobile navigation toggle
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

    // Initialize the page
    document.addEventListener('DOMContentLoaded', () => {
        renderProducts(products);
        
        // Add event listeners
        searchInput.addEventListener('input', searchProducts);
    });
    </script>
</body>
</html>