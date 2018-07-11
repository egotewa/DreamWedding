<?php
	session_start();
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT * FROM RESTAURANTS
		WHERE id="' . $_SESSION['viewedRestaurant'] . '"';
		$query = $conn->query($sql) or die("failed");
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		$json = json_encode($result, JSON_UNESCAPED_UNICODE);
		echo $json;
	} catch (PDOException $e){
		die("Connection error:".$e->getMessage());
	}
?>
