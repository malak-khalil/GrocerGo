<?php   
    require '../backend/add-to-cart.php';
?>

<!-- malak khalil -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrocerGo - Online Grocery Delivery Service</title>
    <meta name="description" content="GrocerGo - Your fastest way to get groceries delivered. Fresh produce, pantry staples, and household essentials delivered to your door in Beirut.">
    <link rel="icon" href='../Images/home/cart3.svg' type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../styling/items.css" rel="stylesheet">
    <link href="../styling/categories.css" rel="stylesheet">
</head>
<body>
    <nav>
        <img src="../Images/LogoForLogin.png" alt="GrocerGo Logo" class="logo">
        
        <button class="mobile-nav-toggle" aria-controls="navbar" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>
    
        <ul id="navbar" class="navbar" data-visible="false">
            <li>
                <div class="dropdown"> 
                    <button class="dropbtn">
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
            <li>
                <a href="../frontend/cart.php" class="cart-link">
                    <div class="cart">
                        <i class="bi bi-cart3"></i>
                    </div> 
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="info-bar">
        <div class="time-location">
            <div class="info-item">
                <i class="bi bi-stopwatch"></i>
                <span style="font-weight: bold;">Open hours: 8 AM - 12 AM</span>
            </div>
        </div>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search for products...">
            <button class="search-btn" id="searchButton"><i class="bi bi-search"></i> Search</button>
        </div>
    </div>
    
    <div class="search-results" id="searchResults">
        <div class="search-results-container" id="searchResultsContainer"></div>
    </div>
    
    <main>
        <section class="hero-section">
            <img src="../Images/home/landing.jpg" alt="Fresh groceries" class="hero-image">
            <div class="hero-overlay"></div>
            <div class="hero-content container">
                <h1 class="hero-title">Groceries Delivered to Your Door in Minutes</h1>
                <p class="hero-subtitle">Fresh produce, pantry staples, and household essentials - all just a click away</p>
                <a href="#shop-now" class="btn btn-primary hero-cta">Shop Now</a>
            </div>
        </section>
        
        <section class="features-section">
            <div class="container">
                <h2 class="section-title">Why Choose GrocerGo</h2>
                <p class="section-subtitle">We make grocery shopping convenient, fast, and affordable</p>
                
                <div class="features-container">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <h3>Fast Delivery</h3>
                        <p>Get your groceries delivered in as little as 30 minutes with our express service.</p>
                    </div>
                    
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <h3>Best Prices</h3>
                        <p>Competitive prices with weekly discounts and special offers on your favorite items.</p>
                    </div>
                    
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <h3>Quality Guaranteed</h3>
                        <p>We carefully select all our products to ensure you get only the freshest and highest quality items.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="categories-section" id="shop-now">
            <div class="container">
                <div class="categories-header">
                    <h2 class="categories-title">
                        <i class="bi bi-shop"></i> Shop by Category
                    </h2>
                </div>
                
                <div class="category-container">
                    <a href="fruitsandvegetables.php" class="category-box">
                        <img src="../images/category/fruitsandvegetables.jpg" alt="Fruits and Vegetables" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Fruits & Vegetables</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="butcheryandSeafood.php" class="category-box">
                        <img src="../images/category/butcheryandseafood.jpg" alt="Butchery & Seafood" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Butchery & Seafood</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="dairyandeggs.php" class="category-box">
                        <img src="../images/category/dairyandeggs.jpg" alt="Dairy & Eggs" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Dairy & Eggs</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="bakery.php" class="category-box">
                        <img src="../images/category/bakery.jpg" alt="Bakery" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Bakery</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="pantryessentials.php" class="category-box">
                        <img src="../images/category/pantryessentials.jpg" alt="Pantry Essentials" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Pantry Essentials</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="beverages.php" class="category-box">
                        <img src="../images/category/beverages.jpg" alt="Beverages" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Beverages</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="frozenfood.php" class="category-box">
                        <img src="../images/category/frozenfood.jpg" alt="Frozen Food" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Frozen Food</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="snacksandcandy.php" class="category-box">
                        <img src="../images/category/snacksandcandy.jpg" alt="Snacks & Candy" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Snacks & Candy</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="healthyandorganic.php" class="category-box">
                        <img src="../images/category/healthyandorganic.jpg" alt="Healthy & Organic" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Healthy & Organic</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="beautyandpersonalcare.php" class="category-box">
                        <img src="../images/category/beautyandpersonalcare.jpg" alt="Beauty & Personal Care" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Beauty & Personal Care</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="cleaningandhousehold.php" class="category-box">
                        <img src="../images/category/cleaningandhousehold.jpg" alt="Cleaning & Household" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Cleaning & Household</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                    <a href="tobacco.php" class="category-box">
                        <img src="../images/category/tobacco.jpg" alt="Tobacco" class="category-image">
                        <div class="category-overlay">
                            <h3 class="category-name">Tobacco</h3>
                            <span class="category-link">Shop Now <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </section>
