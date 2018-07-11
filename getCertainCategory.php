<?php 
	$myID=$_GET["id"];
	$conn=new PDO('mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8', 'root', '');
	$statement=$conn->query("SELECT * FROM guestcategories WHERE id='$myID'");
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $result[] = $row;
	}
	
	echo json_encode($result);
?>
