<?php  // Reina Najjar
$host = "localhost";
$user = "root";
$password = "";
$dbname = "grocergo";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// get current user id
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../frontend/Log-in.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// to remove item from cart
if(isset($_GET['remove'])) {
  $id = $_GET['remove'];

  $sql = "DELETE FROM cart WHERE id='$id' AND user_id = '$user_id'";
  $result = mysqli_query($conn, $sql);
  header('location:../frontend/cart.php');
}

// to clear the cart 
if (isset($_GET['clear'])) {
  $sql = "DELETE FROM cart WHERE user_id = '$user_id'";
  $result = mysqli_query($conn, $sql);
  header('location:../frontend/cart.php');
}

// to decrement quantity of an item
if (isset($_GET['decrement'])) {
  $id = $_GET['decrement'];
  $qty = (string) ((int)$_GET['qty'] - 1);

  if ((int)$qty === 0) {
    $sql = "DELETE FROM cart WHERE id='$id' AND user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
  }
  else {
    $sql = "UPDATE cart SET quantity='$qty' WHERE id='$id' AND user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
  }
  
  header('location:../frontend/cart.php');
}

// to increment quantity of item
if (isset($_GET['increment'])) {
  $id = $_GET['increment'];
  $qty = (string) ((int)$_GET['qty'] + 1);

  $sql = "UPDATE cart SET quantity='$qty' WHERE id='$id' AND user_id = '$user_id'";
  $result = mysqli_query($conn, $sql);
  header('location:../frontend/cart.php');
}
?>