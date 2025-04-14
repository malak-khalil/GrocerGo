<?php
// dbinc.php

$host = 'localhost';       // or your DB host
$dbname = 'your_database'; // replace with your DB name
$user = 'your_username';   // replace with your DB username
$pass = 'your_password';   // replace with your DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // In production, you might want to log this instead
    die("Database connection failed: " . $e->getMessage());
}
?>
