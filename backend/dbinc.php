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
?>
