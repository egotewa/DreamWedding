<?php
	session_start();

	session_unset(); 
	session_destroy();
	
?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/pleaseRegisterCSS.css">

	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />

	<title>Изход</title>
</head>
<body id="body">

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

	</div>

	<div id="pleaseRegister">
		<p>Вие излязохте успешно. <a href="homePage.php">Върнете се в началната страница. </a> </p>
	</div>
</body>
</html>
