<?php
	session_start();
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE IF NOT EXISTS `CATEGORIES` (
	    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	    `name` 	VARCHAR(30) NOT NULL,
	    `numberOfGuests` INT(11),
	    `user_id` INT(11),
	    INDEX `user_id` (`user_id`)
		) ENGINE=InnoDB";   
		$conn->exec($sql);
		$sql = "CREATE TABLE IF NOT EXISTS `GUESTS` (
	    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	    `name` 	VARCHAR(30) NOT NULL,
	    `gender` VARCHAR(10),
	    `location` VARCHAR(50),
	    `category_id` INT(11) UNSIGNED,
	    INDEX `category_id` (`category_id`),
	    `user_id` INT(11) UNSIGNED,
	    INDEX `user_id` (`user_id`)
		) ENGINE=InnoDB"; 
$conn->exec($sql);
// $sql = "ALTER TABLE GUESTS
//   ADD CONSTRAINT FOREIGN KEY (`category_id`) REFERENCES CATEGORIES (id)";
//     	$conn->exec($sql);
// $sql = "ALTER TABLE GUESTS
//   ADD CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES users (id)";
//   $conn->exec($sql);
	}catch (PDOException $e){
		die("Connection error:".$e->getMessage());
	}

	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['submitGuest']))
		{
			$nameError = "";
			$name = $location = "";
			$userRow = array();
			if(empty($_POST['guestName'])) 
			{
				$nameError = "Въведете име на госта.";
			} else
			{
				$name = test_input($_POST['guestName']);
			}
			if(empty($_POST['location']))
			{
				$location = "";
			} else 
			{
				$location = test_input($_POST['location']);
			}
			if($nameError=="") 
			{
				$guestName = $_POST['guestName'];
				$gender = $_POST['gender'];
				$location = $_POST['location'];
				$sql = 'SELECT id FROM guestcategories WHERE name=' . '"' . $_POST['categoryName'] . '"';
				$query = $conn->query($sql) or die("failed");
				$catRow = $query->fetch(PDO::FETCH_ASSOC);
				$sql = 'SELECT id FROM users WHERE username=' . '"' . $_SESSION['username'] . '"';
				$query = $conn->query($sql) or die("failed");
				$userRow = $query->fetch(PDO::FETCH_ASSOC);
				$stmt = $conn->prepare("INSERT INTO GUESTS (name, gender, location, category_id, user_id) VALUES (?, ?, ?, ?, ?)");
				$stmt->execute([$guestName, $gender, $location, $catRow['id'], $userRow['id']]);
				// $conn->exec($stmt);
				header("Location: http://".$serverName.":".$_SERVER['SERVER_PORT']."/DreamWedding-master/guestList.php");
				//Ани, тук пращам към моята таблица да се сумират общия брой гости в дадена категория
				$myCat=$catRow['id'];
				$statement=$conn->query("UPDATE guestcategories SET numberOfGuests=numberOfGuests + 1 WHERE id='$myCat'");
			}
			if($nameError!="")
			{
				$_SESSION['guestErrorMsg'] = $nameError;
				header("Location: http://".$serverName.":".$_SERVER['SERVER_PORT']."/DreamWedding-master/guestList.php");
			}
			// $sql = 'SELECT GUESTS.name AS guestName, gender, location, CATEGORIES.name AS categoryName, GUESTS.user_id
			// FROM GUESTS
			// INNER JOIN CATEGORIES ON category_id = CATEGORIES.id
			// WHERE' . 'GUESTS.user_id' .'=' . $userRow['id'];
			// $query = $conn->query($sql) or die("failed");
			// $result = $query->fetchAll(PDO::FETCH_ASSOC);
			// $json = json_encode($result, JSON_UNESCAPED_UNICODE);
			// $myFile = fopen('guestResults'. $userRow['id'] .'.json', 'w');
			// fwrite($myFile, $json);
			// fclose($myFile);

		}
	}
?>
