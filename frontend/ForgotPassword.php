<!-- By Antonio Karam --> 
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../frontend/Log-in.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - GrocerGo</title>
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
   

    <main class="main-content">
        <div class="profile-container">
            <h1>Forgot Password</h1>
            <div id="message" style="display:none; margin-bottom: 20px; padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center;">
            Email sent! Redirecting...
            </div>
            <form class="profile-form" onsubmit="return validateForgotPasswordForm()">
                <div class="form-group">
                    <label for="email">Enter your email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your registered email" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>

    <script>
        const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
        const navbar = document.getElementById('navbar');

        mobileNavToggle.addEventListener('click', () => {
            const visibility = navbar.getAttribute('data-visible');
            navbar.setAttribute('data-visible', visibility === "false" ? "true" : "false");
            mobileNavToggle.setAttribute('aria-expanded', visibility === "false");
        });

        function validateForgotPasswordForm() {
            const email = $("#email").val().trim();

            if (email === "") {
                alert("Please enter your email address.");
                return false;
            }

            $("#message").fadeIn();


            setTimeout(function() {
                window.location.href = "Change_pass.php";
            }, 2000);

            return false; 
        }

    </script>
</body>
</html>
