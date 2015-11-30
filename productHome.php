<!DOCTYPE html>
<head>
	<title> Header Frame </title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
	<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
</head>
<body>
	<?php include 'header.php' ?>
	<div class='row content'>
		<div class='col-md-2 sidenav' style='background-color:#D8D8D7'>
			<?php include 'leftSidebar.php' ?>
		</div>
		<div class='col-md-8 text-left'>
			<?php include 'mainContent.php' ?>
		</div>
		<div class='col-md-2 sidenav' style='background-color:#D8D8D7'>
			<?php include 'rightSidebar.php' ?>
		</div>
	</div>
</body>
</html>