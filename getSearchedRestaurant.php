<?php
	session_start();
	$serverName = "localhost";
	$dbName = "DreamWeddingDatabase";
	$username = "root";
	$password = "";
	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT * FROM RESTAURANTS
		WHERE name="'. $_SESSION['searchedItem'] . '"';
		$query = $conn->query($sql) or die("failed");
		$restaurantRow = $query->fetchAll(PDO::FETCH_ASSOC);
		$json = json_encode($restaurantRow, JSON_UNESCAPED_UNICODE);
		// var_dump($json);
		echo $json;
	}catch (PDOException $e){
		die("Connection error:".$e->getMessage());
	}

?>
