<?php
	include 'connection.php';
	session_start();
	$_SESSION['user'] = $_POST['username'];
	$user = $_POST['username'];
	$password = $_POST['pwd'];
	$query = "select email,password from users where email='".$user."' and password='".$password."'";
	$result = mysqli_query($connection, $query);
	$num_rows = mysqli_num_rows($result);

	if($num_rows == 1)
	{
		header("Location: search.html");
// 		echo "
// 		<html>
// 		<head>
// 		<title>	Search </title>
// 		</head>
// 		<body>
// 		<p> Welcome </p>
// 		</body>
// 		</html>
// 		";
	}
?>