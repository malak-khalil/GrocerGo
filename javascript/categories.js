const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');
const searchResultsContainer = document.getElementById('searchResultsContainer');
let searchDebounce;

// Handle mobile nav toggle
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

// Handle input event for search
searchInput.addEventListener('input', function() {
    clearTimeout(searchDebounce);
    const searchTerm = this.value.trim();
    
    if (searchTerm.length < 2) {
        searchResults.style.display = 'none';
        return;
    }
    
    searchDebounce = setTimeout(() => {
        fetchSearchResults(searchTerm);
    }, 300);
});

function fetchSearchResults(searchTerm) {
    fetch(`searchhome.php?search=${encodeURIComponent(searchTerm)}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                showSearchError(data.error);
                return;
            }
            
            if (!Array.isArray(data)) {
                showSearchError('Invalid data format received');
                return;
            }
            
            if (data.length === 0) {
                showNoResults();
                return;
            }
            
            displaySearchResults(data);
        })
        .catch(error => {
            console.error('Search error:', error);
            showSearchError('Failed to load search results');
        });
}

function displaySearchResults(products) {
    let html = '<div class="search-items">';
    products.forEach(product => {
        const imagePath = product.image_path.startsWith('../') ? product.image_path.substring(3) : product.image_path;
        
        html += `
            <div class="search-item" data-id="${product.id}">
                <img src="${imagePath}" alt="${product.name}" class="search-item-image">
                <div class="search-item-info">
                    <h4>${product.name}</h4>
                    <p>${product.description ? product.description.substring(0, 50) + '...' : ''}</p>
                    <div class="search-item-price">$${product.price ? product.price.toFixed(2) : '0.00'}</div>
                </div>
            </div>
        `;
    });
    html += '</div>';
    
    searchResultsContainer.innerHTML = html;
    searchResults.style.display = 'block';
    
    document.querySelectorAll('.search-item').forEach(item => {
        item.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            window.location.href = `product.php?id=${productId}`;
        });
    });
}

function showSearchError(message) {
    searchResultsContainer.innerHTML = `<div class="search-error">${message}</div>`;
    searchResults.style.display = 'block';
}

function showNoResults() {
    searchResultsContainer.innerHTML = '<div class="no-results">No products found</div>';
    searchResults.style.display = 'block';
}
