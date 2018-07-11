<?php
	session_start();
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//retrieve the guest information from db
		$sql = 'SELECT * FROM guests WHERE id=' . '"' . $_SESSION['guestEditID'] . '"';
		$query = $conn->query($sql) or die("failed");
		$result= $query->fetch(PDO::FETCH_ASSOC);
		$sql = 'SELECT id FROM guestcategories WHERE name=' . '"' . $_POST['categoryName'] . '"';
		$query = $conn->query($sql) or die("failed");
		$catRow = $query->fetch(PDO::FETCH_ASSOC);
		//save new guest information
		$oldCat=$result['category_id'];
		$newCat=$catRow['id'];
		if($oldCat == $newCat){
			$sql = 'UPDATE guests SET name="' . $_POST['guestName'] . '", gender="' . $_POST['gender']. '", location="' . $_POST['location'] . '", category_id="' . $newCat . '"' . 'WHERE id="' . $_SESSION['guestEditID'] . '"';
			$conn->exec($sql);
		} else {
			$sql = 'UPDATE guests SET name="' . $_POST['guestName'] . '", gender="' . $_POST['gender']. '", location="' . $_POST['location'] . '", category_id="' . $newCat . '"' . 'WHERE id="' . $_SESSION['guestEditID'] . '"';
			$conn->exec($sql);
			
			$conn->query("UPDATE guestcategories SET numberOfGuests=numberOfGuests - 1 WHERE id='$oldCat'");
			$conn->query("UPDATE guestcategories SET numberOfGuests=numberOfGuests + 1 WHERE id='$newCat'");
			// edit the number of guests of the two categories - the new one and the old one
		}
		header("Location: http://".$serverName.":".$_SERVER['SERVER_PORT']."/DreamWedding-master/guestList.php");
	} catch (PDOException $e){
		die("Connection error:".$e->getMessage());
	}

?>