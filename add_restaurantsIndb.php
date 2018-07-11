<?php
	$serverName = "localhost";
	$dbName = "dreamweddingdatabase";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO RESTAURANTS (name, address, telephone, email, hotel, capacity, garden, pool, degustation, description, img)
    	VALUES ('Ловен парк', 'гр. Пловдив, ул. Ясна поляна 10', '0878 63 63 40, 03264 23 90', 'lovenPark@gmail.com', 1, 600, 0, 1, 0, 'Напълно обновен, с нова елегантна визия ресторант Ловен парк Ви очаква. Тук ще бъдете посрещнати със стил и качество, типична европейска кухня и авторски изпълнения на Шеф Елена Сокерова. Комплекса разполага със закрита отопляема зимна градина, за удобство на всички пушачи, конферентна зала и уникална и голяма прохладна градина за летния сезон! Всяка вечер DJ и тематични вечери.', 'img/1_0.jpg')";
    	$conn->exec($sql);
    	$sql = "INSERT INTO RESTAURANTS (name, address, telephone, email, hotel, capacity, garden, pool, degustation, description, img)
    	VALUES ('Родопско ханче', 'с. Варвара, ул. 27, №71', '0888 00 06 05, 0888 00 06 11', 'rodopskoHanche@gmail.com', 0, 400, 0, 0, 0, 'Не можеш да пропуснеш Родопско ханче ако някога си пътувал по пътя София – Велинград. Оранжевите стени се забелязват от разстояние, а вечер зад тях може да се чуе веселата глъчка на хората, избрали да разпуснат тук. Всякакви хора ни посещават, карат, карат, а когато пътят им омръзне спират при нас за да си починат. А когато ни посетят – идват пак. Най-вече заради обстановката и музиката. Опитват от всички специалитети на кухнята.', 'img/2_0.jpg')";
    	$conn->exec($sql);
		$sql = "INSERT INTO RESTAURANTS (name, address, telephone, email, hotel, capacity, garden, pool, degustation, description, img)
    	VALUES ('Family', 'гр. Пазарджик, Парк Острова', '0894 60 55 55', 'family@gmail.com', 1, 200, 0, 1, 0, 'Ресторант Фемили разполага с 200 места, като са смесени няколко стила, които допринасят за невероятният уют и комфорт. Кокетните сепарета дават възможност на влюбените двойки да организират своя романтичен обяд или вечеря. За бизнесмените има дискретни маси, където да проведат на спокойствие разговорите си. Ресторантът предлага широко разнообразие от ястия. Гостите могат да се насладят на богатата селекция вина от България и чужбина, специално избрани от нашите сомелиери.', 'img/3_0.jpg')";
    	$conn->exec($sql);
    } catch(PRDOException $e)
    {
    	die("Connection error:".$e->getMessage());
    }
?>