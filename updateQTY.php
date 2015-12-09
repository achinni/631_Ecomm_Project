<?php
	include "connection.php";
	session_start();
	
	$pid = $_GET['pid'];
    $_SESSION['qty'][$pid] = $_GET['qty'];

	$getquery="select * from products where pid = '".$pid."'";
	$getresult = mysqli_query($connection, $getquery);
	
	$result = array();
	while($row=mysqli_fetch_assoc($getresult))
	{
		$price = $row['price'];
		
		$_SESSION['subtotal'][$pid] = ($_SESSION['qty'][$pid])*$price;
		
		$result[] = 
		array( 'total' => array_sum($_SESSION['subtotal']) );
	}
	echo json_encode($result);

?>