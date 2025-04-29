<!DOCTYPE html> 
<html lang="en"> <!-- By Antonio Karam -->
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign-up</title>

    <style>
    /* by Antonio Karam */
      body, html {
          display: flex;
          justify-content: center;
    	  align-items: center;
	      height: 100vh;
          margin: 0;
          font-family: 'sans-serif';
      }

.outer_container {
            flex-direction: column;
            display: flex;
            justify-content: center;  
            align-items: center;
            padding: 20px;
            width: 400px;
            margin-top: 50px;
            background-color: #1E4A3B;
            border-radius: 25px;
box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.7), 
                0px 4px 8px rgba(0, 0, 0, 0.6);
      }

input[type="submit"]:hover {
  cursor: pointer;
  transform: scale(1.05); 
  transition: background-color 0.3s ease, transform 0.3s ease;
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

      
      .full_container {
            display: flex;
	    padding: 20px;
            justify-content: center;  
            align-items: center;
	    border-radius: 25px;    
            overflow: hidden;
                   
      }

      input[type="submit"]:hover {
    	cursor: pointer;
      }
      
      .eLabel{
        padding: 2px;
        display: block;
        text-align: center;
      }
      
      
      .signup-container {
          background: white;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
          text-align:center;
          width: 320px;
          overflow: hidden;
	  animation: fadeIn 1s ease-out;
      }

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

      
      input[type="text"], input[type="tel"], input[type="password"], input[type="email"] {
        display: block;
        margin: 0 auto; 
        width: 90%; 
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
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
    </style>
    
        
  </head>

  <body>
    <div class='background'></div>

    <div class="outer_container">
    <div class="full_container">
    <div class="signup-container">
      <h1>Sign up</h1>
      
      <form id="SignupForm" method="POST" onsubmit="return false;">
      <div id="errorMessage" style="display:none; color:red; margin-top:10px;"></div>
        <div class=eLabel>
        <label for="Fname">First name</label><br>
        <input type="text" id="Fname" name="Fname" required><br>
        </div>
        <div class=eLabel>
        <label for="Lname">Last name</label><br>
        <input type="text" id="Lname" name="Lname" required><br>
        </div>
        <div class=eLabel>
        <label for="Pnumber">Phone number</label><br>
        <input type="text" id="Pnumber" name="Pnumber" required><br>
        </div>
        <div class=eLabel>
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" required><br>
        </div>
        <div class=eLabel>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>
        </div>
        <div class=eLabel>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br><br>
        </div>
        <div class=eLabel>
        <label for="address">Address</label><br>
        <input type="text" id="address" name="address" required><br><br>
        </div>
        <input type="submit" value="Sign up"><br>
      </form>
    
    </div>
    </div>
    </div>
    <script>
  document.getElementById("SignupForm").addEventListener("submit", function(event) {
    event.preventDefault();
    submitSignupForm();
  });

  function submitSignupForm() {
    const Fname    = document.getElementById("Fname").value.trim();
    const Lname    = document.getElementById("Lname").value.trim();
    const Pnumber  = document.getElementById("Pnumber").value.trim();
    const username = document.getElementById("username").value.trim();
    const email    = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const address  = document.getElementById("address").value.trim();

    const errDiv   = document.getElementById("errorMessage");
    let errors      = [];

    if (!Fname) {
      errors.push("First name is required.");
    } else if (Fname.length < 2) {
      errors.push("First name must be at least 2 characters.");
    }

    if (!Lname) {
      errors.push("Last name is required.");
    } else if (Lname.length < 2) {
      errors.push("Last name must be at least 2 characters.");
    }

    if (!Pnumber) {
      errors.push("Phone number is required.");
    } else if (Pnumber.replace(/\D/g, "").length < 8) {
      errors.push("Phone number must have at least 8 digits.");
    }

    if (!username) {
      errors.push("Username is required.");
    } else if (username.length < 4) {
      errors.push("Username must be at least 4 characters.");
    }

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!email) {
      errors.push("Email is required.");
    } else if (email.length < 6) {
      errors.push("Email must be at least 6 characters.");
    } else if (!emailPattern.test(email)) {
      errors.push("Please enter a valid email address.");
    }


    if (!password) {
      errors.push("Password is required.");
    } else if (password.length < 8) {
      errors.push("Password must be at least 8 characters.");
    }

    if (!address) {
      errors.push("Address is required.");
    } else if (address.length < 5) {
      errors.push("Address must be at least 5 characters.");
    }

    if (errors.length) {
      errDiv.innerHTML     = errors.map(e => `<div>• ${e}</div>`).join("");
      errDiv.style.display = "block";
      return false;
    } else {
      errDiv.style.display = "none";
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../backend/Signup_handler.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
      if (xhr.status === 200) {
        try {
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            window.location.href = "Log-in.php";
          } else {
            errDiv.innerText     = response.message;
            errDiv.style.display = "block";
          }
        } catch (e) {
          console.error("JSON parse error", e);
          errDiv.innerText     = "Server error. Please try again.";
          errDiv.style.display = "block";
        }
      } else {
        console.error("Request failed with status:", xhr.status);
      }
    };

    const data =
      `Fname=${encodeURIComponent(Fname)}` +
      `&Lname=${encodeURIComponent(Lname)}` +
      `&Pnumber=${encodeURIComponent(Pnumber)}` +
      `&username=${encodeURIComponent(username)}` +
      `&email=${encodeURIComponent(email)}` +
      `&password=${encodeURIComponent(password)}` +
      `&address=${encodeURIComponent(address)}`;
    xhr.send(data);
  }
</script>

    
  </body>
</html>