const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
const navbar = document.getElementById('navbar');
const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');
const searchResults = document.getElementById('searchResults');
const searchResultsContainer = document.getElementById('searchResultsContainer');
const mainContent = document.querySelector('main');
const footer = document.querySelector('footer');
let searchDebounce;

// Mobile Navigation Toggle
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

// Dropdown Toggle
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

// DOM Content Loaded
document.addEventListener("DOMContentLoaded", function() {
    // Image loading animation
    const images = document.querySelectorAll(".fade-in");
    images.forEach(img => {
        if (img.complete) {
            img.classList.add("loaded"); 
        } else {
            img.addEventListener("load", function() {
                img.classList.add("loaded");
            });
        }
    });

    // Scroll reveal animation
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

    // Page transition effect
    document.body.classList.add("loaded");

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

    // Hero section animation
    const heroSection = document.querySelector(".hero-section");
    if (heroSection) {
        setTimeout(() => {
            heroSection.querySelector(".hero-title").classList.add("loaded");
            heroSection.querySelector(".hero-subtitle").classList.add("loaded");
            heroSection.querySelector(".cta-button").classList.add("loaded");
        }, 300);
    }
});

// Search Functionality
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
        console.error('Error:', error);
        searchResultsContainer.innerHTML = `
            <div class="error-message">
                <i class="bi bi-exclamation-triangle"></i>
                <p>Error loading search results. Please try again.</p>
                <p>${error.message}</p>
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
                // Fix image path - remove any leading slashes or dots
                let imagePath = product.image_path.replace(/^[./\\]+/, '');
                // Display price exactly as it comes from the database
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
                            <button class="add-to-cart" data-id="${product.id}">Add to Cart</button>
                        </div>
                    </div>
                </div>
                `;
            }).join('')}
        </div>
    `;

    // Quantity controls
    document.querySelectorAll('.quantity-btn.minus').forEach(btn => {
        btn.addEventListener('click', function() {
            const quantityElement = this.nextElementSibling;
            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantity--;
                quantityElement.textContent = quantity;
            }
        });
    });

    document.querySelectorAll('.quantity-btn.plus').forEach(btn => {
        btn.addEventListener('click', function() {
            const quantityElement = this.previousElementSibling;
            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;
        });
    });

    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const quantity = parseInt(this.closest('.product-card').querySelector('.quantity').textContent);
            addToCart(productId, quantity);
        });
    });
}

function addToCart(productId, quantity) {
    // Here you would typically make an AJAX call to your backend
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

// Event Listeners
searchInput.addEventListener('input', function() {
    clearTimeout(searchDebounce);
    const query = this.value.trim();
    
    if (query.length > 0) {
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

// Close search results when clicking outside
document.addEventListener('click', function(event) {
    if (!searchResults.contains(event.target) && 
        event.target !== searchInput && 
        event.target !== searchButton) {
        hideSearchResults();
    }
});

// Prevent search form submission
document.querySelector('.search-container').addEventListener('submit', function(e) {
    e.preventDefault();
    const query = searchInput.value.trim();
    performSearch(query);
});
// Add this to your existing JavaScript
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
                <p>${error.message}</p>
                <p>Please try again later</p>
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
                        <button class="add-to-cart-promo" data-id="${product.id}">Add to Cart</button>
                    </div>
                </div>
            </div>
            `;
        }).join('')}
    `;

    // Add event listeners
    addProductEventListeners();
}
     


// Add this function to your existing JavaScript code
function addProductEventListeners() {
    // Quantity controls
    document.querySelectorAll('.quantity-btn.minus').forEach(btn => {
        btn.addEventListener('click', function() {
            const quantityElement = this.nextElementSibling;
            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantity--;
                quantityElement.textContent = quantity;
            }
        });
    });

    document.querySelectorAll('.quantity-btn.plus').forEach(btn => {
        btn.addEventListener('click', function() {
            const quantityElement = this.previousElementSibling;
            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;
        });
    });

    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const quantity = parseInt(this.closest('.product-card').querySelector('.quantity').textContent);
            addToCart(productId, quantity);
        });
    });
}

// Make sure this function also exists
function addToCart(productId, quantity) {
    // Here you would typically make an AJAX call to your backend
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
// Call this when DOM loads
document.addEventListener("DOMContentLoaded", function() {
    loadPromotions();
});