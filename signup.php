<?php 
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,email,password) values ('$user_id','$user_name','$email','$password')";

			mysqli_query($conn, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
  <title>SIGN UP</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style type="text/css">
    @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
    }

    .container {
        padding: 0;
        min-height: 100vh;
        justify-content: center;
        background-image:url(image/background.jpg);
        background-position: center;
        background-repeat: none;
        background-size: cover;
        display: flex;
        align-items: center;
    }

    .logo img{
        padding: 0px;
        width: 250px;
        cursor: pointer;
        position: absolute;
        top: 18px;
        left: 41%;
    }

    .wrapper {
        position: relative;
        max-width: 430px;
        width: 80%;
        background: rgba(0, 0, 0, .7);
        padding: 50px;
        border-radius: 6px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
		left: 5px;
		top: 35px;
        color: #fff;
    }

    .wrapper h2 {
        position: relative;
        font-size: 30px;
        font-weight: 600;
        color: #fff;
    }

    .wrapper h2::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 28px;
        border-radius: 12px;
        background: #0E1431;
    }

    .wrapper form {
        margin-top: 10px;
		height: 380px;
    }

    .wrapper form .input-box {
        height: 52px;
        margin: 18px 0;
    }

    form .input-box input {
        height: 60%;
        width: 100%;
        outline: none;
        padding: 0 15px;
        font-size: 17px;
        font-weight: 400;
        color: #000;
        border: 1.5px solid #C7BEBE;
        border-bottom-width: 2.5px;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .input-box input:focus,
    .input-box input:valid {
        border-color: #4070f4;
        background-color: rgba(255, 255, 255, 0.7);
    }

    form .policy {
        display: flex;
        align-items: center;
    }

    form h3 {
        color: #707070;
        font-size: 14px;
        font-weight: 500;
        margin-left: 10px;
    }

    .input-box.button input {
        color: #fff;
        letter-spacing: 1px;
        border: none;
        background: #0E1431;
        cursor: pointer;
    }

    .input-box.button input:hover {
        background: #2a3a83;
    }

    form .text h3 {
        color: #fff;
        width: 100%;
        text-align: center;
    }

    form .text h3 a {
        color: #b3b3b3;
        text-decoration: none;
    }

    form .text h3 a:hover {
        text-decoration: underline;
    }
  </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="image/logowhite2.png" class="image-logo logostyle1">
    </div>
    <div class="wrapper">
     <h2>Register</h2>
    <form action="" method="post">
        <div class="input-box">
            <label for="signup-username">Username</label>
            <input type="text" id="signup-username" name="user_name" required>
        </div>
        <div class="input-box">
            <label for="signup-email">Email</label>
            <input type="text" id="signup-email" name="email" required>
        </div>
        <div class="input-box">
            <label for="signup-password">Password</label>
            <input type="password" id="signup-password" name="password" required>
        </div>
        <div class="input-box">
            <label for="signup-confirm-password">Confirm Password</label>
            <input type="password" id="signup-confirm-password" name="confirm_password" required>
        </div>
        <div class="policy">
            <input type="checkbox" id="signup-terms" required>
            <label for="signup-terms"> &nbsp; I accept all terms &amp; conditions</label>
        </div>
        <div class="input-box button">
            <input type="submit" value="Register Now">
        </div>
        <div class="text">
            <h3>Already have an account? <a href="login.php">Login now</a></h3>
        </div>
     </form>
    </div>
</div>
</body>
</html>


