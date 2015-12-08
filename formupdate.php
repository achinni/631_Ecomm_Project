<?php
	include "connection.php";
	
    $pid = $_GET['pid'];

	$getquery="select * from products where pid = '".$pid."'";
	$getresult = mysqli_query($connection, $getquery);
	
	$result = array();
	while($row=mysqli_fetch_assoc($getresult))
	{
		$make = $row['make'];
		$model = $row['model'];
		$year = $row['year'];
		$stock = $row['stock'];
		$price = $row['price'];
		$desc = $row['description'];
		$seller = $row['seller'];
		
		$result[] = 
		array( 'make' => $make, 'model' => $model, 'year' => $year, 'stock' => $stock, 
							'price' => $price, 'desc' => $desc, 'seller' =>$seller  );
	}
	echo json_encode($result);

?>