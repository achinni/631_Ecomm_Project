<?php
	include 'connection.php';
	//session_start();
	if($_SESSION['user'] !='631team0')
		header('Location:home.php');
	else
		$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <title>e-Mart Administration</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
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
      <a class='navbar-brand'>e-Mart</a>
    </div>
    <div>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='adminpage.php'><span class="glyphicon glyphicon-home"></span> HOME</a></li>
      </ul>
    </div>
    <div>
    <ul class='nav navbar-nav navbar-right'>
		<li class='active'>
		<form action = '#' method='post'>
		<button type="submit" name="logout" class="btn btn-link">logout</button>
		</form>
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				session_start();
				$_SESSION['user']='Guest';
				header('Location:welcome.php');
			}
		?>
		</li>
      </ul>
    </div>
  </div>
</nav>

<div class = "container-fluid">
  <div class="row">
     <h3> Welcome Srikanth, Adithya and Vamsi <?php echo $user; ?> </h3>
	
	 <div class = "col-md-3">
		<script>
		$(document).ready(function(){
		  $("#added").on("hide.bs.collapse", function(){
			$("#arrowbtnnewprod").html('<span class="glyphicon glyphicon-triangle-right"></span> New Products');
		  });
		  $("#added").on("show.bs.collapse", function(){
			$("#arrowbtnnewprod").html('<span class="glyphicon glyphicon-triangle-bottom"></span> New Products');
		  });
		  $("#prod").on("hide.bs.collapse", function(){
			$("#arrowbtnproduct").html('<span class="glyphicon glyphicon-triangle-right"></span> Product Updates');
		  });
		  $("#prod").on("show.bs.collapse", function(){
			$("#arrowbtnproduct").html('<span class="glyphicon glyphicon-triangle-bottom"></span> Product Updates');
		  });
		  $("#quantity").on("hide.bs.collapse", function(){
			$("#arrowbtninventory").html('<span class="glyphicon glyphicon-triangle-right"></span> Inventory Updates');
		  });
		  $("#quantity").on("show.bs.collapse", function(){
			$("#arrowbtninventory").html('<span class="glyphicon glyphicon-triangle-bottom"></span> Inventory Updates');
		  });
		});
		</script>

		<!-- LEFT SIDEBAR -->
		<div class="panel panel-info">
		<div class="panel-heading"><h4 class="panel-title"> HI </h4></div>
		</div>
		<div class="panel-group" id="leftSidebar">
			<div class="panel panel-info">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <button type="button" id="arrowbtninventory" class="btn btn-link" data-toggle="collapse" data-target="#quantity">
					<span class="glyphicon glyphicon-triangle-bottom"></span> Inventory Updates
				  </button>
				</h4>
			  </div>
			  <div id="quantity" class="panel-collapse collapse in">
				<div class="panel-body">
					<p> Inventory Change </p>
				</div>
			  </div>
			</div>
			  
			<div class="panel panel-info">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <button type="button" id="arrowbtnproduct" class="btn btn-link" data-toggle="collapse" data-target="#prod">
					<span class="glyphicon glyphicon-triangle-bottom"></span> Product Updates
				  </button>
				</h4>
			  </div>
			  <div id="prod" class="panel-collapse collapse in">
				<div class="panel-body">
					<p> Product Change </p>
				</div>
			  </div>
			</div>
			  
			<div class="panel panel-info">
			  <div class="panel-heading">
				<h4 class="panel-title">
				  <button type="button" id="arrowbtnnewprod" class="btn btn-link" data-toggle="collapse" data-target="#added">
					<span class="glyphicon glyphicon-triangle-bottom"></span> New Products
				  </button>
				</h4>
			  </div>
			  <div id="added" class="panel-collapse collapse in">
				<div class="panel-body">
					<p> New Products </p>
				</div>
			  </div>
		  	</div>
     	</div>
     </div>
     
     <div class = "col-md-9">
       <ul class="nav nav-tabs nav-justified">
		<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
		<li><a data-toggle="tab" href="#inventory">Update Inventory</a></li>
		<li><a data-toggle="tab" href="#products">Update Products</a></li>
		<li><a data-toggle="tab" href="#addnew">Add New Products</a></li>
	  </ul>

	  <div class="tab-content">
		<div id="home" class="tab-pane fade in active">
		  <h3>HOME</h3>
		  <p>Lorem ipsum dolor sit amet</p>
		</div>
		<div id="inventory" class="tab-pane fade">
		  <h3>Update Inventory</h3>

		  <br/>
		  <form id="reg" action="#" method="post" class="form-horizontal" role="form">
			<fieldset>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="pid">Product ID</label>  
			  <div class="col-md-2">
				<input id="pid" name="uPid" type="text" placeholder="Product ID" 
				class="form-control input-md">
			  </div>
			  
 			  <label class="col-md-2 control-label" for="desc">Description</label>  
			  <div class="col-md-3">
				<input id="desc" name="uDesc" type="text" class="form-control input-md" 
				placeholder="Enter Product Description"></textarea>
			  </div>
			
			  <div class="col-md-2">
			  <button form="reg" type="submit" name = "uSearch" class="btn btn-success">Search</button>
			  </div>
			</div>
		</fieldset>
		</form>
		
		
		<?php
		// and description like '%".$Desc."%'
		if (isset($_POST['search']))
		{
			$Pid = $_POST['uPid'];
			$Desc = $_POST['uDesc'];
			$query = "select * from products where pid='".$Pid."'";
			$result = mysqli_query($connection, $query);
			//$num_rows = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);
			if($result)
			{ echo"
			<script type = 'text/javascript'>
						document.getElementById('notinserted').innerHTML = 'error';
						</script>";
			}
			else
				echo"<script>alert('ERROR');</script>";
		}
		?>
		
		

		  <form id="reg" action="#" method="post" class="form-horizontal" role="form">
 		  <fieldset>
			<div class="form-group">  		  
			<br/>
		    <label class="col-md-2 control-label" for="stock">Stock</label> 
			  <div class="col-md-3">
				<input id="stock" name="uStock" type="text" placeholder="Enter Available Quantity" class="form-control input-md">
			  </div>
			</div>

			<div class="form-group">  		  
			<br/>
			  <div class="col-md-offset-5">
			  <button form="reg" type="submit" name = "UpdateInventory" class="btn btn-success btn-lg">Update</button>
			  </div>
			</div>
		</fieldset>
		</form>

		</div>
		<div id="products" class="tab-pane fade">
		
		  <h3>Search a Product</h3>
		  <br/>
		  <form id="reg" action="#" method="post" class="form-horizontal" role="form">
			<fieldset>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="pid">Product ID</label>  
			  <div class="col-md-2">
				<input id="pid" name="pid" type="text" placeholder="Product ID" 
				class="form-control input-md">
			  </div>
			  
 			  <label class="col-md-2 control-label" for="desc">Description</label>  
			  <div class="col-md-3">
				<input id="desc" name="desc" type="text" class="form-control input-md" 
				placeholder="Enter Product Description"></textarea>
			  </div>
			
			  <div class="col-md-2">
			  <button form="reg" type="submit" name = "search" class="btn btn-success">Search</button>
			  </div>
			</div>
			
		</fieldset>
		</form>
		  
		<form id="reg" action="#" method="post" class="form-horizontal" role="form">
		<fieldset>
			
		<br />
			<div class="form-group">
			  <label class="col-md-2 control-label" for="make">Make</label>  
			  <div class="col-md-3">
				<input id="make" name="make" type="text" placeholder="Enter Make" 
				class="form-control input-md">
			  </div>
			  
 			  <label class="col-md-2 control-label" for="model">Model</label>  
			  <div class="col-md-3">
				<input id="model" name="model" type="text" placeholder="Enter Model" class="form-control input-md">
			  </div>			  
			</div>

			<div class="form-group">
			  <label class="col-md-2 control-label" for="make">Make</label>  
			  <div class="col-md-3">
				<input id="make" name="make" type="text" placeholder="Enter Make" 
				class="form-control input-md">
			  </div>
			  
 			  <label class="col-md-2 control-label" for="model">Model</label>  
			  <div class="col-md-3">
				<input id="model" name="model" type="text" placeholder="Enter Model" class="form-control input-md">
			  </div>			  
			</div>

			<div class="form-group">
			  <label class="col-md-2 control-label" for="year">Year Released</label>  
			  <div class="col-md-3">
				<input id="year" name="year" type="text" placeholder="Enter Year Released" class="form-control input-md">
			  </div>
			  <label class="col-md-2 control-label" for="seller">Seller</label>  
			  <div class="col-md-3">
				<input id="seller" name="seller" type="text" placeholder="Enter Seller Details" class="form-control input-md">
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="desc">Description</label>  
			  <div class="col-md-8">
				<textarea id="desc" name="desc" rows="3" class="form-control input-md" 
				placeholder="Enter Product Description (Up to 200 Characters)"></textarea>
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-2 control-label" for="price">Price</label>  
			  <div class="col-md-3">
				<input id="price" name="price" type="text" placeholder="Enter Price" class="form-control input-md">
			  </div>
			  <label class="col-md-2 control-label" for="seller">Seller</label>  
			  <div class="col-md-3">
				<input id="seller" name="seller" type="text" placeholder="Enter Seller Details" class="form-control input-md">
			  </div>
			</div>
		
		  
 			<div class="form-group">
			  <label class="col-md-2 control-label" for="category">Category</label>  
			  <div class="col-md-3">
				<select id="category" name="category" 
				class="form-control input-md">
					<option>Camera</option>
					<option>Hard Drive</option>
					<option>Laptop</option>
					<option>Pendrive</option>
				</select>
			  </div>

			  <label class="col-md-2 control-label" for="subcategory">Sub-Category</label>  
			  <div class="col-md-3">
				<input id="subcategory" name="subcategory" type="text" placeholder="Enter Sub-Category" 
				class="form-control input-md">
			  </div>
			</div>

 			<div class="form-group">  
 		    <label class="col-md-2 control-label" for="img">Image</label> 
			  <div class="col-md-3">
				<input id="img" name="img" type="text" class="input-md">
			  </div>
		    <label class="col-md-2 control-label" for="stock">Stock</label> 
			  <div class="col-md-3">
				<input id="stock" name="stock" type="text" placeholder="Enter Available Quantity" class="form-control input-md">
			  </div>
			</div>

 			<div class="form-group">  		  
			  <div class="col-md-offset-5">
			  <button form="reg" type="submit" name = "UpdateProducts" class="btn btn-success btn-lg">Update</button>
			  </div>
			</div>
		</fieldset>
		</form>
		</div>

		<div id="addnew" class="tab-pane fade">
		  <br/>
		  <form id="reg" action="#" method="post" class="form-horizontal" role="form">
			<fieldset>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="pid">Product ID</label>  
			  <div class="col-md-3">
				<input id="pid" name="pid" type="text" placeholder="Enter Product ID" 
				class="form-control input-md">
			  </div>
			  
			  <label class="col-md-2 control-label" for="make">Make</label>  
			  <div class="col-md-3">
				<input id="make" name="make" type="text" placeholder="Enter Make" 
				class="form-control input-md">
			  </div>
			</div>
		
			<div class="form-group">
			  <label class="col-md-2 control-label" for="model">Model</label>  
			  <div class="col-md-3">
				<input id="model" name="model" type="text" placeholder="Enter Model" class="form-control input-md">
			  </div>
			  
			  <label class="col-md-2 control-label" for="year">Year Released</label>  
			  <div class="col-md-3">
				<input id="year" name="year" type="text" placeholder="Enter Year Released" class="form-control input-md">
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="desc">Description</label>  
			  <div class="col-md-8">
				<textarea id="desc" name="desc" rows="3" class="form-control input-md" 
				placeholder="Enter Product Description (Up to 200 Characters)"></textarea>
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="category">Category</label>  
			  <div class="col-md-3">
				<select id="category" name="category" 
				class="form-control input-md">
					<option>Camera</option>
					<option>Hard Drive</option>
					<option>Laptop</option>
					<option>Pendrive</option>
				</select>
			  </div>

			  <label class="col-md-2 control-label" for="subcategory">Sub-Category</label>  
			  <div class="col-md-3">
				<input id="subcategory" name="subcategory" type="text" placeholder="Enter Sub-Category" 
				class="form-control input-md">
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="price">Price</label>  
			  <div class="col-md-3">
				<input id="price" name="price" type="text" placeholder="Enter Price" class="form-control input-md">
			  </div>
			  <label class="col-md-2 control-label" for="stock">Stock</label> 
			  <div class="col-md-3">
				<input id="stock" name="stock" type="text" placeholder="Enter Available Quantity" class="form-control input-md">
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-2 control-label" for="seller">Seller</label>  
			  <div class="col-md-3">
				<input id="seller" name="seller" type="text" placeholder="Enter Seller Details" class="form-control input-md">
			  </div>
			  <label class="col-md-2 control-label" for="img">Image</label> 
			  <div class="col-md-3">
				<input id="img" name="img" type="text" class="input-md">
			  </div>
			</div>
			
			<div class="form-group">
			  <div class="col-md-offset-4">
			  <button form="reg" type="submit" name = "psubmit" class="btn btn-success">Sign-Up</button>
			  <span class="col-md-offset-1"><button type="reset" class="btn btn-danger">Reset</button></span>
			  </div>
			</div>

			</fieldset>
			</form>
		  <div class="col-md-offset-3">
		 	 
		  </div>
		  
		  <?php
		  	if(isset($_POST['psubmit']))
		  	{
		  		$pid = $_POST['pid'];
				$make = $_POST['make'];
				$model = $_POST['model'];
				$year = $_POST['year'];
				$desc = $_POST['desc'];
				$category = $_POST['category'];
				$subcategory = $_POST['subcategory'];
				$price = $_POST['price'];
				$seller = $_POST['seller'];
				$stock = $_POST['stock'];
				$img = $_POST['img'];
				
				$query = "insert into products values
					('".$pid."', '".$make."', '".$model."', '".$year."', '".$desc."', 
					'".$category."', '".$subcategory."',".$price.", '".$seller."', ".$stock.", '".$img."')";
				$result = mysqli_query($connection, $query);
				
				if($result)
				{
					echo"
					<script type = 'text/javascript'>
						document.getElementById('inserted').innerHTML = 
						'Product Successfully Added';
					</script>
					";
				}
				else
				{
					echo"
					<script type = 'text/javascript'>
						document.getElementById('notinserted').innerHTML = 'error';
						</script>
					";
				}
		  	}
		  ?>
		  
		</div>
	   </div>
	  </div>
	</div>
</div>

</body>
</html>