<?php
	require('validateReg.php');

	$getUsers = $conn->prepare("SELECT username FROM users");


	if(isset($_POST['submitReg'])){

		$statement = $conn->prepare("INSERT INTO users(name, lastName, username, passHash, email, birthdate, confirmation, salt) VALUES(:firstName, :lastName, :username,:passHash, :email, :birthdate, :confirmation, :salt)");

		$result = validate($_POST, $getUsers);

		if($result['isValid'] && !isset($result['err'])){
			$regSuccess = insertData($statement, $result); //insert the input data
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/registration.css">
	
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />

	<script src="js/registration.js"></script>

	<title>Регистрация</title>
</head>
<body id="body" onload="capsLockEvent()">

	<div class="menu" id="menu">

		<img class="logoImage" src="img/logoImage.gif">

		<button class="button buttonReg buttonColor" onclick="window.location.href='registration.php'">Регистрация</button>
		<button class="button buttonLogin buttonColor" onclick="window.location.href='login.php'">Вход</button>
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

	
	<form class="regForm" method="post" name="registration" id="regForm"> <h1>Създаване на профил</h1>
		
	
		<div class="group">
			<label for="firstNameId">Име<span class="mandatory">*</span></label>
			<input type="text" name="firstName" id="firstNameId" placeholder="Милена" value="<?php if(isset($result['err'])){ echo $result['firstName'];}?>">
			<p id="invalidFirstName"></p>
		</div>
		<div class="group">
			<label for="lastNameId">Фамилия<span class="mandatory">*</span></label>
			<input type="text" name="lastName" id="lastNameId"  placeholder="Борисова" value="<?php if(isset($result['err'])){ echo $result['lastName'];}?>">
			<p id="invalidLastName"></p>
		</div>
		<div class="group">
			<label for="usernameId">Потребителско име<span class="mandatory">*</span></label>
			<input type="text" name="username" id="regUsernameId"  placeholder="mborisova">
			<p id="invalidUsername"><?php if(isset($result['err'])){ echo $result['err'];}?></p>
		</div>
		<div class="group">
			<label  for="passId">Парола<span class="mandatory">*</span></label>
			<input type="password" name="pass" id="regPassId" placeholder="•••••••••••">

			<div class="passDetails">
				<img src="img/question.png" id="question" onclick="showPasswordDetails()">
				<span class="passDetailsText" id="passDetailsID">Паролата трябва да съдържа поне 6 символа, като трябва да има поне 1 главна, 1 малка буква и 1 цифра.</span>			
			</div>

			<p id="invalidPass"></p>
			
		</div>
		<div class="group">
			<label  for="confirmPassId">Потвърди паролата<span class="mandatory">*</span></label>
			<input type="password" name="confirmPass" id="confirmPassId" placeholder="••••••••••••">
			<p id="invalidConfirmPass"></p>
			<!-- <p id="capsLockEvent"></p> -->
		</div>
		<div class="group">
			<label  for="emailId">Имейл<span class="mandatory">*</span></label>
			<input type="email" name="email" id="emailId" placeholder="mborisova@abv.bg" value="<?php if(isset($result['err'])){ echo $result['email'];}?>">
			<p id="invalidEmail"></p>
		</div>
		<div class="group">
			<label  for="birthdateId">Дата на раждане<span class="mandatory">*</span></label> 
			<input type="date" name="birthdate" max="2000-01-02" id="birthdateId" placeholder="04/07/2018">
			<p id="invalidBirthdate"></p>
		</div>
		
		<p id="capsLockEvent"></p>
		
		<h3 id="termsHeading">Общи условия</h3>
			
		<textarea readonly="readonly" name="termsConditions" id="termsConditions" rows="20">
			Данни за моя бизнес
			Това са наименованието, седалището, адресът на управление, номерът ми на вписване в съответния регистър – търговски, БУЛСТАТ и др., името на управителя, както и информация за директен контакт – телефон или имейл.

			Информация за стоките и услугите, които предлагам
			Какво точно предлагам чрез своя сайт, дори и в него да публикувам единствено информация.

			Средства, чрез които се сключва договорът
			Общите условия на моя сайт сами по себе си представляват договор, който всеки потребител сключва с мен. В тях са описани правилата за ползване на сайта, които включват както моите права и задължения като оператор на сайта, така и тези на потребителите. 

			Защита на личните данни
			Първо – трябва да съм се регистрирал в Комисията за защита на личните данни като администратор на лични данни и второ – трябва да включа текстове, съдържащи информация относно защитата на същите.
			Трябва да имам предвид, че обработването на лични данни включва и използването на бисквитки или друга подобна технология. В тази връзка е добре да подготвя и специална секция за защитата на личните данни.4

			Други необходими клауза
			Освен горепосоченото е важно да опиша и някои други детайли. Такива са например държавните органи, които контролират дейността ми. От друга страна е добре да защитя и съдържанието на своята интелектуална собственост на сайта.


			Източник: https://pravatami.bg/10469
		</textarea>

		<input type="checkbox" id="checkbox" name="checkbox"> <label>Съгласен съм с Общите условия</label>

		<p id="ifNotChecked"></p>
		

		<input type="submit" value="Регистрация" class="button submitReg buttonColor" id="submitReg" name="submitReg" onclick="return validateForm()" >
		
		
	
	</form>
	

	<?php

		if(!empty($regSuccess)){ 

	?>

			<script>
				document.getElementById("regForm").innerHTML = '<h2 id="pleaseLogin">Регистрирахте се успешно в системата. <a href="login.php"> Влезте от тук. </a> </h2>';
			</script>
	
	<?php

		}

	?>
	
	


</body>
</html>
