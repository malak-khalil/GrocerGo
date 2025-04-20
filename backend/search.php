<?php // malak khalil
header('Content-Type: application/json');
include('dbinc.php'); 

$searchTerm = isset($_GET['query']) ? $_GET['query'] : '';

if (empty($searchTerm)) {
    echo json_encode([
        "status" => "error",
        "message" => "No search term provided"
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT id, name, price, amount, image_path, description, category
                           FROM products
                           WHERE name LIKE :searchTerm");

    $stmt->execute(['searchTerm' => '%' . $searchTerm . '%']);
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
