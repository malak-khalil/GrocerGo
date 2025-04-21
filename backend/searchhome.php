<?php    // malak khalil
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
include('dbinc.php');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("
        SELECT 
            p.id, 
            p.name, 
            p.price AS original_price,
            p.image_path,
            p.amount,
            p.description,
            d.discount_percent,
            ROUND(p.price * (1 - (d.discount_percent / 100)), 2) AS discounted_price
        FROM products p
        JOIN discounts d ON p.id = d.product_id
        WHERE d.end_date IS NULL OR d.end_date >= NOW()
        ORDER BY d.discount_percent DESC
        LIMIT 12
    ");
    
    $stmt->execute();
    $promotions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($promotions) > 0) {
        echo json_encode([
            "status" => "success",
            "data" => $promotions
        ]);
    } else {
        echo json_encode([
            "status" => "empty",
            "message" => "No current promotions available"
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
?>