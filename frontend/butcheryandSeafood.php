<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butchery & Seafood - GrocerGo</title>
    <link rel="icon" href="../Images/home/cart3.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="..\styling\items.css" rel="stylesheet">
    <link href="..\styling\categories.css" rel="stylesheet">
</head>
<body>
    <nav>
        <img src="../Images/LogoForLogin.png" alt="GrocerGo Logo" class="logo">
    
    <button class="mobile-nav-toggle" aria-controls="navbar" aria-expanded="false">
        <i class="bi bi-list"></i>
    </button>

    <ul id="navbar" class="navbar" data-visible="false">
    <li>
            <a href="../frontend/categories.php"><i class="bi bi-house"></i> Home</a>
        </li>
        <li>
            <div class="dropdown"> 
                <button class="dropbtn" onclick="toggleDropdown(this)">
                    <i class="bi bi-grid"></i> Categories <i class="bi bi-chevron-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#shop-now"><i class="bi bi-grid-fill"></i> All Categories</a>
                    <a href="../frontend/bakery.php"><i class="bi bi-basket"></i> Bakery</a>
                    <a href="../frontend/beautyandpersonalcare.php"><i class="bi bi-brush"></i> Beauty & Personal Care</a>
                    <a href="../frontend/beverages.php"><i class="bi bi-cup-straw"></i></i> Beverages</a>
                    <a href="../frontend/butcheryandSeafood.php"><i class="bi bi-droplet"></i> Butchery & Seafood</a>
                    <a href="../frontend/cleaningandhousehold.php"><i class="bi bi-bucket"></i> Cleaning & Household</a>
                    <a href="../frontend/dairyandeggs.php"><i class="bi bi-egg"></i> Dairy & Eggs</a>
                    <a href="../frontend/frozenfood.php"><i class="bi bi-snow"></i> Frozen Food</a>
                    <a href="../frontend/fruitsandvegetables.php"><i class="bi bi-apple"></i> Fruits & Vegetables</a>
                    <a href="../frontend/healthyandorganic.php"><i class="bi bi-heart"></i> Healthy & Organic</a>
                    <a href="../frontend/pantryessentials.php"><i class="bi bi-box-seam"></i> Pantry Essentials</a>
                    <a href="../frontend/snacksandcandy.php"><i class="bi bi-cookie"></i></i> Snacks & Candy</a>
                    <a href="../frontend/tobacco.php"><i class="bi bi-fire"></i> Tobacco</a>
                </div>
            </div>
        </li>
        
        <li>
            <a href="../frontend/Profile.php"><i class="bi bi-person-circle"></i> My Account</a>
        </li>
        <li>
            <a href="../frontend/cart.php" class="cart-link">
                <div class="cart">
                    <i class="bi bi-cart3"></i>
                </div> 
                <span>Cart</span>
            </a>
        </li>
    </ul>
</nav>
<div class="search-container">
    <input type="text" id="searchInput" placeholder="Search for products...">
    <button class="search-btn"><i class="bi bi-search"></i> Search</button>
</div>

<!-- Main Content -->
<main class="main-content">
    <h1 class="page-title">Fresh Fruits & Vegetables</h1>
    
    <div class="products-grid" id="productsGrid">
    </div>
</main>

