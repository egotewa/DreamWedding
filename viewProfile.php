
<?php
	require('connection.php');
	session_start();

		
	$statement = $conn->prepare("SELECT * FROM users WHERE username=:username");
	$statement->bindParam(':username' ,$_SESSION['username'], PDO::PARAM_STR);
	$statement->execute();
		
	$userData = $statement->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/viewProfile.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	
	<title>Моят профил</title>
</head>
<body>

	<div class="menu" id="menu">
		<img class="logoImage" src="img/logoImage.gif">
		
		<button class="button buttonLogout buttonColor" onclick="window.location.href='logout.php'"> Изход </button>
		<button class="button buttonProfile buttonColor" onclick="location.href='#'"> Здравей,<?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?>! </button>

		<nav>
			<ul>
				<li><a class="navButtons navColor" href="homePage.php"> Начало </a></li>
				<li><a class="navButtons navColor" href="atelierPage.php">Ателиета</a></li>
				<li><a class="navButtons navColor" href="restaurants.php"> Ресторанти </a></li>
				<li><a class="navButtons navColor" href="guestList.php"> Планировчик </a></li>				
			</ul>
		</nav>

	</div>
	
	<div id="viewProfileDiv">
		<h3 id="myProfileHeader">Моят профил</h3>
			
		<div class="userInfo">
		
			<img src="https://content-static.upwork.com/uploads/2014/10/01073427/profilephoto1.jpg">
			

			<h3 id="topHeader"><i class="fa fa-user"></i>Име:</h3>
			<p><?php if(isset($userData[0]['name'])) echo $userData[0]['name'];?></p>

			<h3><i class="fa fa-user"></i>Фамилия:</h3>
			<p><?php if(isset($userData[0]['lastName'])) echo $userData[0]['lastName'];?></p>

			<button id="editButton" onclick="location.href='editProfile.php'"><i class="fa fa-pencil-square-o"></i>Редактирайте</button>
		
		</div>

		<h3 id="displayUsername"><?php if(isset($userData[0]['username'])) echo $userData[0]['username'];?></h3>
		<h3 id="contactsHeader">Контакти</h3>
		<div class="contactsInfo">

			<h3><i class="fa fa-institution"></i>Град: </h3>
			<p><?php if(isset($userData[0]['city'])) echo $userData[0]['city'];?></p>

			<h3><i class="fa fa-home"></i>Адрес:</h3>
			<p><?php if(isset($userData[0]['address'])) echo $userData[0]['address'];?></p>
		

		</div>
	
		<div class="contactsInfoRight">

			<h3><i class="fa fa-envelope"></i>Имейл:</h3>
			<p><?php if(isset($userData[0]['email'])) echo $userData[0]['email'];?></p>

			<h3><i class="fa fa-phone"></i>Телефон за връзка:</h3>
			<p><?php if(isset($userData[0]['telephone'])) echo $userData[0]['telephone'];?></p>

		</div>

		<h4 id="additionalInfoHeader">Допълнителна информация</h4>
		<div class="additionalInfo">
	
			<label for="interests"> <i class="fa fa-comments-o"></i>Интереси:</label>
			<textarea readonly="readonly" id="interests" name="interests" ><?php if(isset($userData[0]['interests'])) echo $userData[0]['interests'];?></textarea>

		</div>
	</div>


</body>
</html>

