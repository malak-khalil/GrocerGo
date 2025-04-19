<?php
// searchhome.php
include('dbinc.php');

header('Content-Type: application/json');

if (!isset($_GET['search'])) {
    echo json_encode(['error' => 'No search term provided']);
    exit;
}

$searchTerm = '%' . $_GET['search'] . '%';

try {
    $stmt = $pdo->prepare("SELECT id, name, description, price, image_path 
                          FROM products 
                          WHERE name LIKE :search 
                          OR description LIKE :search
                          OR category LIKE :search
                          LIMIT 10");
    $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
