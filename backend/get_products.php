<?php
// get_products.php

header('Content-Type: application/json');
require_once 'dbinc.php';

try {
    $stmt = $pdo->prepare("SELECT id, name, price, amount, image_path, description, category FROM products");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "data" => $products
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Error fetching products: " . $e->getMessage()
    ]);
}
?>