<section class="promotions-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="bi bi-percent"></i> Today's Special Offers
            </h2>
            <p class="section-subtitle">Limited-time discounts on popular items</p>
        </div>
        
        <div class="promotions-container" id="promotionsContainer">
            <div class="loading">
                <i class="bi bi-arrow-repeat"></i>
                <p>Loading promotions...</p>
            </div>
        </div>
    </div>
</section>
</section>
        <section class="testimonials-section">
            <div class="container">
                <h2 class="section-title">What Our Customers Say</h2>
                <p class="section-subtitle">Don't just take our word for it - hear from our satisfied customers</p>
                
                <div class="testimonials-container">
                    <div class="testimonial">
                        <p>"GrocerGo has completely changed how I shop for groceries. The delivery is always on time and the produce is fresh every time!"</p>
                        <p><strong>- Sarah T., Beirut</strong></p>
                    </div>
                    
                    <div class="testimonial">
                        <p>"I love the convenience of ordering from my phone and having everything delivered to my office. The customer service is excellent too!"</p>
                        <p><strong>- Michael K., Beirut</strong></p>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="location-section">
            <div class="container">
                <h2 class="section-title">Our Location</h2>
                <p class="section-subtitle">Visit us at our store in Hamra, Beirut</p>
                
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.783434600378!2d35.50172231521072!3d33.89554398065556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f17215880a78f%3A0x729182bae99836b4!2sBliss%20St%2C%20Beirut!5e0!3m2!1sen!2slb!4v1620000000000!5m2!1sen!2slb" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                    <div class="location-info">
                        <h3>GrocerGo Store</h3>
                        <p><i class="bi bi-geo-alt"></i> Bliss Street, Hamra, Beirut, Lebanon</p>
                        <p><i class="bi bi-telephone"></i> +961 71 233 806</p>
                        <p><i class="bi bi-envelope"></i> contact.grocergo@gmail.com</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="app-download">
            <h2>Get the GrocerGo App</h2>
            <p>Download our app for exclusive deals and easier shopping experience</p>
            <div class="app-buttons">
                <a href="#" class="app-btn"><i class="bi bi-apple"></i> App Store</a>
                <a href="#" class="app-btn"><i class="bi bi-google-play"></i> Google Play</a>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="footer-links">
            <a href="../frontend/About.php">About Us</a>
            <a href="../frontend/Reviews.php">Feedback</a>
            <a href="..\frontend\privacy-policy.php">Privacy Policy</a>
            <a href="..\frontend\terms-of-service.php">Terms of Service</a>
            <a href="../frontend/About.php#contact-us">Contact Us</a>
        </div>
        
        <div class="social-icons">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter-x"></i></a>
        </div>
        
        <p>&copy; 2025 GrocerGo. All rights reserved.</p>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../javascript/categories.js"></script>
</body>
</html>