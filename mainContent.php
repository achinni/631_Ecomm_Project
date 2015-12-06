<?php
include 'connection.php';
	session_start();
	$uname = $_SESSION['user'];
	$pageno = 1;
	$ino = 0;
	$noProdPage = 10;
?>
<script src='addcart.js' type = 'text/javascript'></script>

<!-- BODY -->
<div id='cartdetails'> </div>

<?php
	if(isset($_POST['search']))
	  {
		$param = $_POST['query'];
		$query = "select * from products where make LIKE '%".$param."%' OR pid LIKE '%".$param."%'";
	  }
	  else{
		  $query = "select * from products" ;
	  }
	  $result = mysqli_query($connection, $query);
	  $count = mysqli_num_rows($result);
	  if($count <= 0)
	  {
		  echo "<h4 style='padding:15px'>No products found !!!</h4>";
	  }
	  else
	  {
	  	$pageno = ceil($count/ $noProdPage); ?>
	  	<ul class="nav nav-pills red">
  		<?php?> 
  			<li class='active'><a data-toggle="pill" href='#page1'><span class='badge'> 1 </span></a></li>
  		<?php for($i = 2; $i <= $pageno; $i++)
  		{ ?>
  			<li><a data-toggle="pill" href='#page<?php echo $i?>'><span class='badge'> <?php echo $i ?></span></a></li>
		<?php } ?>
		</ul>
		<div class="tab-content">
	  	<?php 
	  		$ino = 1;
	  		$pn = 1;
	  		$tot = 1;
	  		while($row=mysqli_fetch_assoc($result))
			{?>
				<?php if($pn == 1 && $ino == 1){ ?>
					<div id="page1" class="tab-pane fade in active">
				<?php } ?>
				<?php if($pn > 1 && $ino == 1){ ?>
					<div id="page<?php echo $pn?>" class="tab-pane fade"> 
				<?php } ?>
				<table class='table table-striped' width = '500px'>
					<thead style='background-color:#ffb266'>
					  <tr>
						<th><?php echo $row['pid'] ?></th>
						<th><?php echo $row['make'] ?></th>
						<th>STYLE</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td width = '40%'>
							<img src = '<?php echo $row['imagePath'] ?>' width = '100%' alt = '<?php echo $row['pid'] ?>'></img> 
							 &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp

							<button type='button' class='btn btn-success' id= '<?php echo $row['pid'] ?>'>Add to cart</button>
							<button type='button' class='btn btn-success' data-toggle='collapse' data-target='#prod<?php echo $row['pid'] ?>' id= '<?php echo $row['pid'] ?>'>Detailed View</button>
						</td>
						
						<script type = 'text/javascript'>
							$(document).ready(function(){
								$("#"+"<?php echo $row['pid'] ?>").click(function(){
									document.getElementById('cartdetails').innerHTML =
									"<?php $_SESSION['pid'][]=$row['pid'] ?>"+
									"<tr><div class= 'row'><div class='col-md-4'><th>Product</th>"+
							"</div><div class='col-md-2'><th>Price</th></div></div></tr>";
									document.getElementById('cartrow').innerHTML += 
		"<tr><td data-th='Product'><h5 class='nomargin'><?php echo $row['make'].' '.$row['model']; ?></h5>"+
		"</td><td data-th='Price'><?php echo '$ '.$row['price']; ?></td></tr>";
								});
							});
						</script>
						<td width = '30%'>
							<ul class='list-group'>
							  <li class='list-group-item'>MAKE: &nbsp <?php echo $row['make'] ?></li>
							  <li class='list-group-item'>MODEL: &nbsp <?php echo $row['model'] ?></li>
							  <li class='list-group-item'>YEAR: &nbsp <?php echo $row['year'] ?></li>
							  <li class='list-group-item'>PRICE: &nbsp<span class='text-danger'>
							  $</span> <?php echo $row['price'] ?></li>
							</ul>
						</td>
						<td width = '30%'>
							<ul class='list-group'>
							  <li class='list-group-item'>CATEGORY: &nbsp <?php echo $row['category'] ?></li>
							  <li class='list-group-item'>SUB CATEGORY: &nbsp <?php echo $row['subcategory'] ?></li>
							  <li class='list-group-item'>SELLER: &nbsp <?php echo $row['seller'] ?></li>
							  <li class='list-group-item'>STOCK: &nbsp <?php echo $row['stock'] ?></li>
							</ul>
						</td>
					  </tr>
					</tbody>
				  </table>
				  <div id='prod<?php echo $row['pid'] ?>' class='collapse'>
				  	<div class="panel panel-warning">
						<div class="panel-heading"> <?php echo $row['pid'] ?> DESCRIPTION</div>
						<div class="panel-body"> <?php echo $row['description'] ?></div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading"> <?php echo $row['pid'] ?> REVIEWS</div>
						<div class="panel-body"> </div>
					</div>
				  </div>
				<br/>
				<?php
				if($ino == $noProdPage || ($tot >= $count))
				{
					echo "</div>";
					$ino = 0;
					$pn++; 
				}
			$ino++;
			$tot++;
			}
		}
		?>
		</div>
<!-- body ends -->
