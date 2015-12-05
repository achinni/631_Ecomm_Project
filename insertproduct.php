<?php
	if(isset($_POST['psubmit']))
	{
		$pid = $_POST['pid'];
		$make = $_POST['make'];
		$model = $_POST['model'];
		$year = $_POST['year'];
		$desc = $_POST['desc'];
		$category = $_POST['category'];
		$subcategory = $_POST['subcategory'];
		$price = $_POST['price'];
		$seller = $_POST['seller'];
		$stock = $_POST['stock'];
		$img = $_POST['img'];
	
		$query = "insert into products values
			('".$pid."', '".$make."', '".$model."', '".$year."', '".$desc."', 
			'".$category."', '".$subcategory."',".$price.", '".$seller."', '".$img."')";
		$result = mysqli_query($connection, $query);
	
		if($result)
		{
			header("Location:adminpage.php");
		}
		else
		{
			echo"Failed".$connection->error;
		}
	}
?>