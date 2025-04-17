<?php 
include('../backend/dbinc.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Fname = $_POST['Fname'] ?? '';
  $Lname = $_POST['Lname'] ?? '';
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $username = $_POST['username'] ?? '';
  $phone = $_POST['Pnumber'] ?? '';  // Changed from $Pnumber to $phone to match the column name
  $address = $_POST['address'] ?? '';

  // Check if email already exists
  try {
      $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = :email");  // 'Email' column name matches DB schema
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($user) {
          echo json_encode(['success' => false, 'message' => 'Email already in use.']);
          exit;
      }
  } catch (PDOException $e) {
      // Log error if SQL fails
      error_log("Error checking email: " . $e->getMessage());
      echo json_encode(['success' => false, 'message' => 'Database error during email check.']);
      exit;
  }

  // Hash the password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Insert user data into the database
  try {
      $insertStmt = $pdo->prepare("
          INSERT INTO users (Fname, Lname, Email, Password, username, phone, address)
          VALUES (:Fname, :Lname, :email, :password, :username, :phone, :address)
      ");

      // Bind parameters
      $insertStmt->bindParam(':Fname', $Fname);
      $insertStmt->bindParam(':Lname', $Lname);
      $insertStmt->bindParam(':email', $email);
      $insertStmt->bindParam(':password', $hashedPassword);
      $insertStmt->bindParam(':username', $username);
      $insertStmt->bindParam(':phone', $phone);  // 'phone' instead of 'Pnumber'
      $insertStmt->bindParam(':address', $address);

      // Execute the query and return success/failure response
      if ($insertStmt->execute()) {
          echo json_encode(['success' => true, 'message' => 'Signup successful!']);
      } else {
          echo json_encode(['success' => false, 'message' => 'Error during signup.']);
      }
  } catch (PDOException $e) {
      // Log error if SQL fails
      error_log("Error inserting user data: " . $e->getMessage());
      echo json_encode(['success' => false, 'message' => 'Database error during signup.']);
  }
}
?>
