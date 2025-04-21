const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
const navbar = document.getElementById('navbar');
const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');
const searchResults = document.getElementById('searchResults');
const searchResultsContainer = document.getElementById('searchResultsContainer');
const mainContent = document.querySelector('main');
const footer = document.querySelector('footer');
let searchDebounce;

// Initialize all functionality when DOM is loaded
document.addEventListener("DOMContentLoaded", function() {
    setupDropdowns();
    setupMobileNavigation();
    setupSearchFunctionality();
    setupQuantityControls();
    loadPromotions();
    setupPageTransitions();
    setupScrollAnimations();
    setupHeroAnimations();
});

// Dropdown functionality
function setupDropdowns() {
    document.querySelectorAll('.dropbtn').forEach(btn => {
        btn.removeAttribute('onclick');
    });

    // Add event listeners to all dropdown buttons
    document.querySelectorAll('.dropbtn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const dropdown = this.parentElement;
            const isMobile = window.innerWidth <= 992;
            
            if (isMobile) {
                // For mobile, toggle the current dropdown and close others
                const isActive = dropdown.classList.contains('active');
                
                // Close all other dropdowns
                document.querySelectorAll('.dropdown').forEach(d => {
                    if (d !== dropdown) d.classList.remove('active');
                });
                
                // Toggle current dropdown
                dropdown.classList.toggle('active', !isActive);
                
                // Rotate chevron icon
                const chevron = this.querySelector('.bi-chevron-down');
                if (chevron) {
                    chevron.style.transform = isActive ? 'rotate(0deg)' : 'rotate(180deg)';
                }
            } else {
                // For desktop, use hover-like behavior
                dropdown.classList.toggle('active');
                
                // Close other dropdowns when opening a new one
                if (dropdown.classList.contains('active')) {
                    document.querySelectorAll('.dropdown').forEach(d => {
                        if (d !== dropdown) d.classList.remove('active');
                    });
                }
            }
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const isMobile = window.innerWidth <= 992;
        
        if (!isMobile && !event.target.matches('.dropbtn')) {
            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        }
    });
}

// Mobile navigation
function setupMobileNavigation() {
    mobileNavToggle.addEventListener('click', () => {
        const visibility = navbar.getAttribute('data-visible');
        
        if (visibility === "false") {
            navbar.setAttribute('data-visible', "true");
            mobileNavToggle.setAttribute('aria-expanded', "true");
            document.body.style.overflow = 'hidden';
        } else {
            navbar.setAttribute('data-visible', "false");
            mobileNavToggle.setAttribute('aria-expanded', "false");
            document.body.style.overflow = '';
        }
    });

    // Close mobile menu when clicking a link (except dropdown links)
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 992 && 
            navbar.getAttribute('data-visible') === "true" && 
            event.target.closest('a') && 
            !event.target.closest('.dropdown-content')) {
            navbar.setAttribute('data-visible', "false");
            mobileNavToggle.setAttribute('aria-expanded', "false");
            document.body.style.overflow = '';
        }
    });

    // Reset mobile states when resizing to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            navbar.setAttribute('data-visible', "false");
            mobileNavToggle.setAttribute('aria-expanded', "false");
            document.body.style.overflow = '';
            document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('active'));
        }
    });
}

// Search functionality
function setupSearchFunctionality() {
    searchInput.addEventListener('input', function() {
        clearTimeout(searchDebounce);
        const query = this.value.trim();
        
        if (query.length >= 0) {
            searchDebounce = setTimeout(() => {
                performSearch(query);
            }, 300);
        } else {
            hideSearchResults();
        }
    });

    searchButton.addEventListener('click', function() {
        const query = searchInput.value.trim();
        if (query.length > 0) {
            performSearch(query);
        }
    });

    document.addEventListener('click', function(event) {
        if (!searchResults.contains(event.target) && 
            event.target !== searchInput && 
            event.target !== searchButton) {
            hideSearchResults();
        }
    });

    document.querySelector('.search-container').addEventListener('submit', function(e) {
        e.preventDefault();
        const query = searchInput.value.trim();
        performSearch(query);
    });
}

