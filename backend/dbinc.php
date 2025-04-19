<?php
// malak khalil

$host = 'localhost';       
$dbname = 'grocergo'; 
$user = 'root';
$pass = '';

try {
    // Attempt to create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Echo a message if the connection is successful
    
} catch (PDOException $e) {
    // Echo an error message if the connection fails
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['reviewText'], $_POST['rating'])) {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $reviewText = htmlspecialchars($_POST['reviewText']);
    $rating = (int)$_POST['rating'];

    // Check if all fields are provided and rating is valid
    if ($name && $reviewText && $rating >= 1 && $rating <= 5) {
        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO reviews (name, review_text, rating) VALUES (?, ?, ?)");
        // Execute the statement
        if ($stmt->execute([$name, $reviewText, $rating])) {
            // Redirect to the same page to show the updated reviews
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit; // Exit after redirecting to avoid further execution
        } else {
            echo "There was an error saving your review.";
        }
    } else {
        echo "Please fill in all fields and provide a valid rating.";
    }
}

// Fetch reviews from the database
$stmt = $pdo->prepare("SELECT * FROM reviews ORDER BY created_at DESC");
$stmt->execute();
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>