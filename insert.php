<?php
	include 'connection.php';
	session_start();
	
	$email = $_POST['email'];
	$user = $_POST['username'];
	$password = $_POST['pwd'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$dob1 = $_POST['dob'];
	$phone = $_POST['phone'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$pctype = $_POST['pctype'];
	$pcno = $_POST['pcno'];
	$pcexp = $_POST['pcexp'];
	$sctype = $_POST['sctype'];
	$scno = $_POST['scno'];
	$scexp = $_POST['scexp'];
	
	$dob2 = str_replace("/","",$dob1);
	$dob = substr($dob2,4,4)."-".substr($dob2,0,2)."-".substr($dob2,2,2);
	
	$query = "insert into users values
	('".$email."', '".$user."', '".$password."', '".$fname."', '".$lname."', '".$dob."', 
	'".$phone."','".$street."', '".$city."', '".$state."', '".$zip."', 
	'".$pctype."', '".$pcno."', '".$pcexp."','".$sctype."', '".$scno."', '".$scexp."','a')";
	$result = mysqli_query($connection, $query);
	
	if($result)
	{	
		$_SESSION['user'] = $user;
		header("Location:producthome.php");
	}
	
	else
	{
		echo "Error: " .$query;
	}
?>