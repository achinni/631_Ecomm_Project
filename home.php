<?php
	include 'connection.php';
	session_start();
	$_SESSION['user']="Guest";
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Welcome to e-Mart Home</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" />

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
      <a class='navbar-brand' href='home.php'>e-Mart</a>
    </div>
    <div>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='home.php'><span class="glyphicon glyphicon-home"></span> HOME</a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
		<!-- login popup for admin -->
		<li class="dropdown">
			<a class="dropdown-toggle" href="#" data-toggle="dropdown">
				<span class='glyphicon glyphicon-cog'></span> Admin<strong class="caret"></strong>
			</a>
			<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
				<form method="post" action="admin_login.php" accept-charset="UTF-8">
					<input style="margin-bottom: 15px;" type="text" placeholder="Admin name" id="username" name="username">
					<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
					<button class="btn btn-warning" type="submit" id="sign-in">Enter</button><br/>&nbsp;
				</form>
			</div>
		</li>
		<!-- end of login pop up -->
      </ul>	
    </div>
  </div>
</nav> 
 
<!-- body -->
<div class='container-fluid'>
	<div class='jumbotron'>
		<h1>Welcome to e-Mart</h1>      
		<h4>Trending electronic mart!</h4>
	</div>
	
	<div class="col-md-4">
		<h2> <span class="col-md-offset-4"><span class="glyphicon glyphicon-user"></span> Login</span> </h2> <br/>
		<form action="#" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label class="control-label col-md-3" for="username">Login ID:</label>
				<div class="col-md-8">
				  <input type="text" class="form-control" name="username" id="username" placeholder="Enter username / Email">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3" for="pwd">Password:</label>
				<div class="col-md-8">
				  <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-3 col-md-10">
				  <button type="submit" name = "loginsubmit" class="btn btn-info">Sign-In</button>
				  &emsp;<a>Forgot Password</a>
				  <br/><br/>
				</div>
				
			</div>
		</form>
		<div class="col-md-offset-3 col-md-8">
		<p id = "nouser" class="text-danger"></p>
		</div>
		<?php
			if(isset($_POST['loginsubmit']))
			{
				$user = $_POST['username'];
				$password = $_POST['pwd'];
				$query1 = "select username,password from users where username='".$user."' and password='".$password."'";
				$result1 = mysqli_query($connection, $query1);
				$num_rows1 = mysqli_num_rows($result1);
				
				$query2 = "select email,password from users where email='".$user."' and password='".$password."'";
				$result2 = mysqli_query($connection, $query2);
				$num_rows2 = mysqli_num_rows($result2);
				
				if($num_rows1 == 1 || $num_rows2 == 1)
				{
					$_SESSION['user']=$user;
					header("Location:producthome.php");
				}
				else
				{
					echo "
						<script type = 'text/javascript'>
						document.getElementById('nouser').innerHTML = 'User Not Found, Please Try Again..';
						</script>
					";
				}
			}
		?>
	</div>
	
	<div class="col-md-5">
		<h2> <span class="col-md-offset-4"> Sign up </span> </h2> <br/>
		<form class="form-horizontal" action="#" method="post" role="form">
		  <div class="form-group">
			<label class="control-label col-md-3" for="remail">Email:</label>
			<div class="col-md-6">
			  <input type="text" class="form-control" name="email" id="remail" placeholder="Enter Email Address"
			  value="<?php if(isset($_POST['email'])) { echo htmlentities ($_POST['email']); }?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-md-3" for="rusername">username:</label>
			<div class="col-md-6">
			  <input type="text" class="form-control" name="username" id="rusername" placeholder="Choose a username"
			  value="<?php if(isset($_POST['username'])) { echo htmlentities ($_POST['username']); }?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-md-offset-3 col-md-7">
			  <button type="submit" name="registercheck" class="btn btn-info">Continue</button>
			</div>
		  </div>
		</form>
		<div class="col-md-offset-2 col-md-8">
		<p id = "exist" class="text-danger"></p>
		<p id = "available" class="text-success"> username & Email available, Please register below
		<br/><button type="button" data-toggle="modal" data-target="#registernow" class="btn btn-success col-md-offset-2 col-md-6">Register</button>
		
		<!-- registration popup-->
		<div class="modal fade" id="registernow" role="dialog">
		<div class="modal-dialog modal-lg">
	
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Complete the details below</h4>
			</div>
			<div class="modal-body">
			  
			  <form class="form-horizontal" action="#" method="post">
				<fieldset>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="regemail">Email</label>  
				  <div class="col-md-4">
					<input id="regemail" name="email" type="text" placeholder="Enter Email Address" class="form-control input-md">
				  </div>
				  
				  <label class="col-md-2 control-label" for="regusername">Username</label>  
				  <div class="col-md-4">
					<input id="regusername" name="username" type="text" placeholder="Enter Username" class="form-control input-md">
				  </div>
				</div>
				
				<script type="text/javascript">
					var user = document.getElementById("rusername").value;
					var email = document.getElementById("remail").value;
					document.getElementById("regusername").value = user;
					document.getElementById("regemail").value = email;
				</script>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="fname">First Name</label>  
				  <div class="col-md-4">
					<input id="fname" name="fname" type="text" placeholder="Enter First Name" class="form-control input-md">
				  </div>
				  
				  <label class="col-md-2 control-label" for="lname">Last Name</label>  
				  <div class="col-md-4">
					<input id="lname" name="lname" type="text" placeholder="Enter Last Name" class="form-control input-md">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="pwd">Password</label>  
				  <div class="col-md-4">
					<input id="pwd" name="pwd" type="password" placeholder="Enter Password" class="form-control input-md">
				  </div>
				  
				  <label class="col-md-2 control-label" for="rpwd">Re-Type Password</label>  
				  <div class="col-md-4">
					<input id="rpwd" name="rpwd" type="password" placeholder="Re-Type your Password" class="form-control input-md">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="dob">Date of Birth</label>  
				  <div class="col-md-4 date">
					<div class="input-group input-append date" id="datePicker" data-date-format="mm/dd/yyyy">
						<input id="dob" type="text" class="form-control" name="date" placeholder="MM/DD/YYYY"/>
						<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
					</div> 
				  </div>
				  
				  <script type = "text/javascript">
					$(function(){
						$('#datePicker').datepicker('show');
					});
				  </script>
				  
				  <label class="col-md-2 control-label" for="phone">Phone</label>  
				  <div class="col-md-4">
					<input id="phone" name="phone" type="text" placeholder="Enter Phone Number" class="form-control input-md">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="address">Address</label>  
				  <div class="col-md-4">
					<input id="address" name="street" type="text" placeholder="Enter House No., Street" class="form-control input-md">
				  </div>
				  <span class="col-md-2">
					<input id="address" name="city" type="text" placeholder="Enter City" class="form-control input-md">
				  </span>
				  <span class="col-md-2">
					<input id="address" name="state" type="text" placeholder="Enter State" class="form-control input-md">
				  </span>
				  <span class="col-md-2">
					<input id="address" name="zip" type="text" placeholder="Zip Code" class="form-control input-md">
				  </span>
				</div>
  
				<div class="form-group">
				  <label class="col-md-2 control-label" for="pcard">Primary Card (Default)</label>
				  <div class="col-md-4">
					<input id="pcard" name="pcno" type="text" placeholder="Card Number" class="form-control input-md">
				  </div>
				  <div class="col-md-3">
					<input id="pcard" name="pctype" type="text" placeholder="Card Type" class="form-control input-md">
				  </div>
				  <div class="col-md-3">
					<input id="pcard" name="pcexp" type="text" placeholder="Expiry (MM/YYYY)" class="form-control input-md">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="scard">Secondary Card (Optional)</label>
				  <div class="col-md-4">
					<input id="scard" name="scno" type="text" placeholder="Card Number" class="form-control input-md">
				  </div>
				  <div class="col-md-3">
					<input id="scard" name="sctype" type="text" placeholder="Card Type" class="form-control input-md">
				  </div>
				  <div class="col-md-3">
					<input id="scard" name="scexp" type="text" placeholder="Expiry (MM/YYYY)" class="form-control input-md">
				  </div>
				</div>

				<div class="form-group">
				  <div class="col-md-offset-4">
				  <button type="submit" name = "registersubmit" class="btn btn-success">Sign-Up</button>
				  <span class="col-md-offset-1"><button type="reset" class="btn btn-danger">Reset</button></span
				  </div>
				</div>

				</fieldset>
				</form>
				
				<?php
				if(isset($_POST['registersubmit']))
				{
					$email = $_POST['regemail'];
					$user = $_POST['regusername'];
					$password = $_POST['pwd'];
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$dob = $_POST['dob'];
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
					
					$query = "insert into users values
					('".$email."', '".$user."','".$fname."', '".$lname."', '".$dob."', 
					'".$phone."','".$street."', '".$city."', '".$state."', ".$zip.", 
					".$pctype.", '".$pcno."', '".$pcexp."',".$sctype.", '".$scno."', '".$scexp."','a')";
					$result = mysqli_query($connection, $query);
				
					if($result)
					{
						$_SESSION['user']=$user;
						header("Location:producthome.php");
					}
					else
					{
						echo "Error: " . $query . "<br>" . $conn->error;
					}
				}
			?>
				
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="">
			  Close</button>
			</div>
		  </div>
	  
		</div>
	  </div>
	  <!-- end of registration popup-->
	  </p>
		<script type = "text/javascript">
		document.getElementById("available").style.visibility = "hidden";
		</script>
		</div>
		<?php
			if(isset($_POST['registercheck']))
			{
				$user = $_POST['username'];
				$email = $_POST['email'];
				
				$query1 = "select email from users where email='".$email."'";
				$result1 = mysqli_query($connection, $query1);
				$num_rows1 = mysqli_num_rows($result1);
				
				$query2 = "select username from users where username='".$user."'";
				$result2 = mysqli_query($connection, $query2);
				$num_rows2 = mysqli_num_rows($result2);
				
				if($num_rows1 == 1)
				{
					echo "
						<script type = 'text/javascript'>
						document.getElementById('exist').innerHTML = 'email already registered, Please login..';
						</script>
					";
				}
				
				elseif($num_rows2 == 1)
				{
					echo "
						<script type = 'text/javascript'>
						document.getElementById('exist').innerHTML = 'username already exists, Try a different one..';
						</script>
					";
				}
				else
				{
					echo "
						<script type = 'text/javascript'>
						document.getElementById('available').style.visibility = 'visible';
						</script>
					";
				}
			}
		?>
	</div>
	
	<div class="col-md-3">
		<div class="col-md-offset-0 col-md-12">
			<h2> Guest Mode </h2> <br/>
			<button type = "button" class = "btn-lg btn-success"> Proceed to Shopping </button>
		</div>
	</div>
	
</div>

  
  <!-- footer -->
  
</body>
</html>