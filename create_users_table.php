<?php

	try{
		$conn = new PDO("mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$statement = "CREATE TABLE IF NOT EXISTS users (
	    id int(11) NOT NULL,
		name varchar(50) COLLATE utf8_bin NOT NULL,
		lastName varchar(50) COLLATE utf8_bin NOT NULL,
		username varchar(10) NOT NULL,
		passHash varchar(255) NOT NULL,
		email varchar(50) NOT NULL,
		birthdate date NOT NULL,
		confirmation tinyint(1) NOT NULL,
		salt varchar(60) DEFAULT NULL,
		city varchar(50) COLLATE utf8_bin DEFAULT NULL,
		telephone varchar(20) DEFAULT NULL,
		address varchar(100) COLLATE utf8_bin DEFAULT NULL,
		interests varchar(2000) COLLATE utf8_bin DEFAULT NULL,
		PRIMARY KEY(id));";

		$conn->query($statement) or die("failed!");
		
		$statement = "INSERT INTO users (id, name, lastName, username, passHash, email, birthdate, confirmation, salt, city, telephone, address, interests) VALUES
		(1, 'Елия', 'Асенова', 'eaasenova', '$2y$10$6305b73f90a632961ad5duQFVzHxHCL2l00WXcfxuVOvDvpkvkk0O', 'e_l_i_a@abv.bg', '2000-01-02', 1, '6305b73f90a632961ad5d9d7fab038', 'Перник', '0894329966', 'кв. Тева', 'I love weddings. :)');";
		
		$conn->query($statement) or die("failed!");
		
		} catch(PDOEXception $e) {
			die("Connection error:".$e->getMessage());
		}
?>