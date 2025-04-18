<?php
// Include the database connection file
include('dbinc.php');  // Ensure the correct path if needed

// Query to fetch fruits and vegetables
$sql = "SELECT id, name, description, price, amount, image_path, category FROM products WHERE category = 'dairyandeggs'";

try {
    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch all products
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return products as JSON
    header('Content-Type: application/json');
    echo json_encode($products);
} catch (PDOException $e) {
    // Handle any errors that may occur during the query
    echo json_encode(['error' => $e->getMessage()]);
}
?>
