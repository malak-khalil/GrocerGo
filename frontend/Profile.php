<!-- By Antonio Karam -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - GrocerGo</title>
    <link rel="icon" href="../Images/home/cart3.svg" type="image/x-icon">
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
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--primary-dark);
            color: var(--text-dark);
            min-height: 100vh;
        }
        
        nav {
            width: 100%;
            background-color: var(--primary-dark);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .logo {
            height: 50px;
            width: auto;
            transition: var(--transition);
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .mobile-nav-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-light);
            font-size: 1.8rem;
            cursor: pointer;
            z-index: 9999;
        }
        
        .navbar {
            display: flex;
            list-style: none;
            gap: 25px;
            align-items: center;
        }
        
        .navbar a {
            color: var(--text-light);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            font-size: 1rem;
            position: relative;
	    text-decoration: none;
        }
        
        .navbar a:hover {
            color: var(--primary-light);
        }
        
        .navbar a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-light);
            transition: var(--transition);
        }
        
        .navbar a:hover::after {
            width: 100%;
        }
        
        .main-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 70px);
            padding: 40px 20px;
            animation: fadeIn 1s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .profile-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.8s ease 0.3s both;
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
        
        .profile-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
        }
        
        h1 {
            color: var(--primary-dark);
            margin-bottom: 25px;
            font-size: 2rem;
            text-align: center;
            position: relative;
        }
        
        h1::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--primary-light);
            margin: 10px auto 0;
            border-radius: 2px;
        }
        
        .profile-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .form-group {
            text-align: left;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: var(--primary-dark);
            font-weight: 500;
        }
        
        input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        input:focus {
            border-color: var(--primary-light);
            outline: none;
            box-shadow: 0 0 0 3px rgba(129, 199, 132, 0.3);
        }
        
        input[readonly] {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }
        
        .btn {
            display: inline-block;
            padding: 15px 25px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
            text-align: center;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-secondary {
            background-color: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }
        
        .btn-secondary:hover {
            background-color: #f5f5f5;
            transform: translateY(-3px);
        }
        
        .btn-danger {
            background-color: #e74c3c;
            color: white;
            margin-top: 10px;
        }
        
        .btn-danger:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
        }
        
        @media (max-width: 768px) {
            .profile-container {
                padding: 30px 20px;
            }
            
            .mobile-nav-toggle {
                display: block;
            }
            
            .navbar {
                position: fixed;
                inset: 0 0 0 30%;
                flex-direction: column;
                padding: min(30vh, 10rem) 2rem;
                background: var(--primary-dark);
                transform: translateX(100%);
                transition: transform 350ms ease-out;
                z-index: 999;
            }
            
            .navbar[data-visible="true"] {
                transform: translateY(0);
            }
        }
        
        @media (max-width: 480px) {
            .profile-container {
                padding: 25px 15px;
            }
            
            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="../frontend/categories.html">
            <img src="../Images/LogoForLogin.png" alt="GrocerGo Logo" class="logo">
        </a>
        
        <button class="mobile-nav-toggle" aria-controls="navbar" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>
    
        <ul id="navbar" class="navbar" data-visible="false">
            <li>
                <a href="../frontend/categories.html"><i class="bi bi-house"></i> Home</a>
            </li>
            <li>
                <a href="../frontend/cart.php"><i class="bi bi-cart3"></i> Cart</a>
            </li>
        </ul>
    </nav>
    
    <main class="main-content">
        <div class="profile-container">
            <h1>My Account</h1>
            
            <form class="profile-form" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="Fname">First Name</label>
                    <input type="text" id="Fname" name="Fname"  placeholder="John" required>
                </div>
                
                <div class="form-group">
                    <label for="Lname">Last Name</label>
                    <input type="text" id="Lname" name="Lname"  placeholder="Doe" required>
                </div>
                
                <div class="form-group">
                    <label for="Pnumber">Phone Number</label>
                    <input type="tel" id="Pnumber" name="Pnumber"  placeholder="+961 70 123 456" required>
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username"  placeholder="johndoe">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="john.doe@gmail.com">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" id="address" name="address" value="Beirut, Hamra, Bliss Street">
                </div>
                
                <button type="button" class="btn btn-secondary" onclick="location.href='ForgotPassword.php'">Forgot Password</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-danger">Sign Out</button>
            </form>
        </div>
    </main>
    
    <script>
        const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
        const navbar = document.getElementById('navbar');

        mobileNavToggle.addEventListener('click', () => {
            const visibility = navbar.getAttribute('data-visible');
            
            if (visibility === "false") {
                navbar.setAttribute('data-visible', "true");
                mobileNavToggle.setAttribute('aria-expanded', "true");
            } else {
                navbar.setAttribute('data-visible', "false");
                mobileNavToggle.setAttribute('aria-expanded', "false");
            }
        });

        function validateForm() {
            const fname = document.getElementById("Fname").value;
            const lname = document.getElementById("Lname").value;
            const phone = document.getElementById("Pnumber").value;
            const username = document.getElementById("username").value;

            if (!fname || !lname || !phone || !username) {
                alert("Please fill in all required fields.");
                return false;
            }

            const phonePattern = /^\+?[0-9\s\-]+$/;
            if (!phonePattern.test(phone)) {
                alert("Please enter a valid phone number.");
                return false;
            }

            alert("Your profile has been updated successfully!");
            return true;
        }

        document.querySelector('.btn-danger').addEventListener('click', function() {
            if (confirm("Are you sure you want to sign out?")) {
                window.location.href = "../frontend/Log-in.php";
            }
        });
    </script>
</body>
</html>