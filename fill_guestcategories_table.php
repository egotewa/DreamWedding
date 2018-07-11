<?php

	try{
		$conn = new PDO("mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$statement= "INSERT INTO guestcategories (id, userId, name, numberOfGuests) VALUES
		(1, 1, 'Приятели', 0),
		(4, 1, 'сем.Петрови', 0),
		(20, 1, 'Колеги', 0),
		(2, 1, 'Младоженци', 0),
		(3, 1, 'Кумове', 0),
		(18, 1, 'сем.Фотеви', 0),
		(22, 1, 'Приятели', 0);";
		
		$conn->query($statement) or die("failed!");
		
		} catch(PDOEXception $e) {
			die("Connection error:".$e->getMessage());
		}
?>