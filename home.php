<?php
	session_start();
	$_SESSION['user']="sample";
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>Welcome to e-Mart Home</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
</head>
<body>

<!-- header -->
<!-- <nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='home.html'>e-Mart</a>
    </div>
    <div>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='home.php'>HOME</a></li>
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
					<button class="btn btn-default" type="submit" id="sign-in">Enter</button><br/>&nbsp;
				</form>
			</div>
		</li>
      </ul>	
      <!-- end of login pop up -->
    </div>
  </div>
</nav> 
  
<!-- body -->
<div class='container'>
	<div class='jumbotron'>
		<h1>Welcome to e-Mart</h1>      
		<h4>Trending electronic mart!</h4>
	</div>
	<div class="col-sm-5">
		<h2> Login </h2>
		<form action="user_login.php" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label class="control-label col-sm-2" for="username">Username:</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="pwd">Password:</label>
				<div class="col-sm-6">
				  <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Sign-In</button>
				  &emsp;<a>Forgot Password</a>
				  <br/><br/>
				  <button type = "button" class = "btn-lg btn-success">Continue as Guest</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-sm-7">
		<h2> Sign up </h2>
		<form class="form-horizontal" role="form">
		  <div class="form-group">
			<label class="control-label col-sm-2" for="username">Username:</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="username" placeholder="Enter username">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Password:</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control" id="pwd" placeholder="Enter password">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="repwd">Re-type Password:</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control" id="repwd" placeholder="Re-type password">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="fname">First Name:</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="lname">Last Name:</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default">Submit</button>
			</div>
		  </div>
		</form>
	</div>
</div>

  
  <!-- footer -->
  
</body>
</html>