<?php  // antonio karam
session_start();
require_once 'dbinc.php'; 


if (!isset($_SESSION['user_id'])) {
    header("Location: ../frontend/Log-in.php");
    exit();
}


if (isset($_POST['action'])) {
    if (isset($_POST['action']) && $_POST['action'] == 'saveProfile') {
        $user_id = $_SESSION['user_id'];
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $Pnumber = $_POST['Pnumber'];
        $address = $_POST['address'];
    

        $query = "UPDATE users SET Fname = ?, Lname = ?, phone = ?, address = ? WHERE ID = ?";
        $stmt = $pdo->prepare($query); 
        $stmt->execute([$Fname, $Lname, $Pnumber, $address, $user_id]);
    
        if ($stmt->rowCount() > 0) { 
            echo 'Profile updated successfully!';
        } else {
            echo 'Error updating profile or no changes made.';
        }
    }
    
}


if (isset($_GET['action']) && $_GET['action'] == 'loadProfile') {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT Fname, Lname, phone, username, Email, address FROM users WHERE ID = ?";
    $stmt = $pdo->prepare($query); 
    $stmt->execute([$user_id]);


    $row = $stmt->fetch(PDO::FETCH_ASSOC); 

    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'No user found.']); 
    }
}

?>
