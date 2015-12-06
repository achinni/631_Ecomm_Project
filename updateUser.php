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
	
	$query = "update users 
			  set email='".$email."', username='".$user."', password='".$password."', fname='".$fname."', lname='".$lname."', dob='".$dob."', 
				phone='".$phone."', street='".$street."', city='".$city."', state='".$state."', zip='".$zip."', 
				pcardtype='".$pctype."', pcardno='".$pcno."', pcardexp='".$pcexp."', scardtype='".$sctype."', scardno='".$scno."', scardexp='".$scexp."'
				where username='".$user."'";
	$result = mysqli_query($connection, $query);
	
	if($result)
	{	
		$_SESSION['user'] = $user;

		require("PHPMailer-master/PHPMailerAutoload.php");
		ini_set("SMTP","ssl://smtp.gmail.com"); 
		ini_set("smtp_port","465");
		$mail = new PHPMailer();
		$mail->SMTPAuth = true;
		$mail->Host = "smtp.gmail.com"; // SMTP server
		$mail->SMTPSecure = "ssl";
		$mail->Username = "test.emartshop@gmail.com"; 
		$mail->Password = "emart@631";
		$mail->Port = "465";
		$mail->isSMTP();
		$mail->AddAddress($email);
		$mail->Subject  = "e-Mart Customer Details Updation Successful";
		$mail->Body     = 
		
		"
		You have successfully updated your profile at e-Mart.com
		In order to login please visit http://localhost:81/home.php
		Your login details are as follows:
		------------------------
		username :".$user."
		password :".$password."
		------------------------
		
		Keep your login details safe.
		
		regards,
		Team e-Mart
		";
		$mail->WordWrap = 200;
		if(!$mail->Send()) {
		echo 'Message was not sent!.';
		echo 'Mailer error: ' . $mail->ErrorInfo;
		} else {
		echo  //Fill in the document.location thing
		'<script type="text/javascript">
								if(confirm("Your mail has been sent"))
								document.location = "/";
				</script>';
		}
		
		
		header("Location:producthome.php");
	}
	
	else
	{
		echo "Error: " .$connection->error;
	}
?>