</div>
<div class="modal" id="productModal">
<div class="modal-content">
    <span class="close-modal" id="closeModal">&times;</span>
    <div class="modal-body" id="modalBody">
        <img src="" alt="" class="modal-image">
        <h2 class="modal-title"></h2>
        <div class="modal-description">
            <p class="product-description"></p><br>
            <p><strong class="product-price"></strong></p>
            <p><strong class="product-weight"></strong></p>
        </div>
        <div class="modal-quantity">
            <button class="quantity-btn minus-btn"><i class="bi bi-dash-lg"></i></button>
            <span class="quantity">0</span>
            <button class="quantity-btn plus-btn"><i class="bi bi-plus-lg"></i></button>
        </div>
        <button class="add-to-cart" style="width: 100%; padding: 12px; margin-top: 15px;">
            Add to Cart
        </button>
    </div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
    // Fetch products from backend
    $.ajax({
        url: '../backend/get-butcheryandseafood.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.error) {
                console.error("Error:", data.message);
                $('#productsGrid').html('<div class="error-message">Error loading products. Please try again later.</div>');
                return;
            }

            if (data.length > 0) {
                renderProducts(data);
            } else {
                $('#productsGrid').html('<div class="no-products">No products found in this category.</div>');
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
            $('#productsGrid').html('<div class="error-message">Failed to load products. Please check your connection.</div>');
        }
    });

    // Render products function
    function renderProducts(products) {
        const grid = $('#productsGrid');
        grid.empty();

        products.forEach(product => {
            const productHTML = `
                <div class="product-card" data-id="${product.id}" data-description="${product.description}">
                    <img src="${product.image_path}" alt="${product.name}" class="product-image">
                    <div class="product-details">
                        <h3 class="product-name">${product.name}</h3>
                        <div class="product-info">
                            <span class="product-price">${product.price}</span>
                            <span class="product-weight">${product.amount}</span>
                        </div>
                        <div class="quantity-controls">
                            <button class="quantity-btn minus-btn"><i class="bi bi-dash-lg"></i></button>
                            <span class="quantity">0</span>
                            <button class="quantity-btn plus-btn"><i class="bi bi-plus-lg"></i></button>
                        </div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            `;
            grid.append(productHTML);
        });
    }

    // Quantity controls
    $(document).on('click', '.quantity-btn', function() {
        const quantityDisplay = $(this).siblings('.quantity');
        let currentQuantity = parseInt(quantityDisplay.text());
        
        if ($(this).hasClass('plus-btn')) {
            quantityDisplay.text(currentQuantity + 1);
        } else if ($(this).hasClass('minus-btn') && currentQuantity > 0) {
            quantityDisplay.text(currentQuantity - 1);
        }
    });

    // Modal functionality
    $(document).on('click', '.product-image', function() {
        const productCard = $(this).closest('.product-card');
        const productName = productCard.find('.product-name').text();
        const productImage = $(this).attr('src');
        const productPrice = productCard.find('.product-price').text();
        const productWeight = productCard.find('.product-weight').text();
        const productDescription = productCard.data('description');

        const modalHTML = `
            <img src="${productImage}" alt="${productName}" class="modal-image">
            <h2 class="modal-title">${productName}</h2>
            <div class="modal-description">
                <p>${productDescription}</p><br>
                <p><strong> ${productPrice} / ${productWeight}</strong></p>
            </div>
            <div class="modal-quantity">
                <button class="quantity-btn minus-btn"><i class="bi bi-dash-lg"></i></button>
                <span class="quantity">0</span>
                <button class="quantity-btn plus-btn"><i class="bi bi-plus-lg"></i></button>
            </div>
            <button class="add-to-cart" style="width: 100%; padding: 12px; margin-top: 15px;">
                Add to Cart
            </button>
        `;

        $('#modalBody').html(modalHTML);
        $('#productModal').fadeIn();
        
        // Prevent body scroll when modal is open
        $('body').css('overflow', 'hidden');
    });

    // Close modal
    $('#closeModal').click(closeModal);
    
    // Close when clicking outside modal
    $(document).mouseup(function(e) {
        if ($('#productModal').is(':visible') && 
            !$(e.target).closest('.modal-content').length && 
            !$(e.target).is('.product-image')) {
            closeModal();
        }
    });
    
    // Close with ESC key
    $(document).keyup(function(e) {
        if (e.key === "Escape" && $('#productModal').is(':visible')) {
            closeModal();
        }
    });
    
    function closeModal() {
        $('#productModal').fadeOut();
        $('body').css('overflow', 'auto');
    }

    // Add to cart from modal
    $(document).on('click', '#modalBody .add-to-cart', function() {
        const quantity = $('#modalBody .quantity').text();
        const productName = $('#modalBody .modal-title').text();
        alert(`Added ${quantity} ${productName} to cart!`);
        closeModal();
    });

    // Mobile navigation toggle
    const mobileNavToggle = $('.mobile-nav-toggle');
    const navbar = $('#navbar');

    mobileNavToggle.on('click', function() {
        const visibility = navbar.attr('data-visible');
        navbar.attr('data-visible', visibility === "false" ? "true" : "false");
        mobileNavToggle.attr('aria-expanded', visibility === "false" ? "true" : "false");
    });
});
$(document).ready(function() {
    // Real-time search: Trigger search as the user types
    $('#searchInput').on('keyup', function() {
        performSearch();
    });

    // Perform search
    function performSearch() {
        const searchTerm = $('#searchInput').val().trim();

        if (searchTerm === '') {
            // If the search input is empty, load all products
            loadOriginalProducts();
            return;
        }

        // Show loading state
        $('#productsGrid').html('<div class="loading">Searching products...</div>');

        $.ajax({
            url: '../backend/search.php',
            method: 'GET',
            dataType: 'json',
            data: { query: searchTerm },
            success: function(data) {
                if (data.status === 'error') {
                    $('#productsGrid').html(`<div class="error-message">${data.message}</div>`);
                    return;
                }

                if (data.data && data.data.length > 0) {
                    renderProducts(data.data);
                    $('.page-title').text(`Search Results for "${searchTerm}"`);
                } else {
                    $('#productsGrid').html('<div class="no-products">No products found matching your search.</div>');
                    $('.page-title').text(`No results for "${searchTerm}"`);
                }
            },
            error: function(xhr, status, error) {
                $('#productsGrid').html('<div class="error-message">Search failed. Please try again.</div>');
            }
        });
    }

    // Render products in the grid
    function renderProducts(products) {
        const grid = $('#productsGrid');
        grid.empty();

        products.forEach(product => {
            const productHTML = `
                <div class="product-card" data-id="${product.id}" data-description="${product.description}">
                    <img src="${product.image_path}" alt="${product.name}" class="product-image">
                    <div class="product-details">
                        <h3 class="product-name">${product.name}</h3>
                        <div class="product-info">
                            <span class="product-price">${product.price}</span>
                            <span class="product-weight">${product.amount}</span>
                        </div>
                        <div class="quantity-controls">
                            <button class="quantity-btn minus-btn"><i class="bi bi-dash-lg"></i></button>
                            <span class="quantity">0</span>
                            <button class="quantity-btn plus-btn"><i class="bi bi-plus-lg"></i></button>
                        </div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
            `;
            grid.append(productHTML);
        });
    }

    function loadOriginalProducts() {
        // Show loading state
        $('#productsGrid').html('<div class="loading">Loading products...</div>');
        $('.page-title').text('Butchery and Sea Food');

        $.ajax({
            url: '../backend/get-butcheryandseafood.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    renderProducts(data);
                } else {
                    $('#productsGrid').html('<div class="no-products">No products found in this category.</div>');
                }
            },
            error: function(xhr, status, error) {
                $('#productsGrid').html('<div class="error-message">Failed to load products. Please check your connection.</div>');
            }
        });
    }
});

</script>
</body>
</html>
