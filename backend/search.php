<?php

include 'dbinc.php';

// Check if the search term is provided
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query']; // Get the search term

    // Prevent SQL Injection by using prepared statements
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
    $searchTerm = "%" . $searchQuery . "%"; // Wildcards for LIKE query
    $stmt->bind_param("s", $searchTerm); // Bind the parameter

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Loop through the results and output them
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product-item'>";
            echo "<h3>" . $row['name'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p><strong>Price:</strong> $" . $row['price'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No products found.";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
