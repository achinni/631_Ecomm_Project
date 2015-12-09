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
		$user_details['street'] = '';
		$user_details['city'] = '';
		$user_details['state'] = '';
		$user_details['zip'] = '';
	}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>CONFIRM PURCHASE</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
</head>
<body>
	<!-- header -->
<?php include "header.php" ?>  
<?php include "headerCustom.php" ?>
<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<div class='panel panel-info'>
				<div class='panel-heading'> SHIPPING ADDRESS </div>
				<div class='panel-body'>
					<div class='col-md-6'>
						<div class='row'> NAME </div>
						<div class='row'> STREET </div>
						<div class='row'> CITY </div>
						<div class='row'> STATE </div>
						<div class='row'> ZIP </div>
					</div>
					<div class='col-md-6'>
						<div class='row'> <?php echo $user_details['fname']." ".$user_details['lname']; ?>  </div>
						<div class='row'> <?php echo $user_details['street']; ?>  </div>
						<div class='row'> <?php echo $user_details['city']; ?> </div>
						<div class='row'> <?php echo $user_details['state']; ?> </div>
						<div class='row'> <?php echo $user_details['zip']; ?> </div>
					</div>
				</div>
			</div>
		</div>
		
		<div class='col-md-12'>
			<div class='panel panel-success'>
				<div class='panel-heading'> PURCHASE DETAILS </div>
				<div class='panel-body'>
					<div class='row'>
						<div class='col-md-2'>PRODUCT<div>
						<div class='col-md-2'>CATEGORY<div>
						<div class='col-md-2'>SUBCATEGORY<div>
						<div class='col-md-2'>SELLER<div>
						<div class='col-md-2'>COUNT<div>
						<div class='col-md-2'>PRICE<div>
					</div>
					<!-- 
<?php while($row=mysqli_fetch_assoc($result))
					{
					?>
 -->
					<div class='row'>
						<div class='col-md-2'> make n model<!-- <?php echo $row['make']." ".$row['model']; ?> --> <div>
						<div class='col-md-2'> <!-- <?php echo $row['category'];?> --><div>
						<div class='col-md-2'> <!-- <?php echo $row['subcategory'];?> --><div>
						<div class='col-md-2'> <!-- <?php echo $row['seller'];?> --><div>
						<div class='col-md-2'>session for count<div>
						<div class='col-md-2'>session for price<div>
					</div>
	<!-- 				<?php } ?> -->
				</div>
				<div class='panel-footer'>
					<button>Confirm</button> <!-- proof of purchase on hitting confirm -->
				</div>
			</div>
		</div>

	</div>
</div>
<!-- footer -->
<div class='row'><?php include "footer.php" ?></div>
</body>
</html>