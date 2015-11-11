<!DOCTYPE html>
<html lang='en'>
<head>
  <title>HOME</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
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
        <li class='active'><a href='home.php'>HOME</a></li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
		<li><a href='#'><span class='glyphicon glyphicon-cog'></span> Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<!-- body -->
<div class='container'>
	<div class='jumbotron'>
		<h1>Welcome to e-Mart</h1>      
		<p>Trending electronic mart!</p>
	</div>
	<div class="col-sm-5">
		<h2> Login </h2>
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
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Submit</button>
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

  <div class='row'>
    
    <div class='clearfix visible-lg'></div>
  </div>
 </div>  
  
  <!-- footer -->
  
</body>
</html>