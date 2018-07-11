
<?php
	//$serverName = $_SERVER['HTTP_HOST'];
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
	}catch (PDOException $e){
		die("Connection error:".$e->getMessage());
	}
?>
