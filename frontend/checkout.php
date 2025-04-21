<!-- Reina Najjar -->

<?php
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
    $user_id = 1;

?>

<?php
$addressErr = "";
$address = "";
$paymentMethodErr = "";
$paymentMethod = "";

// checks if address or payment method are empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["address"])) {
    $addressErr = "* Address is required";
  }

  else if (empty($_POST["payment-method"])) {
    $paymentMethodErr = "* Payment method is required";
  }

  // if all is well, delete cart items and go to reviews
  else {
    $sql = "DELETE FROM cart WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    header('location:../frontend/Reviews.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Checkout page for users done with shopping">
    <title>Checkout</title>
    <link rel="stylesheet" href="..\styling\checkoutStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <div class="top">
            <a href="..\frontend\cart.php"><i class="bi bi-arrow-left-circle"></i></a>
            <h1>Checkout</h1>
        </div>
    </header>

    <!-- contents of checkout page -->
    <div class="checkout-details">
        <!-- order summary -->
        <section>
            <div class="order-summary" id="order">
                <h2>Order Summary</h2>
            <?php
                // get items in user cart 
                $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
                $result = mysqli_query($conn, $sql);
                
                $grand_total = 0;
                // generate the order items on the page
                while($row = mysqli_fetch_assoc($result)) {
                    $total_price = (float)$row['quantity'] * (float)substr($row['product_price'], 1)
            ?>
                <div class="order-item">
                <h4><?= $row['product_name'] ?></h4>

                <div class="amount-price">
                    <p style="font-size: 1rem">Quantity: <?= $row['quantity'] ?></p>
                    <p id="price">$<?= number_format($total_price, 2) ?></p>
                </div>
        </div>
            <?php
                    $grand_total += $total_price;
                }
            ?>
            </div>
        </section>

        <!-- fill in details: address and payment method -->
        <section>
            <div class="address-paymentmethod-total">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
                <div class="wrapper">
                    
                        <div class="address">
                            <h3>Delivering to</h3>
                                <?php 
                                    $sql = "SELECT address FROM users WHERE id = '$user_id' LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <input type="text" name="address" value="<?= $row['address']?>" required/> 
                                <span class="error" style="color: red"><?php echo $addressErr;?></span>
                                <?php } ?>
                            <h4><br>Instructions for the driver</h4>
                            <textarea name="message" rows="2" cols="30"></textarea>
                        </div>

                        <hr width="75%">
                        
                        <div class="total" id="total">
                            <p>Subtotal: $<?= number_format($grand_total, 2) ?></p>
                            <p>Delivery Charge: $2</p>
                            <h3>Total: $<?= number_format($grand_total + 2, 2) ?></p>
                        </div>

                        <hr width="75%">

                        
                        <div class="payment-method">
                            <h3>Payment Method</h3>
                            <input type="radio" id="cash" name="payment-method" value="Cash" checked>
                            <label for="cash">Cash</label>
                            <br>
                            <input type="radio" name="payment-method" id="visa" value="Visa">
                            <label for="visa">Visa</label>
                            <br>
                            <input type="radio" name="payment-method" id="whish" value="Whish">
                            <label for="whish">Whish</label>
                            <br>
                            <span class="error" style="color: red"><?php echo $paymentMethodErr;?></span>
                        </div>

                        <hr width="75%">
                            
                        <div class="instructions">
                            <h3>Additional Instructions</h3>
                            <textarea name="message" rows="2" cols="30"></textarea>
                        </div>

                        <!-- place order -->
                        <a href="..\frontend\Reviews.php"><input type="submit" value="Place order" class="submit"/></a>
                    
                </div>
            </form>
            </div>
        </section>
    </div>
</body>
</html>