<?php
header('Content-Type: application/json');

// Include your database connection file
require_once 'dbinc.php'; // Make sure this path is correct

$searchTerm = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($searchTerm)) {
    echo json_encode([
        "status" => "error",
        "message" => "No search term provided"
    ]);
    exit;
}

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("SELECT id, name, price, amount, image_path, description, category
                           FROM products
                           WHERE name LIKE :searchTerm
                           OR description LIKE :searchTerm
                           OR category LIKE :searchTerm");
    
    $searchParam = "%" . $searchTerm . "%";
    $stmt->bindParam(':searchTerm', $searchParam);
    $stmt->execute();
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "data" => $products
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
?>