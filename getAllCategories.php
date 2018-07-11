<?php 
	session_start();
	$username=$_SESSION['username'];
	$conn=new PDO('mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8', 'root', '');
	$stmt=$conn->query("SELECT id FROM users WHERE username='$username'");
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$usrID=$row['id'];
	$statement=$conn->query("SELECT * FROM guestcategories WHERE userId='$usrID'");
	while($row2 = $statement->fetch(PDO::FETCH_ASSOC)){
    $result[] = $row2;
	}
	
	echo json_encode($result);
?>
