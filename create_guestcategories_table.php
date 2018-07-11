<?php

	try{
		$conn = new PDO("mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$statement = "CREATE TABLE IF NOT EXISTS guestcategories (
	    id INT(11) AUTO_INCREMENT NOT NULL,
	    userId int(11) NOT NULL,
		name varchar(50) COLLATE utf8_bin NOT NULL,
		numberOfGuests int(200) NOT NULL,
		PRIMARY KEY(id),
		FOREIGN KEY (userId) REFERENCES users(id));";

		$conn->query($statement) or die("failed!");
		
		} catch(PDOEXception $e) {
			die("Connection error:".$e->getMessage());
		}
?>
