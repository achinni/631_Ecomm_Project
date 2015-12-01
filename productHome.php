<?php
	include 'connection.php';
	session_start();
	
	if($_SESSION['user']!='Guest')
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
</head>
<body>

<!-- header -->
<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='home.php'>e-Mart</a>
    </div>
    <div>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='home.php'>HOME</a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
		<li><a href='#'><span class='glyphicon glyphicon-cog'></span> Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<!-- body -->
	<p> Welcome <?php echo $user_details['fname']." ".$user_details['lname']; ?></p>
<!-- footer -->
  
</body>
</html>