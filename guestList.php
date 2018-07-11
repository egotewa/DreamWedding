
<?php
	session_start();

	if (!empty($_SESSION['loggedIn'])){
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
		<button class="button buttonProfile buttonColor" onclick="location.href='viewProfile.php'"> Здравей,<?php if(isset($_SESSION['username'])) echo $_SESSION['username']?>! </button>

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
	<form method="post" id="guestElement" action="addGuests.php">
		<p>Добавяне на гост</p>
		<label for="guestName" class="labels"> Име: </label>
		<input type="text" name="guestName" id="guestName" class="input">
		<input type="radio" name="gender" value="male" checked> Мъж
		<input type="radio" name="gender" value="female"> Жена
		<input type="radio" name="gender" value="girl"> Момиче
		<input type="radio" name="gender" value="boy"> Момче
		<p></p>
		<label for="guestLocation" class="labels"> Населено място: </label>
		<input type="text" name="location" id="guestLocation" class="input">
		<label for="group" class="labels"> Категория: </label>
		<select id="group" name="categoryName">
			<!-- Ели: изтрила съм катеориите, тъй като вече се зареждат от базата-->
		</select>
		<p></p>
		<button type="submit" name="submitGuest" class="button add" >Добави</button>

	</form>	
	<span style="color:red; font-family: Pacifico, cyrillic; font-size: 32px;">
			<?php
			if(!empty($_SESSION['guestErrorMsg']))
			{
				echo "*" . $_SESSION['guestErrorMsg'];
				$_SESSION['guestErrorMsg'] = "";
			}
			?>
		</span>
	</div>
	
	<!--Ели: ред 61-69 са нови и са добавени от мен, buttonColor и аз го махнах, защото не бях-->
	<div class="form formCat">
		<form method="post" id="category" action="addCategory.php">
			<p>Добавяне на категория</p>
			<label for="catName" class="labels" > Име на категория: </label>
			<input type="text" id="catInput" name="categoryName" id="catName" class="input">
			<p></p>
			<button id="addCatButton" type="submit" class="button add">Добави</button>
		</form>
		
		<form id="categoryModify" style="display:none;">
			<p style=" margin-left: 15%; margin-top:-2%;" >Промяна на категория</p>
			<label for="catName" class="labels" > Име на категория: </label>
			<input type="text" id="catInput2" name="categoryName" class="input">
			<p></p>
			<button id="changeCatButton" type="submit" class="button add">Промени</button>
		</form>
	</div>
	
	
	<div>
		<div id="total" style="font-family: Pacifico, cyrillic">
		</div>
		<div class="guestList">
			<div class="row">
				<div class="guestCell"> Име </div>
				<div class="guestCell"> Населено място </div>
				<div class="guestCell"> Категория </div>
			</div>
		</div>
		<div class="catList">
			<div class="row">
				<div class="catCell" id="catNameLabel"> Име на категория </div>
				<div class="catCell catCellLast"> Брой членове </div>
			</div>
		</div>
	</div>
	<div class="tables">
		<!-- guest table -->
		<div class="table" id="gTable">
		</div>
		
		
		<!-- category table, Ели: тук вече няма статични категории, зареждат се от БД -->
		<div id="viewCategories" class="table catTable">
		</div>
		
		
	</div>
	
	<script type="text/javascript" src="js/categJS.js"></script>
	<script type="text/javascript" src="js/cats.js"></script>
	<script type="text/javascript" src="js/displayGuests.js"></script>

</body>
</html>



<?php

} else{

?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/pleaseRegisterCSS.css">

	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />

	<title></title>
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
		<p>За да имате достъп до Планировчика, моля <a href="registration.php"> регистрирайте се </a> в DreamWedding или <a href="login.php"> влезте </a> в акаунта си! </p>

		<!-- <button type="button" class="registerButton" onclick="window.location.href='newRegistration.php'">Регистрация</button> -->
	</div>
</body>
</html>


<?php 

}

?>
