<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
  <head>
  <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- <link href="main.css" rel="stylesheet"> -->

    <style>
/* ===== Google Font Import - Poformsins ===== */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-image: url(registerback.jpg);
}

.container {
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  border-radius: 10px;
   border:2px solid #504646;
  box-shadow: 0 10px 20px #504646;
  overflow: hidden;
  margin: 0 20px;
}

.container .forms {
  display: flex;
  align-items: center;
  height: 440px;
  width: 200%;
  transition: height 0.2s ease;
}

.container .form {
  width: 50%;
  padding: 30px;
  background-color: #fff;
  transition: margin-left 0.18s ease;
}

.container.active .login {
  margin-left: -50%;
  opacity: 0;
  transition: margin-left 0.18s ease, opacity 0.15s ease;
}

.container .signup {
  opacity: 0;
  transition: opacity 0.09s ease;
}
.container.active .signup {
  opacity: 1;
  transition: opacity 0.2s ease;
}

.container.active .forms {
  height: 600px;
}
.container .form .title {
  position: relative;
  font-size: 27px;
  font-weight: 600;
}

.form .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  background-color: #114E5E;
  border-radius: 25px;
}

.form .input-field {
  position: relative;
  height: 50px;
  width: 100%;
  margin-top: 30px;
}

.input-field input {
  position: absolute;
  height: 100%;
  width: 100%;
  padding: 0 35px;
  border: none;
  outline: none;
  font-size: 16px;
  border-bottom: 2px solid #ccc;
  border-top: 2px solid transparent;
  transition: all 0.2s ease;
}

.input-field input:is(:focus, :valid) {
  border-bottom-color:#114E5E;
}

.input-field i {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  color: #999;
  font-size: 23px;
  transition: all 0.2s ease;
}

.input-field input:is(:focus, :valid) ~ i {
  color:#114E5E;
}

.input-field i.icon {
  left: 0;
}
.input-field i.showHidePw {
  right: 0;
  cursor: pointer;
  padding: 10px;
}

.form .checkbox-text {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 20px;
}

.checkbox-text .checkbox-content {
  display: flex;
  align-items: center;
}

.checkbox-content input {
  margin-right: 10px;
  accent-color:#114E5E;
}

.form .text {
  color: #333;
  font-size: 14px;
}

.form a.text {
  color:#114E5E;
  text-decoration: none;
}
.form a:hover {
  text-decoration: underline;
}

.form .button {
  margin-top: 35px;
}

.form .button input {
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  letter-spacing: 1px;
  border-radius: 6px;
  background-color: #114E5E;
  cursor: pointer;
  transition: all 0.3s ease;
}

.button input:hover {
  background-color: #114E5E;
}

.form .login-signup {
  margin-top: 30px;
  text-align: center;
}

</style>


  </head>
  <body>
  <div class="container active" style="padding: top 0%;">
      <div class="forms" >
          <div class="form signup" >
              <a href="login1.php"><img src="cross.svg" alt="" style="object-fit:contain;height:30px;float:right; "></a>
              <span class="title">Sign-up</span>
              <form method="POST" action="register.php">   
                  
 
    <div  >
    <div class="input-field">
                <!-- <label for="name">Enter Name</label> -->
                <input type="text" placeholder="Name" id="name" name="name" required>
                <i class="uil uil-user icon"></i>
            </div>
            <div class="input-field">
                <!-- <label for="username">User Name</label> -->
                <input type="text" placeholder="Create User Name minimum 4 character" id="username" name="username" required>
                <i class="uil uil-user-md icon"></i>
            </div>
            <div class="input-field">
                <!-- <label for="password">Password</label> -->
                <input type="password" placeholder="Password length 6 with symbol eg.abc@123" id="password" name="password" required>
                <i class="uil uil-lock icon"></i>
            </div>
            <div class="input-field">
            <button type="submit" class="input-field button" style="background-color:#114E5E;color: white;" onclick="ct();">Submit</button>
</div>
<br>
            <!-- <p>To Go Login Page :</p>
            <a href="login.php" class="login-button">Login</a> -->
            <div class="login-signup">

            <span class="text"
              >Already a member?
              <a href="login1.php" class="text">Login Now</a>
             
            </span>
        </form>
    </div>
</div>
</div>

  </body>
</html>
 <?php

require('conn.php');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate username format (8 alphanumeric characters)
function validateUsername($username) {
    return preg_match('/^[a-zA-Z0-9]{4,14}$/', $username);
}

// Function to validate password format (minimum 6 characters with at least one special character)
function validatePassword($password) {
    return strlen($password) >= 6 && preg_match('/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/', $password);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "called";
    // var_dump($_POST);
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
   // $mno = $_POST["number"];
    
    
    // Check if the username already exists in the database
    $checkUsernameQuery = "SELECT * FROM user WHERE userid = '$username'";
    $result = $conn->query($checkUsernameQuery);

    if ($result->num_rows > 0) {
        echo '<script>alert("Username already exists. Please choose a different username.");</script>';
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        echo '<script>alert("Invalid Name format. Only letters and spaces are allowed.");</script>';
    } elseif (!validateUsername($username)) { // Validate the username format
        echo '<script>alert("Invalid Username format. It should contain 8 alphanumeric characters.");</script>';
    } elseif (!validatePassword($password)) { // Validate the password format
        echo '<script>alert("Invalid Password format. It should be at least 6 characters long and contain at least one special character.");</script>';
    } else {
        // Insert data into the database
        $sql = "INSERT INTO user (name, userid, pass,des) VALUES ('$name', '$username', '$password',0)";
       
        //echo '<script>alert('.$mno.');</script>';
        if ($conn->query($sql) === TRUE) {
          $_SESSION["name"] =$name;
          $_SESSION["res"]=0;
            
            echo '<script>alert("Registration Done");window.location.href = "index.php";
</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?> -->

