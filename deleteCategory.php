<?php 
	$myID=$_GET["ind"];
	$conn=new PDO('mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8', 'root', '');
	$statement=$conn->query("SELECT * FROM guestcategories WHERE id='$myID'");
	$row=$statement->fetch(PDO::FETCH_ASSOC);
	if($row["numberOfGuests"]!=0)
	{
		echo "Категория, към която принадлежат гости не може да бъде изтрита!";
	}
	else
	{
		$sql=$conn->query("DELETE FROM guestcategories WHERE id='$myID'");
		echo "Категорията бе изтрита успешно!";
	}
?>