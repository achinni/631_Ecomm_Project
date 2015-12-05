<?php
	include 'connection.php';
	session_start();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>e-Mart Administration</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css' />
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js'></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>  
  <script src='http://www.eyecon.ro/bootstrap-datepicker/js/google-code-prettify/prettify.js'></script>
</head>

<body>

<!-- header -->
<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand'>e-Mart</a>
    </div>
    <div>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='adminpage.php'><span class="glyphicon glyphicon-home"></span> HOME</a></li>
      </ul>
    </div>
    <div>
    <ul class='nav navbar-nav navbar-right'>
		<li class='active'>
		<form action = '#' method='post'>
		<button type="submit" name="logout" class="btn btn-link">logout</button>
		</form>
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				session_start();
				$_SESSION['user']='Guest';
				header('Location:welcome.php');
			}
		?>
		</li>
      </ul>
    </div>
  </div>
</nav>

<div class = "container-fluid">
  <div class="row">
      Welcome <?php echo $_SESSION['user'];  ?>
  </div>
  
  
</div>