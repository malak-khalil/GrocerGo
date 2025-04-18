<?php
include('dbinc.php');  
$sql = "SELECT id, name, description, price, amount, image_path, category FROM products WHERE category = 'tobacco'";

try {
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
