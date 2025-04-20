<?php // malak khalil
include('dbinc.php');  

$sql = "SELECT id, name, description, price, amount, image_path, category FROM products WHERE category = 'beverages'";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($products);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
