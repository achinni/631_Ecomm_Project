<?php
	include 'connection.php';
	session_start();
	
	if($_SESSION['user']!='Guest' && $_SESSION['user']!='631team0')
	{
		$user_query = "select * from users where username='".$_SESSION['user']."'";
		$user_result = mysqli_query($connection, $user_query);
		$user_details = mysqli_fetch_assoc($user_result);
	}
	else
	{
		$user_details['fname'] = 'Guest';
		$user_details['lname'] = '';
	}
	
	if(!empty($_GET['action'])) {
	switch($_GET['action']) {
		case "add":
				$_SESSION['cart_item'][] = $_GET['id'];
				$_SESSION['qty'][$_GET['id']] = 1;
		break;
		case "remove":
			if(!empty($_SESSION['cart_item'])) {
				foreach($_SESSION['cart_item'] as $k => $v) {
						if($_GET['id'] == $v)
							unset($_SESSION['cart_item'][$k]);				
						if(empty($_SESSION['cart_item']))
							unset($_SESSION['cart_item']);
				}
			}
			if(!empty($_SESSION['qty'])) {
				foreach($_SESSION['qty'] as $k => $v) {
						if($k == $_GET['id'])
							unset($_SESSION['qty'][$k]);				
						if(empty($_SESSION['qty']))
							unset($_SESSION['qty']);
				}
			}
			if(!empty($_SESSION['subtotal'])) {
				foreach($_SESSION['subtotal'] as $k => $v) {
						if($k == $_GET['id'])
							unset($_SESSION['subtotal'][$k]);				
						if(empty($_SESSION['subtotal']))
							unset($_SESSION['subtotal']);
				}
			}
		break;
	
		case "empty":
 			unset($_SESSION['cart_item']);
 			unset($_SESSION['qty']);
 			unset($_SESSION['subtotal']);
 		break;	
	}
	}
	
?>

<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Search Products</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
  
  <script type = "text/javascript">

	function updateQTY(pid,qty)
	{
	if (pid=="")
	{
		//document.getElementById("company_name").value="";
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var data = JSON.parse(xmlhttp.responseText);
			for(var i=0;i<data.length;i++) 
			{
			  document.getElementById("subtot").innerHTML = "Total = $ "+data[i].total;
			}
		}
	}
	xmlhttp.open("GET","updateQTY.php?pid="+pid+"&qty="+qty,true);
	xmlhttp.send();
	}
  </script>

  
</head>
<body>
<!-- header -->
<?php include "header.php" ?>  
<?php include "headerCustom.php" ?>
<div class='container'>

<!-- body -->
	<div class='row'>
		<div class='col-md-2'><?php include "leftSidebar.php" ?></div>
		<div class='col-md-6'><?php include "mainContent.php" ?></div>
		<div class='col-md-4'><?php include "rightSidebar.php" ?></div>
	</div>
<!-- footer -->
	<div class='row'><?php include "footer.php" ?></div>
</div>
</body>
</html>