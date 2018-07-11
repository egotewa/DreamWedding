<?php

	try{
		$conn = new PDO("mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$statement = "CREATE TABLE IF NOT EXISTS atelier (
				id varchar(255)  NOT NULL,
			  name varchar(1024)  COLLATE utf8_bin NOT NULL,
			  town varchar(1024)  COLLATE utf8_bin NOT NULL,
			  address varchar(1024)  COLLATE utf8_bin NOT NULL,
			divID varchar(100)  NOT NULL,
			  townID varchar(100)  NOT NULL,
			 addressID varchar(100)  NOT NULL,
			  imageName varchar(1024)  NOT NULL,
			  imageNameTemplate varchar(1024)  NOT NULL,
			  phone varchar(15) NOT NULL,
			  mail varchar(255) NOT NULL,
			  description varchar(10000) COLLATE utf8_bin NOT NULL,
				PRIMARY KEY(id));";

		$conn->query($statement) or die("failed!");
	
	
		} catch(PDOEXception $e) {
			die("Connection error:".$e->getMessage());
		}
?>
