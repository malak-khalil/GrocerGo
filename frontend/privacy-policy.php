<!--Malak khalil-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - GrocerGo</title>
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
            <h1>Privacy Policy</h1>
            <p class="last-updated">Last Updated: April 10, 2025</p>
        </div>
    </header>
    
    <div class="container">
        <div class="content">
            <p>At GrocerGo, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services.</p>
            
            <h2>Information We Collect</h2>
            <p>We may collect personal information that you voluntarily provide to us when you:</p>
            <ul>
                <li>Register an account</li>
                <li>Place an order</li>
                <li>Subscribe to our newsletter</li>
                <li>Contact customer support</li>
                <li>Participate in surveys or promotions</li>
            </ul>
            <p>The types of personal information we collect may include your name, email address, phone number, delivery address, payment information, and order history.</p>
            
            <h2>How We Use Your Information</h2>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Process and fulfill your orders</li>
                <li>Communicate with you about your account or orders</li>
                <li>Improve our products and services</li>
                <li>Personalize your shopping experience</li>
                <li>Send promotional offers (with your consent)</li>
                <li>Prevent fraud and enhance security</li>
            </ul>
            
            <h2>Data Security</h2>
            <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
            
            <h2>Third-Party Services</h2>
            <p>We may employ third-party companies to facilitate our services (payment processing, delivery, analytics). These third parties have access to your information only to perform specific tasks on our behalf.</p>
            
            <h2>Your Rights</h2>
            <p>You have the right to:</p>
            <ul>
                <li>Access, update, or delete your personal information</li>
                <li>Opt-out of marketing communications</li>
                <li>Withdraw consent where applicable</li>
                <li>Lodge a complaint with a data protection authority</li>
            </ul>
            
            <h2>Changes to This Policy</h2>
            <p>We may update our Privacy Policy periodically. We will notify you of any changes by posting the new policy on this page and updating the "Last Updated" date.</p>
            
            <h2>Contact Us</h2>
            <p>If you have questions about this Privacy Policy, please contact us at <a href="mailto:privacy@grocergo.com">privacy@grocergo.com</a>.</p>
            
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