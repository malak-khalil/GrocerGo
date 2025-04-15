
<!DOCTYPE html> 
<html lang="en"> <!-- By Antonio Karam -->
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
    <style>
    /* by Antonio Karam */
      body, html {
          display: flex;
          justify-content: center;
          margin: 0;
          font-family: 'sans-serif';
      }

	.background {
	  transform: scale(1.1);
          position: fixed;  
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
	  background-color: rgba(0, 0, 0, 0.4);
          background-image: url("https://www.shutterstock.com/image-photo/healthy-food-vegetables-fruits-on-260nw-1088525144.jpg");
          background-size: cover;
          background-position: center;
	  filter: blur(4px);
	  z-index: -1; 
      }
	
	  	

      a {
        
        color: #1E4A3B; 
        
      }
      
      .full_container {
	    flex-direction: column;
            display: flex;
            justify-content: center;  
            align-items: center;
            padding: 20px;
      }
      
      .outer_container {
	    flex-direction: column;
            display: flex;
            justify-content: center;  
            align-items: center;
            padding: 20px;
            width:400px;
            margin-top: 50px;
            background-color: #1E4A3B;
            border-radius: 25px;
box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.7), 
                0px 4px 8px rgba(0, 0, 0, 0.6);
      }
      
      .eLabel{
        padding: 2px;
        display: block;
        text-align: center;
      }
      
      
      .login-container {
          background: white;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
          text-align:center;
          width: 320px;
      }
      
      input[type="text"], input[type="password"], input[type="email"] {
        display: block;
        margin: 0 auto;
        width: 80%; 
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
      }
		
      input[type="submit"]:hover {
    	cursor: pointer;
      }

      
      input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #1E4A3B;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 5px;
            text-decoration: none;
            display: inline-block;
      }


@keyframes fadeInLogo {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

      
      .logo {
	animation: fadeInLogo 1s ease-out;
        width: 300px;  
        height: auto;  
        object-fit: contain;
        display: block;
        margin: 0 auto 20px auto; 
      }

input[type="submit"]:hover {
  background-color:#1E4A3B;
  cursor: pointer;
  transform: scale(1.05); 
  transition: background-color 0.3s ease, transform 0.3s ease;
}
    </style>
    
        
  </head>

  <body>

    <div class='background'></div>
    
    <div class='outer_container'>
    <div class="full_container">
    <img src="..\Images\LogoForLogin.png" alt="Logo" class="logo">
    <div class="login-container">
      <h1>Log in</h1>

      <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
      <?php endif; ?>

      <p id="errorMessage" style="color: red; display: none;"></p>
      
      <form id="loginForm" method="POST" onsubmit="return false;">
        <div class=eLabel>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>
        </div>
        <div class=eLabel>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br><br>
	<a href="ForgotPassword.html" style="font-size: 0.9em; color: #1E4A3B; display: block; margin-bottom: 10px;">Forgot Password?</a>
        </div>
        <input type="submit" value="Log in"><br>
      </form>
    
      <p>Don't have an account?</p>
      <a href="Sign-up.php">Sign Up</a>
    </div>
    </div>
    </div>

    <script>
      console.log("Login script loaded");

    document.getElementById("loginForm").addEventListener("submit", function(event) {
      event.preventDefault();  // Prevent form submission from refreshing the page
      submitLoginForm();       // Call the login form submission function
    });

     function submitLoginForm() {
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;


        if (!email || !password) {
          alert("Both fields are required.");
          return false;
        }

        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
          alert("Please enter a valid email address.");
          return false;
        }


        const xhr = new XMLHttpRequest();
      xhr.open("POST", "../backend/Login-handler.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      const data = `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`;

      xhr.onload = function() {
        if (xhr.status === 200) {
          try {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
              window.location.href = "categories.html";
            } else {
              document.getElementById("errorMessage").innerText = response.message;
              document.getElementById("errorMessage").style.display = "block";
            }
          } catch (e) {
            console.error("JSON parse error", e);
            document.getElementById("errorMessage").innerText = "Server error. Please try again.";
            document.getElementById("errorMessage").style.display = "block";
          }
        } else {
          console.error("Request failed with status:", xhr.status);
        }
      };

      xhr.send(data);
    }

    </script>
    
  </body>
</html>