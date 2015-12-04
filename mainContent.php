<?php
include 'connection.php';
	session_start();
	$uname = $_SESSION['user'];
	
	// if(empty($_SESSION['glass'])){
// 	$_SESSION['glass']=array();
// 	}
// 	if(empty($_SESSION['qnt'])){
// 		$_SESSION['qnt']=array();
// 			$_SESSION['qnt'] = 0;
// 	}
// 	if(empty($_SESSION['glass_id'])){
// 		$_SESSION['glass_id']=array();
// 	}
// 	if(empty($_SESSION['total'])){	//price
// 		$_SESSION['total']=array();
// 		$_SESSION['total'][0]=0;
// 	}

?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<title> Main Content </title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
	<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
</head>
<body>
<!-- BODY -->
	<div class='container-fluid'>
		<div id ="form">
			<form action="productHome.php" method="post" enctype="multipart/form-data">
				<input type="text" name="query" placeholder="Enter product description"/>
				<input type="submit" name="search" value="search" />
			</form>  
			</div>
		<?php
		if(isset($_POST['search']))
		  {
			$param = $_POST['query'];
			$query = "select * from products where make LIKE '%".$param."%' OR pid LIKE '%".$param."%'";
		  }
		  // else if(isset($_GET['make']))
// 		  {
// 			  $value = $_GET['make'];
// 			  $query = "select * from glasses where make='$value'";
// 		  }
// 		  else if(isset($_GET['polarized']))
// 		  {
// 			  $value = $_GET['polarized'];
// 			  $query = "select * from glasses where polarized='$value'";
// 		  }
// 		  else if(isset($_GET['gender']))
// 		  {
// 			  $value = $_GET['gender'];
// 			  $query = "select * from glasses where gender='$value'";
// 		  }
// 		  else if(isset($_GET['frameStyle']))
// 		  {
// 			  $value = $_GET['frameStyle'];
// 			  $query = "select * from glasses where frameStyle='$value'";
// 		  }
		  else{
			  $query = "select * from products" ;
		  }
		  $result = mysqli_query($connection, $query);
		  $count = mysqli_num_rows($result);
		  if($count <= 0)
		  {
			  echo "<h4 style='padding:15px'>No products found !!!</h4>";
		  }
		  else
		  {
		  while($row=mysqli_fetch_assoc($result))
				{
				echo "
					<table class='table table-striped' width = '500px'>
						<thead style='background-color:#CCE6FF'>
						  <tr>
							<th>".$row['pid']."</th>
							<th>".$row['make']."</th>
							<th>STYLE</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td width = '40%'>
								<img src = ".$row['imagePath']." width = '100%' alt = ".$row['pid']."></img> 
								 &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp
								<button type='button' class='btn btn-success' id='".$row['pid']."' onClick='cart(this.id)'>Add to Cart</button>
							</td>
							<td width = '30%'>
								<ul class='list-group'>
								  <li class='list-group-item'>MAKE: &nbsp ".$row['make']."</li>
								  <li class='list-group-item'>MODEL: &nbsp ".$row['model']."</li>
								  <li class='list-group-item'>YEAR: &nbsp ".$row['year']."</li>
  								  <li class='list-group-item'>PRICE: &nbsp $".$row['price']."</li>
								</ul>
							</td>
							<td width = '30%'>
								<ul class='list-group'>
								  <li class='list-group-item'>CATEGORY: &nbsp ".$row['category']."</li>
								  <li class='list-group-item'>SUB CATEGORY: &nbsp ".$row['subcategory']."</li>
								  <li class='list-group-item'>SELLER: &nbsp ".$row['seller']."</li>
  								  <li class='list-group-item'>STOCK: &nbsp ".$row['stock']."</li>
								</ul>
							</td>
						  </tr>
						</tbody>
					  </table>
					<br/>
					";
				}
		    }
			?>
		</div>
		
		<!-- 
<div class='clearfix visible-md'></div>
 -->

  </div>
<!-- body ends -->
  
</body>
</html>