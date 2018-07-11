
<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/homePageCSS.css">
	<link rel="stylesheet" type="text/css" href="style/viewRestaurants.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

	<!-- <script type="text/javascript" src="js/home.js"></script> -->
	<title></title>
</head>
<body id="body">
	<div id="menu" class="menu" >
		<img class="logoImage" src="img/logoImage.gif">
		
		<?php
		if (!empty($_SESSION['loggedIn'])){

			echo '<button class="button buttonLogout buttonColor" onclick="window.location.href='."'logout.php'".'"> Изход </button>';
			echo '<button class="button buttonProfile buttonColor" onclick="location.href="> Здравей,'.$_SESSION['username'].'! </button>';

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
	<?php
		$_SESSION['viewedRestaurant'] = $_GET['restaurant'];
	?>
	<!-- <h2>Ресторант Family</h2> -->
	<!-- <div class="container" id="restaurant">
		<img class="displayImg mySlides" src="img/family.jpg">
		<img class="displayImg mySlides" src="img/family2.jpg">
		<img class="displayImg mySlides" src="img/family3.jpg">
		<img class="displayImg mySlides" src="img/family4.jpg">
		<div class="information">
			<p><i class="fa fa-map-marker" style="font-size: 32px"></i>   гр. Пазарджик, Парк Острова</p>
			<p><i class="fa fa-phone" style="font-size: 32px"></i>   0894 60 55 55</p>
			<p><i class="fa fa-envelope" style="font-size: 32px"></i>   family@gmail.com</p>
			<p><i class="fa fa-hotel" style="font-size:32px"></i>   няма налична хотелска част</p>
			<p><i class="fa fa-users" style="font-size:32px"></i>   200 места</p>
			<p class="label">Зимна/лятна градина:<i class="fa fa-check" style="font-size: 32px;"></i></p>
			<p class="label">Басейн:<i class="fa fa-close" style="font-size:32px"></i></p>
			<p class="label">Дегустация:<i class="fa fa-check" style="font-size: 32px;"></i></p>
		</div>
		<div id="description"><p class="label">Описание: </p>Ресторант "Фемили" разполага с 200 места, като са смесени няколко стила, които допринасят за невероятният уют и комфорт.
Кокетните сепарета дават възможност на влюбените двойки да организират своя романтичен обяд или вечеря. За бизнесмените има дискретни маси, където да проведат на спокойствие разговорите си.
Ресторантът предлага широко разнообразие от ястия. Гостите могат да се насладят на богатата селекция вина от България и чужбина, специално избрани от нашите сомелиери.</div>
	</div> -->
	   <script type="text/javascript" src="js/viewRestaurants.js"></script>


	<!-- <div class="w3-row-padding w3-section" style="float: clear">
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="img/1_0.jpg" style="border-radius: 10px;height:200px;width:100%;cursor:pointer" onclick="currentDiv(1)">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="img/1_1.jpg" style="border-radius: 10px;height:200px;width:100%;cursor:pointer" onclick="currentDiv(2)">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="img/1_2.jpg" style="border-radius: 10px;height:200px;width:100%;cursor:pointer" onclick="currentDiv(3)">
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="img/1_3.jpg" style="border-radius: 10px;height:200px;width:100%;cursor:pointer" onclick="currentDiv(4)">
    </div>
  </div> -->
  <script type="text/javascript">
  	// Slideshow Restaurant Images
var slideIndex = 1;
// showDivs(slideIndex);

// function plusDivs(n) {
//   showDivs(slideIndex += n);
// }

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
  </script>
</body>
</html>
