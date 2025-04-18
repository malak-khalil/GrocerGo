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
     document.addEventListener("DOMContentLoaded", function() {
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

            function revealElements() {
                document.querySelectorAll(".category-box, .feature-box, .testimonial").forEach(element => {
                    let elementPosition = element.getBoundingClientRect().top;
                    let windowHeight = window.innerHeight;
                    
                    if (elementPosition < windowHeight - 50) {
                        element.classList.add("visible");
                    }
                });
            }
            
            revealElements();
            window.addEventListener("scroll", revealElements);

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
            
            const heroSection = document.querySelector(".hero-section");
            if (heroSection) {
                setTimeout(() => {
                    heroSection.querySelector(".hero-title").classList.add("loaded");
                    heroSection.querySelector(".hero-subtitle").classList.add("loaded");
                    heroSection.querySelector(".cta-button").classList.add("loaded");
                }, 300);
            }
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
        
            // Load original products when search is empty or reset
            function loadOriginalProducts() {
                // Show loading state
                $('#productsGrid').html('<div class="loading">Loading products...</div>');
                
        
                $.ajax({
                    url: '../backend/get-products.php',
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
        
        