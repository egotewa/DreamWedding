<?php 
	$myName=$_GET["atelName"];
	$conn=new PDO('mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8', 'root', '');
	$statement=$conn->query("SELECT * FROM atelier WHERE name='$myName'");
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $result[] = $row;
	}
	/*if(count($result)==0)
	{
		echo '<script> document.getElementById("notFound").style.display="inline"; </script>';
	}
	else
	{*/
		
		echo json_encode($result);
	
	//}
	
?>