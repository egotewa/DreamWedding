
<?php
/*

	Current code is used to add a new category and validate its name as well

*/
	session_start();
	$username=$_SESSION['username'];
	//category name validation- server sided
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$catError="";
		$category=$_POST["categoryName"];
		if(empty($_POST["categoryName"])) 
		{
			$catError="Name of the category is required!";
		}
		elseif (strlen($category)>255)
		{
			$catError="Maximum length of category name is 255 characters!";
		}
		else
		{
			$conn=new PDO('mysql:host=localhost;dbname=dreamweddingdatabase;charset=utf8', 'root', '');
			$stmt=$conn->query("SELECT id FROM users WHERE username='$username'");
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			$usrID=$row['id'];
			$statement=$conn->prepare("INSERT INTO guestcategories (userId,name,numberOfGuests) VALUES ('$usrID','$category',0)");
			if($catError=="")
			{
				$statement->execute();
			}
		}
		
		if($catError!="")
		{
			echo '<script>alert("' .$catError. '");</script>'; 
		}
		echo "<script>window.open('guestList.php','_self') </script>"; 
	
	}
	
	function test($inputData)
	{
			//removes excess spaces, tabs and newlines
			$inputData=trim($inputData);
			//removes backslashes from the inputData
			$inputData=stripslashes($inputData);
			//escaping html code
			$inputData=htmlspecialchars($inputData);
			
			return $inputData;
	}
	
	
?>