async function performSearch(query) {
    if (query.length < 1) {
        hideSearchResults();
        return;
    }

    // Show loading state
    searchResultsContainer.innerHTML = `
        <div class="loading">
            <i class="bi bi-search"></i>
            <p>Searching for products...</p>
        </div>
    `;
    showSearchResults();

    try {
        const response = await fetch(`../backend/searchhome.php?query=${encodeURIComponent(query)}`);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        
        if (data.status === 'success' && data.data.length > 0) {
            displaySearchResults(data.data, query);
        } else {
            searchResultsContainer.innerHTML = `
                <div class="no-products">
                    <i class="bi bi-search"></i>
                    <p>No products found matching "${query}"</p>
                </div>
            `;
        }
    } catch (error) {
        console.error('Search error:', error);
        searchResultsContainer.innerHTML = `
            <div class="error-message">
                <i class="bi bi-exclamation-triangle"></i>
                <p>Error loading search results. Please try again.</p>
            </div>
        `;
    }
}

function showSearchResults() {
    searchResults.style.display = 'block';
    mainContent.style.display = 'none';
    footer.style.display = 'none';
}

function hideSearchResults() {
    searchResults.style.display = 'none';
    mainContent.style.display = 'block';
    footer.style.display = 'block';
}

function displaySearchResults(products, query) {
    searchResultsContainer.innerHTML = `
        <div class="search-header">
            <h2 class="search-title">Search Results for "${query}"</h2>
            <span class="search-count">${products.length} ${products.length === 1 ? 'item' : 'items'} found</span>
        </div>
        <div class="products-grid">
            ${products.map(product => {
                let imagePath = product.image_path.replace(/^[./\\]+/, '');
                let price = product.price;
                
                return `
                <div class="product-card">
                    <img src="../${imagePath}" alt="${product.name}" class="product-image" onerror="this.src='../Images/default-product.jpg'">
                    <div class="product-details">
                        <h3 class="product-name">${product.name}</h3>
                        <div class="product-info">
                            <span class="product-price">${price}</span>
                            <span class="product-weight">${product.amount || ''}</span>
                        </div>
                        <div class="quantity-row">
                            <div class="quantity-controls">
                                <button class="quantity-btn minus">-</button>
                                <span class="quantity">0</span>
                                <button class="quantity-btn plus">+</button>
                            </div>
                            <form method="post" action="" class="form-submit">
                                <input type="hidden" name="product_id" class="product_id" value="${product.id}">
                                <input type="hidden" name="product_image" class="product_image" value="../${imagePath}">
                                <input type="hidden" name="product_name" class="product_name" value="${product.name}">
                                <input type="hidden" name="product_price" class="product_price" value="${price}">
                                <input type="hidden" name="product_quantity" class="submit-product-quantity">
                                <input type="submit" value="Add to Cart" name="add_to_cart" data-id="${product.id}" class="add-to-cart">
                            </form>
                        </div>
                    </div>
                </div>
                `;
            }).join('')}
        </div>
    `;

    setupQuantityControls();
    setupAddToCartButtons();
}

// Quantity controls
function setupQuantityControls() {
    document.querySelectorAll('.quantity-btn.minus').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const quantityElement = this.nextElementSibling;
            let quantity = parseInt(quantityElement.textContent);
            if (!isNaN(quantity) && quantity > 0) {
                quantity--;
                quantityElement.textContent = quantity;
                updateQuantity(quantity);
            }
        });
    });

    document.querySelectorAll('.quantity-btn.plus').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const quantityElement = this.previousElementSibling;
            let quantity = parseInt(quantityElement.textContent);
            if (!isNaN(quantity)) {
                quantity++;
                quantityElement.textContent = quantity;
                updateQuantity(quantity);
            }
        });
    });
}

function updateQuantity(currentQuantity) {
    document.querySelectorAll(".submit-product-quantity").forEach(el => {
        el.value = currentQuantity.toString();
    });
}

// Cart functionality
function setupAddToCartButtons() {
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.getAttribute('data-id');
            const quantity = parseInt(this.closest('.product-card').querySelector('.quantity').textContent);
            addToCart(productId, quantity);
        });
    });
}

function addToCart(productId, quantity) {
    console.log(`Adding product ${productId} with quantity ${quantity} to cart`);
    showToast('Item added to cart!');
}

