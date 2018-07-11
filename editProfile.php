
<?php

	require('validateUserData.php');
	session_start();

	
		
	$statement = $conn->prepare("SELECT * FROM users WHERE username=:username");
	$statement->bindParam(':username' ,$_SESSION['username'], PDO::PARAM_STR);
	$statement->execute();
		
	$userData = $statement->fetchAll();
	
	if(isset($_POST['submitUserChanges'])){

			$result = validateUserData($_POST);

			if($result['isValid']){

				$validData = $result;
				$statement = $conn->prepare("UPDATE users SET name=:firstName, lastName=:lastName, email=:email, city=:city, telephone=:telephone, address=:address, interests=:interests WHERE username=:username");
				$updated = updateData($statement, $validData, $_SESSION['username']); //update the input data

				 
			} else{

				$invalidData = $result;

			}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/editProfile.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="js/home.js"></script>
	
	
	<title>Моят профил</title>
</head>
<body id="body">

	<div class="menu" id="menu">
		<img class="logoImage" src="img/logoImage.gif">

		<button class="button buttonLogout buttonColor" onclick="window.location.href='logout.php'"> Изход </button>
		<button class="button buttonProfile buttonColor" onclick="location.href='viewProfile.php'"> Здравей,<?php if(isset($_SESSION['username'])) echo $_SESSION['username'];?>! </button>

		<nav>
			<ul>
				<li><a class="navButtons navColor" href="homePage.php"> Начало </a></li>
				<li><a class="navButtons navColor" href="atelierPage.php">Ателиета</a></li>
				<li><a class="navButtons navColor" href="restaurants.php"> Ресторанти </a></li>
				<li><a class="navButtons navColor" href="guestList.php"> Планировчик </a></li>				
			</ul>
		</nav>

	</div>
	
	
	<form class="userProfileForm" id="userProfileForm" method="post">
	<h3 id="myProfileHeader">Моят профил</h3>
		
		<div class="userInfo">
		
			<img src="https://content-static.upwork.com/uploads/2014/10/01073427/profilephoto1.jpg">
			<label for="firstName" id="topLabel">Име:</label>
			<input type="text" name="firstName" id="firstName" value="<?php if(isset($userData[0]['name'])) echo $userData[0]['name'];?>" >
			<p class="invalidMsg"><?php if(isset($invalidData['firstName'])) { echo $invalidData['firstName']; }?></p>

			<label for="lastName">Фамилия:</label>
			<input type="text" name="lastName" id="lastName" value="<?php if(isset($userData[0]['lastName'])) echo $userData[0]['lastName'];?>" >
			<p class="invalidMsg"><?php if(isset($invalidData['lastName'])) { echo $invalidData['lastName']; }?></p>
		
		</div>

		<h3 id="displayUsername"><?php if(isset($userData[0]['username'])) echo $userData[0]['username'];?></h3>
		<h3 id="contactsHeader">Контакти</h3>
		<div class="contactsInfo">
		
			<label for="city">Град:</label>
			<input type="text" name="city" id="city" value="<?php if(isset($userData[0]['city'])) echo $userData[0]['city'];?>" >
			<p class="invalidMsg"><?php if(isset($invalidData['city'])) { echo $invalidData['city']; }?></p>

			<label for="address">Адрес:</label>
			<input type="text" name="address" id="address" value="<?php if(isset($userData[0]['address'])) echo $userData[0]['address'];?>" >
			<p class="invalidMsg"><?php if(isset($invalidData['address'])) { echo $invalidData['address']; }?></p>

		</div>

	
		<div class="contactsInfoRight">

			<label for="email">Имейл:</label>
			<input type="text" name="email" id="email" value=<?php if(isset($userData[0]['email'])) echo $userData[0]['email'];?> >
			<p class="invalidMsg"><?php if(isset($invalidData['email'])) { echo $invalidData['email']; }?></p>

			<label for="telephone">Телефон за връзка:</label>
			<input type="text" name="telephone" id="telephone" value=<?php if(isset($userData[0]['telephone'])) echo $userData[0]['telephone'];?> >
			<p class="invalidMsg"><?php if(isset($invalidData['telephone'])) { echo $invalidData['telephone']; }?></p>

		</div>

		<h4 id="additionalInfoHeader">Допълнителна информация</h4>
		<div class="additionalInfo">
	
			<label for="interests">Интереси:</label>
			<textarea id="interests" name="interests" placeholder="Опишете интересите си с няколко думи.."><?php if(isset($userData[0]['interests'])) echo $userData[0]['interests'];?></textarea>
			<p class="invalidMsg"><?php if(isset($invalidData['interests'])) { echo $invalidData['interests']; }?></p>

		</div>
	
		<input type="submit" value="Запази" class="saveButton" id="submitUserChanges" name="submitUserChanges">

	</form>

	<?php

		if(isset($updated)){ 

			header("Location: http://".$serverName.":".$_SERVER['SERVER_PORT']."/viewProfile.php");
	
		}

	?>


</body>
</html>

