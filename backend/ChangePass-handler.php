<?php  // antonio karam
session_start();
include('dbinc.php');


if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newPass = $_POST['newPass'] ?? '';
    $confirmPass = $_POST['confirmPass'] ?? '';


    if ($newPass !== $confirmPass) {
        echo "New passwords do not match.";
        exit();
    }


    $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("UPDATE users SET Password = :password WHERE ID = :user_id");
        $stmt->bindParam(':password', $hashedPass);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();

        echo "success";
    } catch (PDOException $e) {

        echo "Error updating password: " . $e->getMessage();
    }
} else {
    echo "Invalid request method";
}
?>
