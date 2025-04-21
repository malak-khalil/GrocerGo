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
    <link href="..\styling\categories.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1E4A3B;
            --primary-dark: #1E4A3B;
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
            <img src="../Images/LogoForLogin.png" alt="GrocerGo Logo" class="logo">
        
        <button class="mobile-nav-toggle" aria-controls="navbar" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>
    
        <ul id="navbar" class="navbar" data-visible="false">
            
        <li>
                <a href="../frontend/categories.php"><i class="bi bi-person-circle"></i> Home</a>
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
                <a href="../frontend/cart.php" class="cart-link">
                    <div class="cart">
                        <i class="bi bi-cart3"></i>
                    </div> 
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </nav>

    <main class="main-content">
        <div class="profile-container">
            <h1>My Account</h1>
            
            <form id="profile-form" class="profile-form" onsubmit="return false;">
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
                    <input type="text" id="username" name="username"  placeholder="johndoe" readonly>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="john.doe@gmail.com" readonly>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" id="address" name="address" placeholder="Beirut, Hamra, Bliss Street">
                </div>
                
                <button type="button" class="btn btn-secondary" onclick="location.href='Change_pass.php'">Change Password</button>
                <button type="button" class="btn btn-primary" onclick="saveProfile()">Save Changes</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='../backend/logout.php'">Sign Out</button>
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

        

    function loadProfileData() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../backend/Profile-handler.php?action=loadProfile', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                var user = JSON.parse(xhr.responseText);
                document.getElementById('Fname').value = user.Fname;
                document.getElementById('Lname').value = user.Lname;
                document.getElementById('Pnumber').value = user.phone;
                document.getElementById('username').value = user.username;
                document.getElementById('email').value = user.Email;
                document.getElementById('address').value = user.address;
            }
        };
        xhr.send();
    }


    function saveProfile() {
        var Fname = document.getElementById('Fname').value;
        var Lname = document.getElementById('Lname').value;
        var Pnumber = document.getElementById('Pnumber').value;
        var address = document.getElementById('address').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../backend/Profile-handler.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert('Profile updated successfully!');
            } else {
                alert('Error updating profile!');
            }
        };
        xhr.send('action=saveProfile&Fname=' + encodeURIComponent(Fname) + '&Lname=' + encodeURIComponent(Lname) +
                 '&Pnumber=' + encodeURIComponent(Pnumber) + '&address=' + encodeURIComponent(address));
    }

    function signOut() {
        if (confirm("Are you sure you want to sign out?")) {
            window.location.href = "../frontend/Log-in.php";
        }
    }


    window.onload = function () {
        loadProfileData();
    };
    </script>
</body>
</html>