<?php
	session_start();
	$_SESSION['guestEditID'] = $_GET['guest'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/guestList.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

	<title></title>
</head>

<body id="body">
	<div class="menu" id="menu">
	<img class="logoImage" src="img/logoImage.gif">
		
		<button class="button buttonLogout buttonColor" onclick="window.location.href='logout.php'"> Изход </button>
		<button class="button buttonProfile buttonColor" onclick="location.href='viewProfile.php'"> Здравей,<?php echo $_SESSION['username']?>! </button>

		<nav>
			<ul>
				<li><a class="navButtons navColor" href="homePage.php"> Начало </a></li>
				<li><a class="navButtons navColor" href="atelierPage.php">Ателиета</a></li>
				<li><a class="navButtons navColor" href="restaurants.php"> Ресторанти </a></li>
				<li><a class="navButtons navColor" href="guestList.php"> Планировчик </a></li>					
			</ul>
		</nav>
	</div>
	<div class="form formGuest">
	<form method="post" id="guestElement" action="updateGuest.php">
		<p>Добавяне на гост</p>
		<label for="guestName" class="labels"> Име: </label>
		<input type="text" name="guestName" id="guestName" class="input">
		<input type="radio" name="gender" value="male" checked> Мъж
		<input type="radio" name="gender" value="female"> Жена
		<input type="radio" name="gender" value="girl"> Момиче
		<input type="radio" name="gender" value="boy"> Момче
		<p></p>
		<label for="guestLocation" class="labels"> Населено място: </label>
		<input id="guestLocation" type="text" name="location" class="input">
		<label for="group" class="labels"> Категория: </label>
		<select id="group" name="categoryName">
		</select>
		<p></p>
		<button type="submit" name="submitGuest" class="button add">Промени</button>
	</form>	
	</div>
		<script type="text/javascript" src="js/cats.js"></script>
		<script type="text/javascript" src="js/fillGuestForm.js"></script>
</body>
</html>