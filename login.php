<?php
	require("validateReg.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/login.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
	
	
	<title>Вход</title>
</head>
<body id="body" onload="capsLockEvent()">

	<div class="menu" id="menu">
		<img class="logoImage" src="img/logoImage.gif">

		<button class="button buttonReg buttonColor" onclick="window.location.href='registration.php'"> Регистрация </button>
		<button class="button buttonLogin buttonColor" onclick="window.location.href='login.php'"> Вход </button>

		<nav>
			<ul>
				<li><a class="navButtons navColor" href="homePage.php"> Начало </a></li>
				<li><a class="navButtons navColor" href="atelierPage.php">Ателиета</a></li>
				<li><a class="navButtons navColor" href="restaurants.php"> Ресторанти </a></li>
				<li><a class="navButtons navColor" href="guestList.php"> Планировчик </a></li>				
			</ul>
		</nav>


	
	<div id="loginDiv" class="loginDiv">

		<img src="img/heart.png">
			
		<div id="loginForm">
			
			<div id="loginHeader">
				<h1>Вход</h1>
			</div>
			<form method="post">
				<div class="loginInputDiv">
					<input type="text" name="username" id="user" placeholder="Потребителско име">
					<input type='password' name="pass" id="pass" placeholder="Парола">
					<?php

						if(isset($_POST['submitLogin'])){
							$loginUser = $_POST['username'];
		

							$statement = $conn->prepare("SELECT * FROM users WHERE username=:user;");
							$statement->bindParam(':user' ,$loginUser, PDO::PARAM_STR);
							$userData = getData($statement);
				

							if(!empty($userData)){

								$loginPass = $_POST['pass'];
								if(password_verify($loginPass, $userData[0]['passHash'])){
						
									session_start();

									$_SESSION['loggedIn'] = true;
									$_SESSION['username'] = $loginUser;

									header("Location: http://".$serverName.":".$_SERVER['SERVER_PORT']."/DreamWedding-master/homePage.php");

						
								}else{
									echo "<p class='failedLogin'>Грешно потребителско име или парола.</p>";
								}

							}else{
								echo "<p class='failedLogin'>Грешно потребителско име или парола.</p>";
							}

						}
					?>
					
				<span id="capsLockEvent"></span>
				</div>
				

				<button class="button submitLogin buttonColor" type="submit" name="submitLogin">Вход</button>

			</form>
		</div>
	</div>

	<script src="js/registration.js"></script>
	

</body>
</html>