function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.classList.add('show');
    }, 10);
    
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Promotions
async function loadPromotions() {
    const promotionsContainer = document.getElementById('promotionsContainer');
    
    try {
        promotionsContainer.innerHTML = `
            <div class="loading">
                <i class="bi bi-arrow-repeat"></i>
                <p>Loading promotions...</p>
            </div>
        `;

        const response = await fetch('../backend/promotions.php');
        
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        
        const data = await response.json();
        
        if (data.status === 'success' && data.data.length > 0) {
            displayPromotions(data.data);
        } else if (data.status === 'empty') {
            promotionsContainer.innerHTML = `
                <div class="no-promotions">
                    <i class="bi bi-percent"></i>
                    <p>${data.message}. Check back soon!</p>
                </div>
            `;
        } else {
            throw new Error(data.message || "No promotion data received");
        }
    } catch (error) {
        console.error('Promotions error:', error);
        promotionsContainer.innerHTML = `
            <div class="error-message">
                <i class="bi bi-exclamation-triangle"></i>
                <p>Error loading promotions. Please try again later.</p>
            </div>
        `;
    }
}

function displayPromotions(promotions) {
    const container = document.getElementById('promotionsContainer');
    container.innerHTML = `
        ${promotions.map(product => {
            const imagePath = product.image_path.replace(/^[./\\]+/, '');
            const originalPrice = product.original_price.replace('$', '');
            const discountPercent = product.discount_percent;
            const discountedPrice = (originalPrice * (1 - discountPercent/100)).toFixed(2);
            
            return `
            <div class="promotion-card">
                <div class="promotion-badge">${discountPercent}% OFF</div>
                <img src="../${imagePath}" alt="${product.name}" class="promotion-image" 
                     onerror="this.src='../Images/default-product.jpg'">
                <div class="promotion-details">
                    <h3 class="promotion-name">${product.name}</h3>
                    <div class="price-container">
                        <span class="original-price">$${originalPrice}</span>
                        <span class="promotional-price">$${discountedPrice}</span>
                    </div>
                    <span class="product-weight">${product.amount || ''}</span>
                    <div class="promotion-actions">
                        <div class="quantity-controls">
                            <button class="quantity-btn minus">-</button>
                            <span class="quantity">0</span>
                            <button class="quantity-btn plus">+</button>
                        </div>
                        <form method="post" action="" class="form-submit">
                            <input type="hidden" name="product_id" class="product_id" value="${product.id}">
                            <input type="hidden" name="product_image" class="product_image" value="../${imagePath}">
                            <input type="hidden" name="product_name" class="product_name" value="${product.name}">
                            <input type="hidden" name="product_price" class="product_price" value="${discountedPrice}">
                            <input type="hidden" name="product_quantity" class="submit-product-quantity">
                            <input type="submit" value="Add to Cart" name="add_to_cart" data-id="${product.id}" class="add-to-cart-promo">
                        </form>
                    </div>
                </div>
            </div>
            `;
        }).join('')}
    `;

    setupQuantityControls();
    setupAddToCartButtons();
}

// Page transitions
function setupPageTransitions() {
    document.querySelectorAll("a").forEach(link => {
        if (link.href.includes(window.location.origin) && 
            !link.classList.contains("app-btn") && 
            !link.classList.contains("cta-button")) {
            link.addEventListener("click", function(e) {
                if (this.getAttribute("target") !== "_blank" && 
                    !this.classList.contains("dropbtn") &&
                    !this.closest(".dropdown-content")) {
                    e.preventDefault();
                    document.body.classList.add("fade-out");
                    setTimeout(() => {
                        window.location.href = this.href;
                    }, 500);
                }
            });
        }
    });
}

// Animations
function setupScrollAnimations() {
    function revealElements() {
        document.querySelectorAll(".category-box").forEach(element => {
            let elementPosition = element.getBoundingClientRect().top;
            let windowHeight = window.innerHeight;
    
            if (elementPosition < windowHeight - 50) {
                element.classList.add("visible");
            }
        });
    }
    
    revealElements();
    window.addEventListener("scroll", revealElements);
}

function setupHeroAnimations() {
    const heroSection = document.querySelector(".hero-section");
    if (heroSection) {
        setTimeout(() => {
            heroSection.querySelector(".hero-title").classList.add("loaded");
            heroSection.querySelector(".hero-subtitle").classList.add("loaded");
            heroSection.querySelector(".hero-cta").classList.add("loaded");
        }, 300);
    }
}