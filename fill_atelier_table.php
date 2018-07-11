<?php

	try{
		$conn = new PDO("mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$statement = "INSERT INTO atelier (id, name, town, address, divID, townID, addressID, imageName, imageNameTemplate, phone, mail, description) VALUES
		('APlus', 'A Plus Atelier', 'София', 'Константин Величков 55', 'APlusDiv', 'APlusTown', 'APlusAddress', 'img/APlusButtonImage.jpg', 'img/APlusButtonImageTemplate.jpg', '0885 911 355', 'aplus@gmail.com', 'Ние се стремим се предлагаме на клиентите си комплексно решение за всички онези малки детайли, които правят сватбения ден и денят на кръщението на детето, тържествен и специален.Към клиентите, които са ни се доверили се отнасяме с внимание и индивидуален подход и с радост приветстваме и техните идеи за да направим заедно всичко специално и уникално, съобразено с техните предпочитания и избрания стил, защото всеки такъв повод е сам по себе си уникален.'),
		('Bella', 'Bella', 'Пловдив', 'Иван Ибришимов 42', 'BellaDiv', 'BellaTown', 'BellaAddress', 'img/BellaButtonImage.jpg', 'img/BellaButtonImageTemplate.jpg', '0987 710 113', 'bella@yahoo.com', 'И така, на ръката ви блести венчален пръстен, имате идеи, визия, желание и трепет да се потопите в море от красота и да подредите по вълнуващ, заинтригуващ и очарователен начин вашия сватбен ден!');";

		$conn->query($statement) or die("failed!");
		
		} catch(PDOEXception $e) {
			die("Connection error:".$e->getMessage());
		}
?>