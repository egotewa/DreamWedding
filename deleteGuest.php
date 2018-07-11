<?php
	session_start();
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT category_id FROM guests WHERE id="' . $_GET['guest'] . '"';
		$query = $conn->query($sql) or die("failed");
		$catRow = $query->fetch(PDO::FETCH_ASSOC);
		$myCat=$catRow['category_id'];
		$statement=$conn->query("UPDATE guestcategories SET numberOfGuests=numberOfGuests - 1 WHERE id='$myCat'");
		
		
		$sql = "DELETE FROM guests WHERE id =  :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $_GET['guest'], PDO::PARAM_INT);   
		$stmt->execute();
		header("Location: http://".$serverName.":".$_SERVER['SERVER_PORT']."/DreamWedding-master/guestList.php");
	} catch (PDOException $e){
		die("Connection error:".$e->getMessage());
	}
?>