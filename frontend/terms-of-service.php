<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - GrocerGo</title>
    <link rel="icon" href='../Images/home/cart3.svg' type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1E4A3B;
            --primary-dark: #16382c;
            --primary-light: #81C784;
            --secondary-color: #81C784;
            --text-light: #fff;
            --text-dark: #333;
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: #f9f9f9;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            background-color: var(--primary-dark);
            color: var(--text-light);
            padding: 60px 0 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(30, 74, 59, 0.9), rgba(30, 74, 59, 0.95));
            z-index: 0;
        }
        
        header .container {
            position: relative;
            z-index: 1;
        }
        
        .logo {
            height: 60px;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            animation: fadeIn 1s ease 0.3s both;
        }
        
        .last-updated {
            font-size: 0.9rem;
            opacity: 0.8;
            animation: fadeIn 1s ease 0.5s both;
        }
        
        .content {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin: -30px auto 50px;
            position: relative;
            z-index: 2;
            animation: slideUp 1s ease 0.7s both;
        }
        
        h2 {
            color: var(--primary-dark);
            margin: 30px 0 15px;
            font-size: 1.5rem;
            position: relative;
            padding-left: 15px;
        }
        
        h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 5px;
            height: 80%;
            width: 5px;
            background-color: var(--primary-light);
        }
        
        p, li {
            margin-bottom: 15px;
            font-size: 1rem;
            color: #555;
        }
        
        ul {
            padding-left: 20px;
        }
        
        li {
            margin-bottom: 8px;
        }
        
        .back-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            border: 2px solid var(--primary-color);
        }
        
        .back-btn:hover {
            background-color: transparent;
            color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInDown {
            from { 
                opacity: 0;
                transform: translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        footer {
            background-color: var(--primary-dark);
            color: var(--text-light);
            text-align: center;
            padding: 20px 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <img src="../Images/LogoForLogin.png" alt="GrocerGo Logo" class="logo">
            <h1>Terms of Service</h1>
            <p class="last-updated">Last Updated: April 10, 2025</p>
        </div>
    </header>
    
    <div class="container">
        <div class="content">
            <p>Welcome to GrocerGo! These Terms of Service ("Terms") govern your use of our website and services. By accessing or using our services, you agree to be bound by these Terms.</p>
            
            <h2>Account Registration</h2>
            <p>To place orders, you may need to create an account. You agree to provide accurate and complete information and to keep your account credentials secure.</p>
            
            <h2>Ordering and Payment</h2>
            <p>All orders are subject to product availability. We reserve the right to limit quantities and refuse service. Prices are subject to change without notice.</p>
            <p>You agree to pay all charges incurred by your account, including applicable taxes and delivery fees.</p>
            
            <h2>Delivery</h2>
            <p>We aim to deliver within the estimated timeframe, but delivery times are not guaranteed. Risk of loss passes to you upon delivery.</p>
            
            <h2>Returns and Refunds</h2>
            <p>Perishable goods cannot be returned. For non-perishable items, returns must be made within 7 days of delivery with proof of purchase.</p>
            
            <h2>User Conduct</h2>
            <p>You agree not to:</p>
            <ul>
                <li>Use our services for any illegal purpose</li>
                <li>Attempt to gain unauthorized access to our systems</li>
                <li>Interfere with the proper working of our services</li>
                <li>Submit false or misleading information</li>
            </ul>
            
            <h2>Intellectual Property</h2>
            <p>All content on our website, including text, graphics, logos, and images, is our property and protected by copyright laws.</p>
            
            <h2>Limitation of Liability</h2>
            <p>GrocerGo shall not be liable for any indirect, incidental, special, or consequential damages resulting from your use of our services.</p>
            
            <h2>Changes to Terms</h2>
            <p>We may modify these Terms at any time. Continued use of our services constitutes acceptance of the modified Terms.</p>
            
            <h2>Governing Law</h2>
            <p>These Terms shall be governed by the laws of Lebanon without regard to its conflict of law provisions.</p>
            
            <h2>Contact Us</h2>
            <p>For questions about these Terms, please contact us at <a href="mailto:legal@grocergo.com">legal@grocergo.com</a>.</p>
            
            <a href="../frontend/categories.php" class="back-btn">
                <i class="bi bi-arrow-left"></i> Back to Home
            </a>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <p>&copy; 2025 GrocerGo. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>