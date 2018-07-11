
<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
	
	
	<title>Начало</title>

</head>
<body id="body">

	<div class="menu" id="menu">
		<img class="logoImage" src="img/logoImage.gif">

		<?php
		if (!empty($_SESSION['loggedIn'])){

			echo '<button class="button buttonLogout buttonColor" onclick="window.location.href='."'logout.php'".'"> Изход </button>';
			echo '<button class="button buttonProfile buttonColor" onclick="location.href='."'viewProfile.php'".'"> Здравей,'.$_SESSION['username'].'! </button>';

		} else{

			echo '<button class="button buttonReg buttonColor" onclick="window.location.href='."'registration.php'".'"> Регистрация </button>';
			echo '<button class="button buttonLogin buttonColor"onclick="window.location.href='."'login.php'".'"> Вход </button>';
			
		}
		

		?>

		<nav>
			<ul>
				<li><a class="navButtons navColor" href="homePage.php"> Начало </a></li>
				<li><a class="navButtons navColor" href="atelierPage.php">Ателиета</a></li>
				<li><a class="navButtons navColor" href="restaurants.php"> Ресторанти </a></li>
				<li><a class="navButtons navColor" href="guestList.php"> Планировчик </a></li>				
			</ul>
		</nav>

	</div>
	
	<img class="homeImage" src="img/home.JPG">
	<div id="homePageText">
			<h2>Най-красивите приказки започват с Имало едно време..."</h2>
			<p><h2>Нашето пожелание към Вас е да завърши с : "... и заживели завинаги щастливо" !</h2></p>
			<br>
			<h2>Въвлечете ни във Вашата приказка!</h2>
	</div>
</body>
</html>
