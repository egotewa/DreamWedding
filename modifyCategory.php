<?php 
	$myID=$_GET["id"];
	$myName=$_GET["newName"];
	$conn=new PDO('mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8', 'root', '');
	$statement=$conn->query("UPDATE guestcategories SET name='$myName' WHERE id='$myID'");
?>
