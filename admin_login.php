<?php
	include 'connection.php';
	session_start();
	$_SESSION['user'] = $_POST['username'];
	$user = $_POST['username'];
	$password = $_POST['password'];
	$query = "select username,password from admin where username='".$user."' and password='".$password."'";
	$result = mysqli_query($connection, $query);
	$num_rows = mysqli_num_rows($result);

	if($num_rows == 1)
	{
		echo "
		<html>
		<head>
		<title>	Search </title>
		</head>
		<body>
		<p> Welcome ".$user."</p>
		</body>
		</html>
		";
	}
	else
	{
		echo "
		<html>
		<head>
		<title>	Search </title>
		</head>
		<body>
		<p> Admin not found</p>
		</body>
		</html>
		";
	}
?>