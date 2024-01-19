<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
<!--===============================================================================================-->
</head>
<body>
    <div>
		<a class="button-35" role="button" href="index.php">Home</a>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/favicon.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="?action=register" method="post">
					<span class="login100-form-title">
						Member Registration
					</span>

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="name" required placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="surname" required placeholder="Surname">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" required placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" required placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="register">
							Register
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="indexLogin.php">
							Do you have an account?
							<i class="fa fa-long-arrow-right m-l-5"  aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<img src="img/animation_registration.gif" alt="Animacja" id="background-video">
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<?php
	require_once 'Data/DataBase.php';
	require_once 'Controllers/AuthController.php';

	$db = new Database("localhost", "root", "", "projekt");

	$authController = new AuthController();

	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
		$authController->register($_POST['name'], $_POST['surname'],$_POST['email'], $_POST['pass']);
	}
	?>
</body>
</html>