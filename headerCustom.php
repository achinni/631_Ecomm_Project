<?php
	include 'connection.php';
	session_start();
	
	if($_SESSION['user']!='Guest')
	{
		$user_query = "select * from users where username='".$_SESSION['user']."'";
		$user_result = mysqli_query($connection, $user_query);
		$user_details = mysqli_fetch_assoc($user_result);
	}
	else
	{
		$user_details['fname'] = 'Guest';
		$user_details['lname'] = '';
	}
?>
<!-- header -->
  <div class='container-fluid' style='margin-bottom:10px'>
    <div class='row' style='background-color:#b2cccc'>
     <div style='padding-top:10px'>
      <div class='col-md-2'> <h4><strong>Welcome <?php echo $user_details['fname']." ".$user_details['lname']; ?> !</strong></h4></div>
    <div class='col-md-7'>
        <form role='form' action="productHome.php" class='form-group' method="post" enctype="multipart/form-data">
		<div id ="form" class='input-group input-group-md'>
			<input type="text" class='form-control' name="query" placeholder="Enter product description">
			<div class="input-group-btn">
            <button type="submit" class='btn btn-warning' name="search" value="search" /> <span class="glyphicon glyphicon-search"></span> SEARCH </button>
			</div>
		</div>
		</form>  
     </div>
      <div class='col-md-3'>
    	<div class="dropdown" style='float:right'>
		  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <span class='glyphicon glyphicon-user'></span> My Account
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
			<li><a href="#">Purchase History</a></li>
			<li><a href="#">Update Profile</a></li>
			<li><a href="#">Logout</a></li>
		  </ul>
		</div>
    </div>
    </div>
   </div>
  </div>
<?php
	if(isset($_POST['logout']))
	{
		session_destroy();
		session_start();
		$_SESSION['user']='Guest';
		header('Location:welcome.php');
	}
?>