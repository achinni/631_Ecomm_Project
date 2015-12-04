<?php
	include 'connection.php';
	session_start();
	$_SESSION['user']='Guest';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Welcome to e-Mart Home</title>
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
      <a class='navbar-brand' href='Welcome.php'>e-Mart</a>
    </div>
    <div>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='home.php'><span class="glyphicon glyphicon-home"></span> HOME</a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
		<!-- login dropdown for admin -->
		<li class="dropdown">
		
			<a class="dropdown-toggle" href="#" data-toggle="dropdown">
				<span class='glyphicon glyphicon-cog'></span> Admin <strong class="caret"></strong>
			</a>
			<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
				<form method="post" action="#" accept-charset="UTF-8">
					<input style="margin-bottom: 15px;" type="text" placeholder="Admin name" id="username" name="ausername">
					<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="apwd">
					<button class="btn btn-warning" name = "adminsubmit" type="submit" id="sign-in">Enter</button><br/>&nbsp;
				</form>
				
					<?php
					if(isset($_POST['adminsubmit']))
					{
						$user = $_POST['ausername'];
						$password = $_POST['apwd'];
						$query = "select username,password from admin where username='".$user."' and password='".$password."'";
						$result = mysqli_query($connection, $query);
						$num_rows = mysqli_num_rows($result);
						
						if($num_rows == 1)
						{
							$_SESSION['user'] = $user;
							header("Location:adminpage.php");
						}
						else
						{
							echo "
								<script type = 'text/javascript'>
								alert('Admin Not Found, Try Again');
								</script>
							";
						}
					}
				?>
				
			</div>
		</li>
		<!-- end of admin login -->
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
		<form data-toggle="validator" action="#" method="post" class="form-horizontal" role="form">
			<div class="form-group has-feedback">
				<label class="control-label col-md-3" for="username">Login ID:</label>
				<div class="col-md-8">
				  <input type="text" class="form-control" name="uusername" id="username" 
				  placeholder="Enter username / Email" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label class="control-label col-md-3" for="pwd">Password:</label>
				<div class="col-md-8">
				  <input type="password" class="form-control" name="pwd" id="pwd" 
				  data-toggle="validator" placeholder="Enter password" required>
				  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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
				$user = $_POST['uusername'];
				$password = $_POST['pwd'];
				$query1 = "select username,password from users where username='".$user."' and password='".$password."'";
				$result1 = mysqli_query($connection, $query1);
				$num_rows1 = mysqli_num_rows($result1);
				
				$query2 = "select username,email,password from users where email='".$user."' and password='".$password."'";
				$result2 = mysqli_query($connection, $query2);
				$num_rows2 = mysqli_num_rows($result2);
				
				if($num_rows1 == 1 || $num_rows2 == 1)
				{
					if($num_rows2 == 1)
					{
						$res = mysqli_fetch_assoc($result2);
						$user = $res['username'];
					}
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
		<form data-toggle="validator" class="form-horizontal" action="#" method="post" role="form">
		  <div class="form-group has-feedback">
			<label class="control-label col-md-3" for="remail">Email:</label>
			<div class="col-md-6">
			  <input type="email" class="form-control" name="email" id="remail" placeholder="Enter Email Address"
			  value="<?php if(isset($_POST['email'])) { echo htmlentities ($_POST['email']); }?>"
			  data-error="Email address is invalid" required>
			<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
		  </div>
		  
		  <div class="form-group has-feedback">
			<label class="control-label col-md-3" for="rusername">username:</label>
			<div class="col-md-6">
			  <input type="text" class="form-control" name="username" id="rusername" placeholder="Choose a username"
			  value="<?php if(isset($_POST['username'])) { echo htmlentities ($_POST['username']); }?>" required>
			  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
			</div>
		  </div>
	  
		  <div class="form-group">
			<div class="col-md-offset-3 col-md-7">
			  <button type="submit" name="registercheck" class="btn btn-info">Continue</button>
			</div>
		  </div>
		</form>
		<div class="col-md-offset-3 col-md-6">
		<p id = "exist" class="text-danger"></p>
		<p id = "available" class="text-success"> username & Email available, Please register below
		<br/><button type="button" data-toggle="modal" data-target="#registernow" class="btn btn-success col-md-offset-2 col-md-5">Register</button>
		</p>
		<script type = "text/javascript">
		document.getElementById("available").style.visibility = "hidden";
		</script>
		</div>
		
		<!-- registration popup-->
		<div class="modal fade" id="registernow" role="dialog">
		<div class="modal-dialog modal-lg">
	
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Complete the details below</h4>
			</div>
			
			<div class="modal-body">
			  <form id="reg" action="insert.php" method="post" class="form-horizontal" role="form">
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
						<input id="dob" type="text" class="form-control" name="dob" placeholder="MM/DD/YYYY Or MMDDYYYY"/>
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
				  <button form="reg" type="submit" name = "rsubmit" class="btn btn-success">Sign-Up</button>
				  <span class="col-md-offset-1"><button type="reset" class="btn btn-danger">Reset</button></span>
				  </div>
				</div>

				</fieldset>
				</form>
			</div>

			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="">
			  Close</button>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- end of registration popup-->
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
				
				if($num_rows1 == 1 && $num_rows2 == 1)
				{
					echo "
						<script type = 'text/javascript'>
						document.getElementById('exist').innerHTML = 'email & username already exists, Please change both..';
						</script>
					";
				}
				elseif($num_rows1 == 1)
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
	<div class="col-md-3">
		<div class="col-md-offset-0 col-md-12">
			<h2> Guest Mode </h2> <br/>
			<a href="producthome.php"><button type = "button" class = "btn btn-lg btn-success"> Proceed to Shopping </button>
		</div>
	</div>
	
</div>


  
  <!-- footer -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://1000hz.github.io/bootstrap-validator/dist/validator.min.js"></script>
<script src="http://platform.twitter.com/widgets.js"></script>
<script src="http://1000hz.github.io/bootstrap-validator/assets/js/application.js"></script>  
</body>
</html>