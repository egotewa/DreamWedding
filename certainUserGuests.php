<?php
	session_start();
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT id FROM users WHERE username=' . '"' . $_SESSION['username'] . '"';
		$query = $conn->query($sql) or die("failed");
		$userRow = $query->fetch(PDO::FETCH_ASSOC);
		$sql = 'SELECT guests.id AS guestID, guests.name AS guestName, gender, location, guestcategories.name AS categoryName, guests.user_id
			FROM guests
			INNER JOIN guestcategories ON category_id = guestcategories.id
			WHERE ' . 'guests.user_id' .'='. $userRow['id'];
			$query = $conn->query($sql) or die("failed");
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			$json = json_encode($result, JSON_UNESCAPED_UNICODE);
			echo $json;
	} catch (PDOException $e){
		die("Connection error:".$e->getMessage());
	}

?>
