<?php
// search.php

header('Content-Type: application/json');
include('dbinc.php'); // Database connection

// Get search term from the query string
$searchTerm = isset($_GET['query']) ? $_GET['query'] : '';

// Validate input (in case the search term is empty)
if (empty($searchTerm)) {
    echo json_encode([
        "status" => "error",
        "message" => "No search term provided"
    ]);
    exit;
}

try {
    // Prepare SQL query to search products only by name
    $stmt = $pdo->prepare("SELECT id, name, price, amount, image_path, description, category
                           FROM products
                           WHERE name LIKE :searchTerm");

    // Bind the search term parameter (wildcards for 'LIKE' query)
    $stmt->execute(['searchTerm' => '%' . $searchTerm . '%']);

    // Fetch all matching products
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return results as JSON
    echo json_encode([
        "status" => "success",
        "data" => $products
    ]);
} catch (PDOException $e) {
    // Handle error if the query fails
    echo json_encode([
        "status" => "error",
        "message" => "Error fetching products: " . $e->getMessage()
    ]);
}
?>
