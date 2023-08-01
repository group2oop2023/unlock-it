<?php 

session_start();

	include("connection.php");
	include("functions.php");
	

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Wrong username or password.";
		}else
		{
			echo "Please log in to your account.";
		}
	}

?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap");
		@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap');
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Roboto', sans-serif;
		}
		.flex {
			display: flex;
			align-items: center;
		}
		.container {
			padding: 0 15px;
			min-height: 100vh;
			justify-content: center;
			background-image:url(image/background.jpg);
			background-position: center;
			background-repeat: none;
			background-size: cover;
		}
		.page {
			justify-content: space-between;
			max-width: 1000px;
			width: 100%;
		}
		.page h1 {
			color: #1877f2;
			font-size: 4rem;
			margin-bottom: 10px;
		}
		.page p {
			font-size: 1.75rem;
			white-space: nowrap;
		}

		.logo img{
			padding: 0px;
			width: 350px;
			left: 150;
   			cursor: pointer;
    		margin: 50% -5%;
    		margin-top: -40%;
		}

		.tagline{
			padding: 0;
			position: absolute;
			left: -46%;
			margin-right: 60%;
			margin-left: 55%;
			margin-top: 5%;
		}

		.tagline h1{
			color: #fff;
			text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 2px 3px 0 #000;
			font-size: 40px;
			text-align: center;
			font-family: Noto Sans JP;
			font-weight: bold;
			font-style: normal;
		}

		.form-wrapper {
			position: absolute;
			left: 70%;
			top: 50%;
			border-radius: 10px;
			padding: 70px;
			width: 430px;
			transform: translate(-50%, -50%);
			background: rgba(0, 0, 0, .7);
			box-shadow: 0 10px 10px rgba(0,0,0,0.2);
		}
		.form-wrapper h2 {
			color: #fff;
			position: relative;
            font-size: 30px;
            font-weight: 600;
		}
		
		.form-wrapper h2::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 28px;
        border-radius: 12px;
        background: #0E1431;
    }
		.form-wrapper form {
			margin: 25px 0 65px;
		}
		form .form-control {
			height: 50px;
			position: relative;
			margin-bottom: 10px;
		}
		.form-control input {
			height: 100%;
			width: 100%;
			background: #fff;
			border: none;
			outline: none;
			border-radius: 40px;
			color: #000;
			font-size: 1rem;
			padding: 0 20px;
		}
		.form-control input:is(:focus, :valid) {
			background: rgba(255, 255, 255, 0.7);
			padding: 16px 20px 0;
		}
		
		.form-control label {
			position: absolute;
			left: 20px;
			top: 50%;
			transform: translateY(-50%);
			font-size: 1rem;
			pointer-events: none;
			color: rgba(0, 0, 0, 0.5);
			transition: all 0.1s ease;
		}
		.form-control input:is(:focus, :valid)~label {
			font-size: 0.75rem;
			transform: translateY(-130%);
		}
		form button {
			width: 100%;
			padding: 16px 0;
			font-size: 1rem;
			background: #0E1431;
			color: #fff;
			font-weight: 500;
			border-radius: 40px;
			border: none;
			outline: none;
			margin: 25px 0 10px;
			cursor: pointer;
			transition: 0.1s ease;
		}
		form button:hover {
			background: #2a3a83;
		}
		.form-wrapper a {
			text-decoration: none;
		}
		.form-wrapper a:hover {
			text-decoration: underline;
		}
		.form-wrapper :where(label, h5, small, a) {
			color: #b3b3b3;
			margin-right: 10px;
		}
		form .form-password {
			display: flex;
			justify-content: space-between;
		}
		form .remember-me {
			display: flex;
		}
		form .remember-me input {
			margin-right: 5px;
			accent-color: #b3b3b3;
		}
		form .form-password :where(label, a) {
			font-size: 0.9rem;
		}
		.form-wrapper h5  {
			color: #fff;
			width: 100%;
            text-align: center;
		}
		.form-wrapper small {
			display: block;
			margin-top: 15px;
			color: #b3b3b3;
		}
		.form-wrapper small a {
			color: #0071eb;
		}
		@media (max-width: 740px) {
			body::before {
				display: none;
			}
			nav, .form-wrapper {
				padding: 20px;
			}
			nav a img {
				width: 140px;
			}
			.form-wrapper {
				width: 100%;
				top: 43%;
			}
			.form-wrapper form {
				margin: 25px 0 40px;
			}
		}
	</style>
</head>
<body>
	<div class="container flex">
		<div class="page flex">
			<div class="logo">
				<img src="image/logowhite2.png" class="image-logo logostyle1">
			</div>
			<div class="tagline">
				<h1>Unleash your IT potential with our library.</h1>
			</div>
			<div class="form-wrapper">
				<h2>Log In</h2>
				<form action="" method="post">
					<div class="form-control">
						<input type="text" id="login-username" name="user_name" required>
						<label>Email or phone number</label>
					</div>
					<div class="form-control">
						<input type="password" id="login-password" name="password" required>
						<label>Password</label>
					</div>
					<button type="submit">Log In</button>
					<div class="form-password">
						<div class="remember-me">
							<input type="checkbox" id="remember-me">
							<label for="remember-me">Remember me</label>
						</div>
					</div>
				</form>
				<h5>New to UnlockIT? <a href="signup.php">Sign up now</a></h5>
			</div>
		</div>
	</div>
</body>
</html>
