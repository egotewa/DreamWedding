<?php
	session_start();
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//retrieve information for the guest that want to change
		$sql = 'SELECT * FROM guests WHERE id=' . '"' . $_SESSION['guestEditID'] . '"';
		$query = $conn->query($sql) or die("failed");
		$result= $query->fetchAll(PDO::FETCH_ASSOC);
		$sql = 'SELECT name FROM guestcategories WHERE id="' . $result[0]['category_id'] . '"';
		$query = $conn->query($sql) or die("failed");
		$catRow= $query->fetch(PDO::FETCH_ASSOC);
		$categoryName = "catName";
		//add the name of the category in the associative array so that it can be filled in the change form
		$result[0] += array($categoryName => $catRow['name']);
		$json = json_encode($result, JSON_UNESCAPED_UNICODE);
		echo $json;
	} catch (PDOException $e){
		die("Connection error:".$e->getMessage());
	}

?>