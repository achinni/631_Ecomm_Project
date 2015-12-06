<?php include "connection.php" ?>
<!-- custom header -->
  <div class='container-fluid' style='margin-bottom:10px'>
    <div class='row' style='background-color:#b2cccc'>
     <div style='padding-top:10px'>
      <div class='col-md-2'> <h4><strong>Welcome <?php echo $user_details['fname']." ".$user_details['lname']; ?> !</strong></h4></div>
    <div class='col-md-7'>
        <form role='form' action="productHome.php" class='form-group' method="post" enctype="multipart/form-data">
		<div id ="form" class='input-group input-group-md'>
			<div class="dropdown input-group-btn">
            <button type="button" class='btn btn-default' name="category" data-toggle="dropdown"/></span> CATEGORY <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<?php $queryC = "SELECT distinct(`category`) FROM `products` order by `category` ";
						$resultC = mysqli_query($connection,$queryC);
						while($row = mysqli_fetch_array($resultC)){
							$category = $row['category']; ?>
							<li><a href="#"><?php echo $category ?></a></li>
					<?php } ?>
			  </ul>
			</div>
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