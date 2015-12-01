<?php
	include 'connection.php';
	session_start();

		echo "
		<html>
		<head>
		<title>	Search </title>
		</head>
		<body>
		<p> Welcome ".$_SESSION['user']."</p>
		</body>
		</html>
		";

?>