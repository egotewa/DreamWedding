<?php
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE IF NOT EXISTS guests (
	    id INT(11) AUTO_INCREMENT NOT NULL,
	    name VARCHAR(50) COLLATE utf8_bin NOT NULL,
	    gender VARCHAR(10),
	    location VARCHAR(50) COLLATE utf8_bin NOT NULL,
	    category_id INT(255) NOT NULL,
	    user_id INT(11) NOT NULL,
		PRIMARY KEY(id),
		FOREIGN KEY (category_id) REFERENCES guestcategories(id),
		FOREIGN KEY (user_id) REFERENCES users(id)
	);";

	$conn->query($sql) or die("failed!");

	$sql = "CREATE TABLE IF NOT EXISTS restaurants (
	    id INT(11) NOT NULL AUTO_INCREMENT,
	    name VARCHAR(30) COLLATE utf8_bin NOT NULL,
	    address VARCHAR(50) COLLATE utf8_bin NOT NULL,
	    telephone VARCHAR(50),
	    email VARCHAR(50),
	    hotel BIT NOT NULL,
	    capacity INT,
	    garden BIT NOT NULL,
	    pool BIT NOT NULL,
	    degustation BIT NOT NULL,
	    description VARCHAR(8000) COLLATE utf8_bin,
	    img VARCHAR(255),
	    PRIMARY KEY(id)
	);";

	$conn->query($sql) or die("failed!");
} catch(PDOEXception $e) {
	die("Connection error:".$e->getMessage());
}
?>