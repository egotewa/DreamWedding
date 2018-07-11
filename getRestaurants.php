<?php
	session_start();
	$serverName = "localhost";
	$dbName = "DreamWeddingDatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// $sql = "CREATE TABLE IF NOT EXISTS `RESTAURANTS` (
	 //    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	 //    `name` 	VARCHAR(30) NOT NULL,
	 //    `address` VARCHAR(50) NOT NULL,
	 //    `telephone` VARCHAR(50),
	 //    `email` VARCHAR(50),
	 //    `hotel` BIT NOT NULL,
	 //    `capacity` INT,
	 //    `garden` BIT NOT NULL,
	 //    `pool` BIT NOT NULL,
	 //    `degustation` BIT NOT NULL,
	 //    `description` VARCHAR(8000),
	 //    `img` VARCHAR(30)
		// ) ENGINE=InnoDB"; 
		// $sql = "DROP TABLE RESTAURANTS";  
	
		// $sql = "INSERT INTO RESTAURANTS (name, address, telephone, email, hotel, capacity, garden, pool, degustation, description, img)
  //   VALUES ('Family', 'гр. Пазарджик, Парк Острова', '0894 60 55 55', 'family@gmail.com', 1, 200, 0, 1, 0, 'Ресторант Фемили разполага с 200 места, като са смесени няколко стила, които допринасят за невероятният уют и комфорт. Кокетните сепарета дават възможност на влюбените двойки да организират своя романтичен обяд или вечеря. За бизнесмените има дискретни маси, където да проведат на спокойствие разговорите си. Ресторантът предлага широко разнообразие от ястия. Гостите могат да се насладят на богатата селекция вина от България и чужбина, специално избрани от нашите сомелиери.', 'img/family.jpg')";
		$sql = "SELECT * FROM RESTAURANTS";
		$query = $conn->query($sql) or die("failed");
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		$json = json_encode($result, JSON_UNESCAPED_UNICODE);
			// var_dump($json);
			echo $json;
	}catch (PDOException $e){
		die("Connection error:".$e->getMessage());
	}

?>