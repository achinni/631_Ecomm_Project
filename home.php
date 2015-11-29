<?php
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
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
</head>
<body>

<!-- header -->
<!-- <nav class='navbar navbar-inverse'>
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
<div class='container-fluid'>
	<div class='jumbotron'>
		<h1>Welcome to e-Mart</h1>      
		<h4>Trending electronic mart!</h4>
	</div>
	
	<div class="col-md-4">
		<h2> <span class="col-md-offset-4"><span class="glyphicon glyphicon-user"></span> Login</span> </h2> <br/>
		<form action="user_login.php" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label class="control-label col-md-3" for="username">Username:</label>
				<div class="col-md-8">
				  <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
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
				  <button type="submit" class="btn btn-default">Sign-In</button>
				  &emsp;<a>Forgot Password</a>
				  <br/><br/>
				</div>
				
			</div>
		</form>
	</div>
	
	<div class="col-md-5">
		<h2> <span class="col-md-offset-4"> Sign up </span> </h2> <br/>
		<form class="form-horizontal" role="form">
		  <div class="form-group">
			<label class="control-label col-md-3" for="username">Username:</label>
			<div class="col-md-7">
			  <input type="text" class="form-control" id="username" placeholder="Enter username">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-md-3" for="pwd">Password:</label>
			<div class="col-md-7">
			  <input type="password" class="form-control" id="pwd" placeholder="Enter password">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-md-3" for="repwd">Re-type Password:</label>
			<div class="col-md-7">
			  <input type="password" class="form-control" id="repwd" placeholder="Re-type password">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-md-3" for="fname">First Name:</label>
			<div class="col-md-7">
			  <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-md-3" for="lname">Last Name:</label>
			<div class="col-md-7">
			  <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
			</div>
		  </div>
		  
		  <div class="form-group">
			<div class="col-md-offset-3 col-md-8">
			  <button type="submit" class="btn btn-default">Submit</button>
			</div>
		  </div>
		</form>
	</div>
	
	<div class="col-md-3">
		<div class="col-md-offset-0 col-md-12">
			<h2> <span class="col-md-offset-0"> Guest Mode </span> </h2> <br/>
			<button type = "button" class = "btn-lg btn-success">Proceed to Shopping</button>
		</div>
	</div>
	
</div>

  
  <!-- footer -->
  
</body>
</html>