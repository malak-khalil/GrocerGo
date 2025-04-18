<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy & Organic - GrocerGo</title>
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
        <h1 class="page-title">Healthy & Organic</h1>
        
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
            name: "Organic Eggs",
            price: 5.99,
            weight: "Pack: 18 pcs",
            image: "../images/healthy and organic/organic eggs 18 pcs.webp",
            description: "Farm-fresh organic eggs from free-range chickens. Rich in protein and essential nutrients. Perfect for breakfast or baking."
        },
        {
            id: 2,
            name: "Organic Gluten-Free Oats",
            price: 4.49,
            weight: "500g",
            image: "../images/healthy and organic/organuc gluten free oats.jpg",
            description: "100% pure organic oats, naturally gluten-free. Ideal for porridge, smoothies, or baking. High in fiber and nutrients."
        },
        {
            id: 3,
            name: "Organic Chia Seeds",
            price: 6.99,
            weight: "300g",
            image: "../images/healthy and organic/organic chia seeds.jpg",
            description: "Nutrient-dense organic chia seeds packed with omega-3s, fiber, and protein. Great for puddings, smoothies, or as an egg substitute."
        },
        {
            id: 4,
            name: "Organic Flaxseed",
            price: 4.99,
            weight: "400g",
            image: "../images/healthy and organic/organic flaxseed.jpg",
            description: "Organic golden flaxseeds, rich in fiber and omega-3 fatty acids. Perfect for sprinkling on yogurt, salads, or baking."
        },
        {
            id: 5,
            name: "Organic White Quinoa",
            price: 7.49,
            weight: "500g",
            image: "../images/healthy and organic/organic white quinoa.webp",
            description: "Premium organic quinoa, a complete protein source. Gluten-free and versatile for salads, bowls, or side dishes."
        },
        {
            id: 6,
            name: "Organic Oat and Honey Granola",
            price: 5.99,
            weight: "350g",
            image: "../images/healthy and organic/organic oat and honey granola.jpg",
            description: "Crunchy organic granola with oats, honey, and nuts. Perfect for breakfast or as a healthy snack."
        },
        {
            id: 7,
            name: "Organic Popcorn",
            price: 3.49,
            weight: "250g",
            image: "../images/healthy and organic/organic pocorn.jpg",
            description: "Organic popcorn kernels for healthy snacking. Non-GMO and perfect for air-popping or stovetop preparation."
        },
        {
            id: 8,
            name: "Barilla Gluten-Free Penne Pasta",
            price: 2.99,
            weight: "340g",
            image: "../images/healthy and organic/gluten free penne pasta barilla.webp",
            description: "Delicious gluten-free pasta made with corn and rice flour. Maintains perfect al dente texture when cooked."
        },
        {
            id: 9,
            name: "Nature Valley Protein Bar",
            price: 1.49,
            weight: "40g",
            image: "../images/healthy and organic/nature vaelley protein bar peanut butter dark chocolate.jpg",
            description: "Protein-packed snack bar with peanut butter and dark chocolate. 10g of protein per bar for sustained energy."
        },
        {
            id: 10,
            name: "A Cup Protein Bomb Trio",
            price: 3.35,
            weight: "125g",
            image: "../images/healthy and organic/Acup protein bomb trio 125g.jpg",
            description: "Delicious protein snacks in three flavors. High in protein and perfect for on-the-go nutrition."
        },
        {
            id: 11,
            name: "Gatorade Protein Bars",
            price: 9.97,
            weight: "6 Bars",
            image: "../images/healthy and organic/Gatorade peanut butter chocolate protein bars.webp",
            description: "Peanut butter chocolate protein bars from Gatorade. 20g of protein per bar for post-workout recovery."
        },
        {
            id: 12,
            name: "Rice Cakes",
            price: 0.99,
            weight: "Pack: 18 Pieces (155g)",
            image: "../images/healthy and organic/equia rice cakes oat.jpg",
            description: "Light and crispy rice cakes made with oats and brown rice. Low calorie and perfect for healthy snacking."
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