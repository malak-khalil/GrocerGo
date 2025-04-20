
<!-- Aya Al Saleh -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us - GrocerGo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="..\Images\home\cart3.svg" type="image/x-icon">
    <style>
        body {
            font-family: sans-serif;
            background-color: #1E4A3B;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2.8em;
            text-align: center;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 8px rgba(39, 174, 96, 0.3);
            animation: slideInFromTop 1s ease-out;
        }

        .container {
            background-color: #1E4A3B;
            width: 80%;
            margin: auto;
            text-align: center;
            padding: 40px 20px;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }

        .about-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            text-align: left;
            max-width: 800px;
            opacity: 0;
            transform: translateX(-50px);
            animation: slideIn 1s ease-out forwards 0.3s;
        }

        h2 {
            color: #1E4A3B;
            font-size: 1.8em;
            border-bottom: 3px solid #1E4A3B;
            padding-bottom: 5px;
            display: inline-block;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #34495e;
        }

        .back-link {
            display: inline-block;
            margin: 20px 10px 0;
            color: #1E4A3B;
            background: linear-gradient(135deg, white, white);
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(39, 174, 96, 0.4);
            text-decoration: none;
        }

        .back-link:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.6);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInFromTop {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .contact-info {
            margin-top: 20px;
            font-size: 18px;
            color: #555;
        }

        .contact-info a {
            color: #1E4A3B;
            text-decoration: none;
            font-weight: bold;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        .phone, .email {
            margin-bottom: 15px;
        }

        .contact-info i {
            margin-right: 10px;
            color: #1E4A3B;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        /* Team Section */
        .team-section {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 800px;
            text-align: center;
            animation: slideIn 1s ease-out forwards 0.4s;
        }

        .team-section h2 {
            color: #1E4A3B;
            margin-bottom: 20px;
        }

        .team-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .team-member {
            text-align: center;
            max-width: 180px;
        }

        .team-member img {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .team-member img:hover {
            transform: scale(1.05);
        }

        .team-member p {
            margin-top: 10px;
            font-size: 16px;
            color: #1E4A3B;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
<div class="logo-container">
            <img width="352px" src="..\Images\home\LogoForLogin.png" alt="GrocerGo Logo">
        </div>

               <h1>About Our Grocery Store</h1>

        <div class="about-box">
            <h2>About Us</h2>
            <p>GrocerGo was founded to offer a convenient and affordable shopping experience for everyone. We provide a wide selection of fresh produce, pantry staples, and household essentials. Our team works to deliver high-quality products sourced both locally and globally. At GrocerGo, customer satisfaction and convenience are at the core of everything we do.</p>
        </div>

        <div class="about-box">
            <h2>Vision</h2>
            <p>Our vision is to be the leading grocery destination for those who value quality, affordability, and convenience. We aim to make grocery shopping a seamless and enjoyable experience through both physical stores and online platforms. We are dedicated to expanding our selection of healthy, sustainable, and eco-friendly products.</p>
        </div>

        <div class="about-box">
            <h2>Mission</h2>
            <p>GrocerGo's mission is to provide high-quality products at competitive prices. We work with trusted suppliers and local farmers to ensure fresh, sustainable options. Our goal is to help people live healthier, more sustainable lives, offering an exceptional shopping experience both online and in-store.</p>
        </div>

        <div class="team-section">
            <h2>Meet the Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="../Images/home/aya.jpg" alt="Aya Al Saleh">
                    <p>Aya Al Saleh</p>
                </div>
                <div class="team-member">
                    <img src="../Images/home/malak.jpg" alt="Malak Khalil">
                    <p>Malak Khalil</p>
                </div>
                <div class="team-member">
                    <img src="../Images/home/antonio.jpg" alt="Antonio Karam">
                    <p>Antonio Karam</p>
                </div>
                <div class="team-member">
                    <img src="../Images/home/reina.jpg" alt="Reina Najjar">
                    <p>Reina Najjar</p>
                </div>
            </div>
        </div>
 
      <div class="about-box" id="contact-us">
    <h2>Contact Us</h2>
    <p>If you have any questions, suggestions, or feedback, feel free to reach out to us. We value our customers and strive to improve your shopping experience.</p>
    <div class="contact-info">
        <div class="phone">
            <i class="bi bi-telephone-fill"></i>
            <strong>Phone:</strong> <a href="tel:+71-233-806">+961 71 233 806</a>
        </div>
        <div class="email">
            <i class="bi bi-envelope-fill"></i>
            <strong>Email:</strong> <a href="mailto:contact.grocergo@gmail.com">contact.grocergo@gmail.com</a>
        </div>
        <div class="location">
            <i class="bi bi-geo-alt-fill"></i>
           <strong>Location:</strong> <span style="color: #1E4A3B; font-weight: bold;">Bliss Street, Hamra, Beirut, Lebanon</span>

        </div>
    </div>
</div>

        <a href="..\frontend\Reviews.php" class="back-link">Feedback</a>
        <a href="..\frontend\categories.php" class="back-link">Back to Home</a>
    </div>
</body>
</html>