<?php
session_start();
session_unset();
session_destroy();
setcookie(session_name(), '', time() - 3600, '/'); // Optional: clear session cookie

// Redirect to login page (adjust path as needed)
header("Location: ../frontend/categories.php"); 
exit();
?>
