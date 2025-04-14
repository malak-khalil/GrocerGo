
function searchProducts() {
    var searchQuery = document.getElementById("searchInput").value;

    // Make sure there's a search term
    if (searchQuery.trim() === "") {
        alert("Please enter a search term.");
        return;
    }

    // Fetch data from search.php
    fetch('search.php?query=' + encodeURIComponent(searchQuery))
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                displaySearchResults(data.data); // Display search results
            } else {
                alert(data.message); // Show error if no results
            }
        })
        .catch(error => {
            console.error("Error fetching data:", error);
            alert("There was an error fetching search results.");
        });
}

function displaySearchResults(products) {
    let resultsContainer = document.getElementById("resultsContainer");
    resultsContainer.innerHTML = ""; // Clear previous results

    // Check if there are results
    if (products.length === 0) {
        resultsContainer.innerHTML = "<p>No products found.</p>";
        return;
    }

    // Iterate through the results and create HTML
    products.forEach(product => {
        const productHTML = `
            <div class="product-item">
                <img src="${product.image_path}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
                <p>Price: ${product.price}</p>
                <p>Amount: ${product.amount}</p>
            </div>
        `;
        resultsContainer.innerHTML += productHTML;
    });
}

