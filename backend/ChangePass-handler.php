<?php //Antonio Karam
session_start();
include('dbinc.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $use_id = true;
} elseif (isset($_SESSION['reset_email'])) {
    $reset_email = $_SESSION['reset_email'];
    $use_id = false;
} else {
    echo "Access denied. Please log in or reset password.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPass = $_POST['newPass'] ?? '';

    if (empty($newPass)) {
        echo "New password cannot be empty.";
        exit();
    }

    $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

    try {
        if ($use_id) {
            $stmt = $pdo->prepare("UPDATE users SET Password = :password WHERE ID = :id");
            $stmt->bindParam(':password', $hashedPass);
            $stmt->bindParam(':id', $user_id);
        } else {
            $stmt = $pdo->prepare("UPDATE users SET Password = :password WHERE Email = :email");
            $stmt->bindParam(':password', $hashedPass);
            $stmt->bindParam(':email', $reset_email);
        }

        $stmt->execute();

        if (!$use_id) unset($_SESSION['reset_email']);

        echo "success";
    } catch (PDOException $e) {
        echo "Error updating password: " . $e->getMessage();
    }
} else {
    echo "Invalid request method";
}
?>
