<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "grocergo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Get category from query parameter
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Prepare SQL query
$sql = "SELECT * FROM products";
if ($category) {
    $sql .= " WHERE category = ?";
}

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die(json_encode(['error' => 'Prepare failed: ' . $conn->error]));
}

if ($category) {
    $stmt->bind_param("s", $category);
}

// Execute query
if (!$stmt->execute()) {
    die(json_encode(['error' => 'Execute failed: ' . $stmt->error]));
}

$result = $stmt->get_result();
$products = [];

while ($row = $result->fetch_assoc()) {
    // Fix image paths if they start with ../
    if (strpos($row['image_path'], '../') === 0) {
        $row['image_path'] = substr($row['image_path'], 3);
    }
    $products[] = $row;
}

echo json_encode($products);

$stmt->close();
$conn->close();
?>