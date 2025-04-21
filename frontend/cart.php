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
                session_start();

                if (!isset($_SESSION['user_id'])) {
                    header("Location: ../frontend/Log-in.php");
                    exit();
                }

                $user_id = $_SESSION['user_id'];

                
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cart page for user">
    <title>Your Cart</title>
    <link rel="icon" href='../Images/home/cart3.svg' type="image/x-icon">
    <link rel="stylesheet" href="..\styling\categories.css">
    <link rel="stylesheet" href="..\styling\cartStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // pop up for clear cart
        function openPop() {
            const popDialog = document.getElementById("popupDialog");
            popDialog.style.visibility = popDialog.style.visibility === "visible" ? "hidden" : "visible";
        }
        function toggleDropdown(button) {
                const dropdown = button.parentElement;
                dropdown.classList.toggle('active');
        }
        $(document).ready(function() {
            const mobileNavToggle = $('.mobile-nav-toggle');
            const navbar = $('#navbar');

            mobileNavToggle.on('click', function() {
                const visibility = navbar.attr('data-visible');
                navbar.attr('data-visible', visibility === "false" ? "true" : "false");
                mobileNavToggle.attr('aria-expanded', visibility === "false" ? "true" : "false");
            });        
        });
    </script>
</head>
<body>
<nav>
        <img src="../Images/LogoForLogin.png" alt="GrocerGo Logo" class="logo">
        
        <button class="mobile-nav-toggle" aria-controls="navbar" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>
    
        <ul id="navbar" class="navbar" data-visible="false">
        <li>
            <a href="../frontend/categories.php"><i class="bi bi-house"></i> Home</a>
        </li>
            <li>
                <div class="dropdown"> 
                    <button class="dropbtn" onclick="toggleDropdown(this)">
                        <i class="bi bi-grid"></i> Categories <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#shop-now"><i class="bi bi-grid-fill"></i> All Categories</a>
                        <a href="../frontend/bakery.php"><i class="bi bi-basket"></i> Bakery</a>
                        <a href="../frontend/beautyandpersonalcare.php"><i class="bi bi-brush"></i> Beauty & Personal Care</a>
                        <a href="../frontend/beverages.php"><i class="bi bi-cup-straw"></i></i> Beverages</a>
                        <a href="../frontend/butcheryandSeafood.php"><i class="bi bi-droplet"></i> Butchery & Seafood</a>
                        <a href="../frontend/cleaningandhousehold.php"><i class="bi bi-bucket"></i> Cleaning & Household</a>
                        <a href="../frontend/dairyandeggs.php"><i class="bi bi-egg"></i> Dairy & Eggs</a>
                        <a href="../frontend/frozenfood.php"><i class="bi bi-snow"></i> Frozen Food</a>
                        <a href="../frontend/fruitsandvegetables.php"><i class="bi bi-apple"></i> Fruits & Vegetables</a>
                        <a href="../frontend/healthyandorganic.php"><i class="bi bi-heart"></i> Healthy & Organic</a>
                        <a href="../frontend/pantryessentials.php"><i class="bi bi-box-seam"></i> Pantry Essentials</a>
                        <a href="../frontend/snacksandcandy.php"><i class="bi bi-cookie"></i></i> Snacks & Candy</a>
                        <a href="../frontend/tobacco.php"><i class="bi bi-fire"></i> Tobacco</a>
                    </div>
                </div>
            </li>
            
            <li>
                <a href="../frontend/Profile.php"><i class="bi bi-person-circle"></i> My Account</a>
            </li>
        </ul>
    </nav>

    <div class="cart-page" id="cart-page">
        <!-- shows the items in the cart: there are two scenarios: cart is empty and cart is not empty -->
            
            <?php
                // get items in user cart 
                $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
                $result = mysqli_query($conn, $sql);

                // if cart is empty
                if (mysqli_num_rows($result) === 0) {
            ?>
                    <div id="label" class="text-center">
                        <div class="empty-cart">
                        <img width="25%" src="../images/home/cart-img.jpg" alt="Shopping Cart" style="display: block; margin: 0 auto;" />
                            <h2>Your cart is empty.</h2>
                            <a href="../frontend/categories.php"> 
                                <button class="to-categories-button">Keep shopping</button>
                            </a>
                        </div>
                    </div>
            <?php
                }

                else {
                    // if cart is not empty, output data of each row
            ?>
                    
                    <div id="cart-items" class="cart-items">
                    <h3>My Cart</h3>
            <?php
                    $grand_total = 0;
                    // generate the cart items on the page
                    while($row = mysqli_fetch_assoc($result)) {
                        $total_price = (float)$row['quantity'] * (float)substr($row['product_price'], 1)
            ?>
            
                        <div class="cart-item">
                            <img src="<?= $row['product_img']?>" alt="<?= $row['product_name']?>">
                                <div class="details">
                                    <div class="title-x">
                                        <h4 class="title">
                                            <p><?= $row['product_name']?></p>
                                        </h4>
                                        <a href="../backend/cart-action.php?remove=<?= $row['id']?>"><i onclick="return confirm('Are you sure you want to remove this item?')" class="bi bi-x-lg remove-button"></i></a>
                                    </div>

                                    <div class="price-buttons">
                                        <p id="price">$<?= number_format($total_price, 2)?></p>

                                        <div class="cart-buttons">
                                            <a href="../backend/cart-action.php?decrement=<?= $row['id']?>&qty=<?= $row['quantity']?>">
                                                <i class="bi bi-dash-lg"></i>
                                            </a>
                                            <div id="<?= $row['id']?>" class="quantity"><?= $row['quantity']?></div>
                                            <a href="../backend/cart-action.php?increment=<?= $row['id']?>&qty=<?= $row['quantity']?>">
                                                <i class="bi bi-plus-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        <?php $grand_total += $total_price; ?>
                        </div> 
                    <?php } ?>
        </div>         

        <!-- shows the total price and go to checkout and empty cart buttons -->
        <div id="label" class="text-center">
            <div class="subtotal-buttons">
                <h2>Subtotal: $<?= number_format($grand_total, 2) ?></h2>
                <a href="../frontend/checkout.php">
                    <button class="checkout">Go to checkout</button>
                </a>
                <button onclick="openPop()" class="clear-all">Empty cart</button>
                
                <div id="popupDialog">
                    <div id="popup-content">
                        <p>Are you sure you want to empty your cart?</p>
                        <button onclick="openPop()">
                            No
                        </button>
                        <button onclick="openPop()">
                        <a href="../backend/cart-action.php?clear=all">Yes</a>
                        </button>
                    </div>
                </div>
            </div>
        </div> 
        <?php } ?>
    </div>
<script>
        function openPop() {
            const popDialog = document.getElementById("popupDialog");
            popDialog.style.visibility = popDialog.style.visibility === "visible" ? "hidden" : "visible";
        }
        
        function toggleDropdown(button) {
            const dropdown = button.parentElement;
            dropdown.classList.toggle('active');
        }
        
        $(document).ready(function() {
            const mobileNavToggle = $('.mobile-nav-toggle');
            const navbar = $('#navbar');

            mobileNavToggle.on('click', function() {
                const visibility = navbar.attr('data-visible');
                navbar.attr('data-visible', visibility === "false" ? "true" : "false");
                mobileNavToggle.attr('aria-expanded', visibility === "false" ? "true" : "false");
            });        
            
            // Add animation class when quantity changes
            $('.bi-plus-lg, .bi-dash-lg').on('click', function() {
                const quantityElement = $(this).closest('.cart-buttons').find('.quantity');
                quantityElement.addClass('changed');
                setTimeout(() => {
                    quantityElement.removeClass('changed');
                }, 300);
            });
            
            // Page load animation
            $('body').css('opacity', '0').animate({ opacity: 1 }, 600);
        });
    </script>
</body>
</html>