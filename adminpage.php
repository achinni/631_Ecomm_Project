<?php
	include 'connection.php';
	session_start();
	if($_SESSION['user'] != '631team0')
		echo "<meta http-equiv='refresh' content='0; url=home.php'>";
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
  

  <script type = "text/javascript">

	function showproducts(pid)
	{
	if (pid=="none")
	{
		//document.getElementById("company_name").value="";
		return;
	}
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var data = JSON.parse(xmlhttp.responseText);
			for(var i=0;i<data.length;i++) 
			{
			  document.getElementById("ustock").value = data[i].stock;
			  document.getElementById("umake").value = data[i].make;
			  document.getElementById("umodel").value = data[i].model;
			  document.getElementById("uyear").value = data[i].year;
			  document.getElementById("uprice").value = data[i].price;
			  document.getElementById("udesc").value = data[i].desc;
			  document.getElementById("useller").value = data[i].seller;
			}
		}
	}
	xmlhttp.open("GET","formupdate.php?pid="+pid,true);
	xmlhttp.send();
	}
  </script>
  
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
				echo "<meta http-equiv='refresh' content='0; url=welcome.php'>";
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
	

     
     <div class = "col-md-12">
       <ul class="nav nav-tabs nav-justified">
		<li id="home1" class="active"><a data-toggle="tab" href="#home">Home</a></li>
		<li id="products1"><a data-toggle="tab" href="#products">Update Products</a></li>
		<li id="addnew1"><a data-toggle="tab" href="#addnew">Add New Products</a></li>
	  </ul>

	  <div class="tab-content">
		<div id="home" class="tab-pane fade in active">
		  <h3>HOME</h3>
		  <p>Lorem ipsum dolor sit amet</p>
		</div>

		
		<div id="products" class="tab-pane fade">
		
		  <h3>Select a Product</h3>
		  <br/>
		  <form id="reg3" action="#" method="post" class="form-horizontal" role="form">
			<fieldset>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="upid">Product</label>  
			  <div class="col-md-8">
				<select id="upid" name="upid" type="text" placeholder="Product ID" 
				onChange="showproducts(this.value)" class="form-control input-md">
				<option value='none'>Select a product to update</option>
					<?php
						$pidquery = "select * from products";
						$pidres = mysqli_query($connection, $pidquery);
						
						while($pidrow = mysqli_fetch_assoc($pidres)) {
						echo"<option value='".$pidrow['pid']."'>";
						echo $pidrow['pid']." (".$pidrow['category']." - ".$pidrow['make']." ".$pidrow['model'].")";
						echo"</option>";
						}
					?>
				
				</select>
			  </div>
			</div>
	
			<div class="form-group">
			  <label class="col-md-2 control-label" for="umake">Make</label>  
			  <div class="col-md-3">
				<input id="umake" name="umake" type="text" placeholder="Enter Make" 
				class="form-control input-md">
			  </div>
			  
 			  <label class="col-md-2 control-label" for="umodel">Model</label>  
			  <div class="col-md-3">
				<input id="umodel" name="umodel" type="text" placeholder="Enter Model" class="form-control input-md">
			  </div>			  
			</div>


			<div class="form-group">
			  <label class="col-md-2 control-label" for="uyear">Year Released</label>  
			  <div class="col-md-3">
				<input id="uyear" name="uyear" type="text" placeholder="Enter Year Released" class="form-control input-md">
			  </div>
			  <label class="col-md-2 control-label" for="uprice">Price</label>  
			  <div class="col-md-3">
				<input id="uprice" name="uprice" type="text" placeholder="Enter New Price" class="form-control input-md">
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="ustock">Stock</label> 
			  <div class="col-md-3">
				<input id="ustock" name="ustock" type="text" placeholder="Enter New Quantity" class="form-control input-md">
			  </div>
			  
			  <label class="col-md-2 control-label" for="useller">Seller</label>  
			  <div class="col-md-3">
				<input id="useller" name="useller" type="text" placeholder="Enter New Seller" class="form-control input-md">
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="col-md-2 control-label" for="udesc">Description</label>  
			  <div class="col-md-8">
				<textarea id="udesc" name="udesc" rows="2" class="form-control input-md" 
				placeholder="Enter Product Description"></textarea>
			  </div>
			</div>

 			<div class="form-group">  		  
			  <div class="col-md-offset-4">
			  <button form="reg3" type="submit" name = "UpdateProducts" class="btn btn-success btn-lg">Update</button>
			  <span class = "col-md-offset-1">
			  <button form="reg3" type="reset" name = "ResetUpdate" class="btn btn-danger btn-lg">Cancel</button>
			  </span>
			  </div>
			</div>
		</fieldset>
		</form>
		
		<?php
			if(isset($_POST['UpdateProducts']))
			{
				if($pid =='none')
					echo "Error: Please Select a Product";
				else
				{
					$pid = $_POST['upid'];
					$make = $_POST['umake'];
					$model = $_POST['umodel'];
					$year = $_POST['uyear'];
					$price = $_POST['uprice'];
					$stock = $_POST['ustock'];
					$seller = $_POST['useller'];
					$desc = $_POST['udesc'];
				
					$proinsquery = "update products set make='".$make."', model='".$model."', 
					year='".$year."', price='".$price."', stock=".$stock.",
					seller='".$seller."', description='".$desc."' where pid='".$pid."'";
				
				
				
					if($proinsresult = mysqli_query($connection, $proinsquery))				
						echo "Successfully Updated";
					else
						echo "Error: ".$connection->error;
				}
				echo"
					<script type = 'text/javascript'>
					document.getElementById('products1').className = 'active';
					document.getElementById('products').className = 'tab-pane fade in active';
					document.getElementById('home1').className = '';
					document.getElementById('home').className = 'tab-pane fade';
					</script>
					";
			}
		?>
		
		</div>

		<div id="addnew" class="tab-pane fade">
		  <br/>
		  <form id="reg5" action="#" method="post" class="form-horizontal" role="form">
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
					<option>Select a Category</option>
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
				<input id="img" name="img" type="file" class="form-control input-md">
			  </div>
			</div>
			
			<div class="form-group">
			  <div class="col-md-offset-4">
			  <button form="reg5" type="submit" name = "psubmit" class="btn btn-success"> ADD </button>
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
					'".$category."', '".$subcategory."','".$price."', '".$seller."', '".$stock."', '".$img."')";
				$result = mysqli_query($connection, $query);
				
				if($result)
				{
					echo "Product Successfully Added";
				}
				else
				{
					echo"Error: ".$connection->error;
				}
				echo"
					<script type = 'text/javascript'>
					document.getElementById('addnew1').className = 'active';
					document.getElementById('addnew').className = 'tab-pane fade in active';
					document.getElementById('home1').className = '';
					document.getElementById('home').className = 'tab-pane fade';				
					</script>
					";
		  	}
		  ?>
		  
		</div>
	   </div>
	  </div>
	</div>
</div>

</body>
</html>