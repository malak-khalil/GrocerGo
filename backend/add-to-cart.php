<?php   // Reina Najjar
$host = "localhost";
$user = "root";
$password = "";
$dbname = "grocergo";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();



if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../frontend/Log-in.php");
        exit();
    }
    
    $user_id = $_SESSION['user_id'];
    
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_id = '$product_id' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($select_cart) > 0){
        mysqli_query($conn, "UPDATE cart SET quantity='$product_quantity' WHERE product_id = '$product_id' AND user_id = '$user_id'");
    }else{
        mysqli_query($conn, "INSERT INTO cart (user_id, product_id, product_name, product_img, product_price, quantity) VALUES('$user_id', '$product_id', '$product_name', '$product_image', '$product_price', '$product_quantity')") or die('query failed');
    }
}
 

?>