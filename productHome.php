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
	<iframe src = "header.html" scrolling="no" frameborder="0" width="100%"> </iframe>
	<div class='container-fluid text-center'>
	<div class='row content'>
		<div class='col-md-2 sidenav' style='background-color:#D8D8D7'>
			<iframe src = "leftSidebar.html" scrolling="no" frameborder="0"> </iframe>
		</div>
		<div class='col-md-8 text-left'>
			<iframe src = "mainContent.html" scrolling="no" frameborder="0"> </iframe>
		</div>
		<div class='col-md-2 sidenav' style='background-color:#D8D8D7'>
			<iframe src = "rightSidebar.html" scrolling="no" frameborder="0"> </iframe>
		</div>
	</div>
	</div>
</body>
</html>