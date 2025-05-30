<?php //Aya al saleh
$host = 'localhost';       
$dbname = 'grocergo'; 
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $reviewText = $_POST['reviewText'] ?? '';
        $rating = $_POST['rating'] ?? 0;
        
        if (!empty($name) && !empty($reviewText) && $rating > 0) {
            $stmt = $pdo->prepare("INSERT INTO reviews (name, review_text, rating) VALUES (:name, :review, :rating)");
            $stmt->execute([
                ':name' => $name,
                ':review' => $reviewText,
                ':rating' => $rating
            ]);
            
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }
    
    $stmt = $pdo->query("SELECT * FROM reviews ORDER BY created_at DESC");
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Reviews - GrocerGo</title>
    <link rel="icon" href='../Images/home/cart3.svg' type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1E4A3B;
            --primary-dark: #16382c;
            --primary-light: #81C784;
            --text-light: #fff;
            --text-dark: #333;
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--primary-dark);
            color: white;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            animation: fadeIn 1s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 0; 
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            animation: slideInDown 0.8s ease;
        }
        
        @keyframes slideInDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        h1 {
            font-size: 2.5rem;
            margin: 20px 0;
            text-align: center;
            color: var(--text-light);
            animation: fadeIn 1s ease 0.3s both;
        }
        
        .review-section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 30px;
            margin-bottom: 30px;
            margin-top: 0; 
            animation: slideInUp 0.8s ease 0.5s both;
        }
        
        @keyframes slideInUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .review {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary-light);
            transition: var(--transition);
        }
        
        .review:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .review strong {
            color: var(--primary-dark);
            font-size: 1.1rem;
        }
        
        .review p {
            color: #555;
            margin: 10px 0 0;
            line-height: 1.5;
        }
        
        .stars {
            font-size: 1.5rem;
            margin-top: 10px;
        }
        
        .stars i {
            color: var(--primary-color);
        }
        
        .stars .bi-star-fill {
            color: gold;
        }
        
        .add-review {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: slideInUp 0.8s ease 0.7s both;
        }
        
        .add-review h2 {
            color: var(--primary-dark);
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }
        
        input, textarea {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        input:focus, textarea:focus {
            border-color: var(--primary-light);
            outline: none;
            box-shadow: 0 0 0 3px rgba(129, 199, 132, 0.3);
        }
        
        .rating-container {
            display: flex;
            justify-content: center;
            margin: 15px 0;
        }
        
        .star {
            cursor: pointer;
            font-size: 2rem;
            margin: 0 5px;
            transition: var(--transition);
            position: relative;
        }
        
        .star i {
            transition: var(--transition);
        }
        
        .star .bi-star {
            color: var(--primary-color);
        }
        
        .star .bi-star-fill {
            position: absolute;
            left: 0;
            opacity: 0;
            color: gold;
        }
        
        .star:hover .bi-star,
        .star.active .bi-star {
            opacity: 0;
        }
        
        .star:hover .bi-star-fill,
        .star.active .bi-star-fill {
            opacity: 1;
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 20px;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: transparent;
            color: white;
            border: 2px solid white;
            margin-top: 30px;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
        }
        
        .btn-back:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        #thankYouMessage {
            display: none;
            text-align: center;
            color: var(--primary-dark);
            font-weight: 600;
            margin-top: 20px;
            animation: fadeIn 0.8s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img width="300px" src="../Images/LogoForLogin.png" alt="GrocerGo Logo">
        </div>

        <h1>Customer Reviews</h1>

        <div class="review-section">
            <div id="reviews">
                <?php if (empty($reviews)): ?>
                    <p>No reviews yet. Be the first to review!</p>
                <?php else: ?>
                    <?php foreach ($reviews as $review): ?>
                        <div class="review">
                            <strong><?php echo htmlspecialchars($review['name']); ?></strong>
                            <p><?php echo htmlspecialchars($review['review_text']); ?></p>
                            <div class="stars">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="bi bi-star<?php echo $i <= $review['rating'] ? '-fill' : ''; ?>"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="add-review">
            <h2>Add Your Review</h2>
            <form method="POST" action="">
                <input type="text" id="name" name="name" placeholder="Your Name" required>
                <textarea id="reviewText" name="reviewText" rows="4" placeholder="Your review..." required></textarea>
                
                <div class="rating-container">
                    <span class="star" data-value="1">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                    <span class="star" data-value="2">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                    <span class="star" data-value="3">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                    <span class="star" data-value="4">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                    <span class="star" data-value="5">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                </div>
                
                <input type="hidden" name="rating" id="rating" value="0" required>
                
                <button class="btn" type="submit">Submit Review</button>
            </form>
        </div>

        <a href="../frontend/categories.php" class="btn btn-back">
            <i class="bi bi-arrow-left"></i> Back to Home
        </a>
    </div>

    <script>
        let selectedRating = 0;
        const stars = document.querySelectorAll(".rating-container .star");

        stars.forEach(star => {
            star.addEventListener("click", function() {
                selectedRating = parseInt(this.getAttribute("data-value"));
                document.getElementById("rating").value = selectedRating;
                highlightStars(selectedRating);
            });

            star.addEventListener("mouseover", function() {
                const hoverRating = parseInt(this.getAttribute("data-value"));
                highlightStars(hoverRating, true);
            });

            star.addEventListener("mouseout", function() {
                highlightStars(selectedRating);
            });
        });

        function highlightStars(rating, isHover = false) {
            stars.forEach(star => {
                const starValue = parseInt(star.getAttribute("data-value"));
                const emptyStar = star.querySelector('.bi-star');
                const filledStar = star.querySelector('.bi-star-fill');

                if (starValue <= rating) {
                    if (isHover) {
                        emptyStar.style.opacity = '0';
                        filledStar.style.opacity = '1';
                    } else {
                        star.classList.add("active");
                        emptyStar.style.opacity = '0';
                        filledStar.style.opacity = '1';
                    }
                } else {
                    star.classList.remove("active");
                    emptyStar.style.opacity = '1';
                    filledStar.style.opacity = '0';
                }
            });
        }
    </script>
</body>
</html>