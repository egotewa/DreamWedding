
<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/atelierCSS.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Ателиета</title>
</head>
<body id="body">
	<div id="menu" class="menu">
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
	<div id="ateliersImageDiv">
			<h2>Ателиета</h2> 
			<input id="atelierSearchBar" type="text">
			<button id="atelierSearchButton" class="button buttonColor" onclick="searchButton()">Търсене</button>
			<h1 id="notFound" style="display:none; position:absolute; font-size:30px; color:black; font-family: 'Pacifico', cyrillic; margin-top:20%;">Няма намерени резултати.</h1>
	</div>
	
	<div id="1"> 
	</div>
	<!-- static items-test purposes: -->
	<!--<div  id="APlusDiv" class="atelierDivs" style='background-image: url("APlusButtonImage.jpg");'>
		<a id="APlusTown" class="atelierTown"></a>
		<br><br>
		<a id="APlusAddress" class="atelierAddress"></a>
		<a class="atelierAnchors" id="APlus" href="#"></a>
	</div>
	
	
	<div id="BellaDiv" class="atelierDivs" style='background-image: url("BellaButtonImage.jpg");'>
		<a id="BellaTown" class="atelierTown"></a>
		<br><br>
		<a id="BellaAddress" class="atelierAddress"></a>
		<a class="atelierAnchors" id="Bella" href="#"></a>
	</div>
	
	
	<div id="SDDiv" class="atelierDivs" style='background-image: url("SpecialDayButtonImage.jpg");'>
			<a id="SDTown" class="atelierTown"></a>
			<br><br>
			<a id="SDAddress" class="atelierAddress"></a>
			<a class="atelierAnchors" id="SD" href="#"></a>
	</div>-->
	
		
	<div id="2">
	</div>
	
	<script type="text/javascript" src="js/atelierJavaScript.js"></script>
	<script type="text/javascript" src="js/searchButtonAteliers.js"></script>

</body>
</html>
