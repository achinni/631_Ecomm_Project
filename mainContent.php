<?php
include 'connection.php';
	session_start();
	$uname = $_SESSION['user'];
	$pageno = 1;
	$ino = 0;
	$noProdPage = 10;
?>

<script>
	$(".btn btn-info").click(function(){
		$(".col-md-12 collapse").attr('class','col-md-12 collapse');
	});
	$(document).click(function(){
	  $(".col-md-12 collapse").hide();
});
</script>

<!-- BODY -->
<div id='cartdetails'> </div>

<?php
	if(isset($_POST['search']))
	  {
		$param = $_POST['query'];
		$query = "select * from products where make LIKE '%".$param."%' OR pid LIKE '%".$param."%'";
	  }
	  else if(isset($_GET['category']))
	  {
		  $value = $_GET['category'];
		  $query = "select * from products where category='$value'";
	  }
	  else{
		  // $query = "select * from products left outer join reviews on products.pid=reviews.pid order by products.pid" ;
		  $query = "select * from products";
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
		<!-- <div class='panel-group' id='itemDescription'> <!~~ dont use it or mess with it - Adithya ~~> -->
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
				<?php if($ino % 2 != 0) {
					$prevItem = $row;
				?>
				<div class='row'>
				<div class='col-md-6'>
				<form id='cartform<?php echo $row['pid']?>' 
				action="productHome.php?action=add&id=<?php echo $row['pid']; ?>" 
				method='post'>
				<div class="panel panel-warning container-fluid">
				  <div class="panel-heading row">
				  <div class='col-md-9'><?php echo $row['make']." ".$row['model']; ?> </div>
				  <div class='col-md-3'>$<?php echo $row['price']; ?> </div>
				</div>
				  <div class="panel-body">
					  <img src = '<?php echo $row['imagePath'] ?>.jpg' width = '100%' alt = '<?php echo $row['pid'] ?>'></img> 
							 &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp

						<button type='submit' form='cartform<?php echo $row['pid']?>' class='btn btn-success' id= "1<?php echo $row['pid']?>">Add to cart</button>
						<button type='button' class='btn btn-info' data-toggle='collapse' data-target='#prod<?php echo $row['pid'] ?>' id= '<?php echo $row['pid'] ?>'>Detailed View</button>


				  </div>
				</div> <!-- panel ends -->
				</form>
				</div> <!-- col-1 ends -->
				<?php } ?>
				
				<?php if($ino % 2 == 0) { 
					$nextItem = $row;
				?>
				<div class='col-md-6'> <!-- col-2 starts -->
				<form id='cartform<?php echo $row['pid']?>' method='post' 
				action="productHome.php?action=add&code=<?php echo $row['pid']; ?>">
				<div class="panel panel-warning container-fluid">
				  <div class="panel-heading row">
				  <div class='col-md-9'><?php echo $row['make']." ".$row['model']; ?> </div>
				  <div class='col-md-3'>$<?php echo $row['price']; ?> </div>
				</div>

				  <div class="panel-body">
					  <img src = '<?php echo $row['imagePath'] ?>.jpg' width = '100%' alt = '<?php echo $row['pid'] ?>'></img> 
							 &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp
						<button type='submit' form='cartform<?php echo $row['pid']?>' class='btn btn-success' id= "1<?php echo $row['pid']?>">Add to cart</button>
						<button type='button' class='btn btn-info' data-toggle='collapse' data-target='#prod<?php echo $row['pid'] ?>' id= '<?php echo $row['pid'] ?>'>Detailed View</button>

				  </div>
				</div> <!-- panel ends -->
				</form>
				</div> <!-- col-2 ends -->

				<div id='prod<?php echo $prevItem['pid'] ?>' class='col-md-12 collapse'>
					<div class="panel panel-warning container-fluid">
					<div class="panel-heading row">
					  <div class='col-md-6'><?php echo $prevItem['make']." ".$prevItem['model']; ?> </div>
					  <div class='col-md-6'>DESCRIPTION</div>
					</div>
					<div class='panel-body row'>
						<div class='col-md-3'>
							<div class='row'>  CATEGORY </div>
							<div class='row'>  SUBCATEGORY </div>
							<div class='row'>  SELLER </div>
						</div>
						<div class='col-md-3'>
							<div class='row'> <?php echo $prevItem['category'];?></div>
							<div class='row'> <?php echo $prevItem['subcategory'];?></div>
							<div class='row'> <?php echo $prevItem['seller'];?></div>
						</div>
						<div class='col-md-6'><?php echo $prevItem['description'];?></div>
					</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">  <?php echo $prevItem['make']." ".$prevItem['model']; ?>  REVIEWS</div>
						<div class="panel-body">
							<?php
								$queryRev = "select * from reviews where reviews.pid ='".$prevItem['pid']."'";
								$resultRev = mysqli_query($connection, $queryRev);
	  							while($rowRev=mysqli_fetch_assoc($resultRev))
								{
									echo "- ".$rowRev['comment']."<br>";
								}
							?>
						</div>
					</div>
				  </div>

				<div id='prod<?php echo $row['pid'] ?>' class='col-md-12 collapse'>
					<div class="panel panel-warning container-fluid">
					<div class="panel-heading row">
					  <div class='col-md-6'><?php echo $row['make']." ".$row['model']; ?> </div>
					  <div class='col-md-6'>DESCRIPTION</div>
					</div>
					<div class='panel-body row'>
						<div class='col-md-3'>
							<div class='row'>  CATEGORY </div>
							<div class='row'>  SUBCATEGORY </div>
							<div class='row'>  SELLER </div>
						</div>
						<div class='col-md-3'>
							<div class='row'> <?php echo $row['category'];?></div>
							<div class='row'> <?php echo $row['subcategory'];?></div>
							<div class='row'> <?php echo $row['seller'];?></div>
						</div>
						<div class='col-md-6'><?php echo $row['description'];?></div>
					</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">   <?php echo $row['make']." ".$row['model']; ?>  REVIEWS</div>
						<div class="panel-body"> 
							<?php
								$queryRev1 = "select * from reviews where reviews.pid ='".$row['pid']."'";
								$resultRev1 = mysqli_query($connection, $queryRev1);
	  							while($rowRev1=mysqli_fetch_assoc($resultRev1))
								{
									echo "- ".$rowRev1['comment']."<br>";
								}
							?>
						</div>
					</div>
				</div>
				</div> <!-- row ends -->

				<script>
					$("#<?php echo $prevItem['pid'] ?>").click(function(){
						$("#prod<?php echo $nextItem['pid'] ?>").attr('class','col-md-12 collapse');
					});
				</script>
								
				<script>
					$("#<?php echo $nextItem['pid'] ?>").click(function(){
						$("#prod<?php echo $prevItem['pid'] ?>").attr('class','col-md-12 collapse');
					});
				</script>
				
				<?php } ?>
				
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
	<!-- 	</div>  --><!-- end item description -->
<!-- body ends -->
