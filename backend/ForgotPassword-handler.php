<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection settings
    $host = 'localhost';
    $dbname = 'grocergo';
    $username = 'root';  // Update with your database username
    $password = '';      // Update with your database password

    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get the email from the AJAX request
        $email = $_POST['email'];

        // Check if the email exists in the database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Generate a unique token for the password reset
            $resetToken = bin2hex(random_bytes(16));  // Generates a random token
            $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Expiry time (1 hour from now)

            // Store the reset token and expiry time in the database
            $updateStmt = $pdo->prepare("UPDATE users SET reset_token = :resetToken, reset_expiry = :expiry WHERE Email = :email");
            $updateStmt->bindParam(':resetToken', $resetToken);
            $updateStmt->bindParam(':expiry', $expiry);
            $updateStmt->bindParam(':email', $email);
            $updateStmt->execute();

            // Prepare the reset password email
            $resetLink = "http://yourdomain.com/Change_pass.html?token=" . $resetToken; // Replace with your domain

            $subject = "Password Reset Request";
            $message = "Hello " . $user['Fname'] . ",\n\n";
            $message .= "We received a request to reset your password. Please click the link below to change your password:\n";
            $message .= $resetLink . "\n\n";
            $message .= "If you did not request this, please ignore this email.\n";
            $message .= "The link will expire in 1 hour.\n";

            // Send the email
            $headers = "From: no-reply@grocergo.com\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            if (mail($email, $subject, $message, $headers)) {
                echo json_encode(['success' => true, 'message' => 'Password reset email has been sent.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to send password reset email.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Email address not found.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
}
?>
