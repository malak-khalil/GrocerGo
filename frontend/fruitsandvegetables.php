<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits & Vegetables - GrocerGo</title>
    <link rel="icon" href="../Images/home/cart3.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="..\styling\items.css" rel="stylesheet">
    <link href="..\styling\categories.css" rel="stylesheet">
    <style>
        /* Center the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            width: 80%;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
            <img src="../Images/LogoForLogin.png" alt="GrocerGo Logo" class="logo">
        
        <button class="mobile-nav-toggle" aria-controls="navbar" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>
    
        <ul id="navbar" class="navbar" data-visible="false">
        <li>
                <a href="../frontend/categories.html"><i class="bi bi-house"></i> Home</a>
            </li>
            <li>
                <div class="dropdown"> 
                    <button class="dropbtn" onclick="toggleDropdown(this)">
                        <i class="bi bi-grid"></i> Categories <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#shop-now"><i class="bi bi-grid-fill"></i> All Categories</a>
                        <a href="../frontend/bakery.html"><i class="bi bi-basket"></i> Bakery</a>
                        <a href="../frontend/beautyandpersonalcare.html"><i class="bi bi-brush"></i> Beauty & Personal Care</a>
                        <a href="../frontend/beverages.html"><i class="bi bi-cup-straw"></i></i> Beverages</a>
                        <a href="../frontend/butcheryandSeafood.html"><i class="bi bi-droplet"></i> Butchery & Seafood</a>
                        <a href="../frontend/cleaningandhousehold.html"><i class="bi bi-bucket"></i> Cleaning & Household</a>
                        <a href="../frontend/dairyandeggs.html"><i class="bi bi-egg"></i> Dairy & Eggs</a>
                        <a href="../frontend/frozenfood.html"><i class="bi bi-snow"></i> Frozen Food</a>
                        <a href="../frontend/fruitsandvegetables.php"><i class="bi bi-apple"></i> Fruits & Vegetables</a>
                        <a href="../frontend/healthyandorganic.html"><i class="bi bi-heart"></i> Healthy & Organic</a>
                        <a href="../frontend/pantryessentials.html"><i class="bi bi-box-seam"></i> Pantry Essentials</a>
                        <a href="../frontend/snacksandcandy.html"><i class="bi bi-cookie"></i></i> Snacks & Candy</a>
                        <a href="../frontend/tobacco.html"><i class="bi bi-fire"></i> Tobacco</a>
                    </div>
                </div>
            </li>
            
            <li>
                <a href="../frontend/Profile.html"><i class="bi bi-person-circle"></i> My Account</a>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Make an AJAX call to fetch the products
            $.ajax({
                url: '../backend/get-fruitsandvegetables.php', // Path to the backend PHP script
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        // Loop through the products and append them to the container
                        data.forEach(function(product) {
                            // Parse the price to ensure it's a number
                            var price = parseFloat(product.price.replace('$', ''));
                            price = isNaN(price) ? 0 : price.toFixed(2);  // Default to 0 if invalid

                            var productHTML = `
                                <div class="product-card" data-id="${product.id}">
                                    <img src="${product.image_path}" alt="${product.name}" class="product-image">
                                    <div class="product-details">
                                        <h3 class="product-name">${product.name}</h3>
                                        <div class="product-info">
                                            <span class="product-price">$${price}</span>
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
                            $('#productsGrid').append(productHTML);
                        });
                    } else {
                        $('#productsGrid').html('<p>No products found.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching products:", error);
                    console.error("Response from server:", xhr.responseText);
                    $('#productsGrid').html('<p>There was an error fetching the products.</p>');
                }
            });

            // Handle the quantity controls
            $(document).on('click', '.quantity-btn', function() {
                var quantityDisplay = $(this).siblings('.quantity');
                var currentQuantity = parseInt(quantityDisplay.text());
                if ($(this).hasClass('plus-btn')) {
                    quantityDisplay.text(currentQuantity + 1);
                } else if ($(this).hasClass('minus-btn') && currentQuantity > 0) {
                    quantityDisplay.text(currentQuantity - 1);
                }
            });

            // Add to Cart functionality (not connected to the backend for now)
            $(document).on('click', '.add-to-cart', function() {
                var productCard = $(this).closest('.product-card');
                var productId = productCard.data('id');
                var quantity = productCard.find('.quantity').text();
                alert(`Added ${quantity} of product ID ${productId} to cart.`);
            });

            // Handle the product image click to open the modal
            $(document).on('click', '.product-image', function() {
                var productCard = $(this).closest('.product-card');
                var productId = productCard.data('id');
                var productName = productCard.find('.product-name').text();
                var productImage = productCard.find('.product-image').attr('src');
                var productPrice = productCard.find('.product-price').text();
                var productDescription = productCard.find('.product-description').text();

                // Populate modal with product details
                $('#modalBody').html(`
                    <img src="${productImage}" alt="${productName}" class="modal-image">
                    <h2 class="modal-title">${productName}</h2>
                    <p class="modal-description">${productDescription}</p>
                    <p class="modal-price">${productPrice}</p>
                `);

                $('#productModal').fadeIn();
            });

            // Close modal functionality
            $('#closeModal').click(function() {
                $('#productModal').fadeOut();
            });
        });
        function toggleDropdown(button) {
    const dropdown = button.parentElement;
    dropdown.classList.toggle('active');
}
document.addEventListener('click', function(event) {
    if (!event.target.matches('.dropbtn')) {
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    }
});
const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
const navbar = document.getElementById('navbar');

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
    </script>
</body>
</html>
