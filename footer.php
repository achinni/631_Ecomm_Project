<?php
include 'connection.php';
	session_start();
	$uname = $_SESSION['user'];
	
	// if(empty($_SESSION['glass'])){
// 	$_SESSION['glass']=array();
// 	}
// 	if(empty($_SESSION['qnt'])){
// 		$_SESSION['qnt']=array();
// 			$_SESSION['qnt'] = 0;
// 	}
// 	if(empty($_SESSION['glass_id'])){
// 		$_SESSION['glass_id']=array();
// 	}
// 	if(empty($_SESSION['total'])){	//price
// 		$_SESSION['total']=array();
// 		$_SESSION['total'][0]=0;
// 	}

?>
<!-- FOOTER -->
  <hr>
  <footer>
	<div class='container'>
        <div class='row small'>
			<div class='col-md-4'>
				<ul style='list-style-type:none'>
					<li><h6>MAKES</h6></li>
					<?php
						$queryB = "SELECT distinct(`make`) FROM `products` order by `make` ";
						$resultB = mysqli_query($connection,$queryB);
						while($row = mysqli_fetch_array($resultB)){
							$make = $row['make'];
							echo"<li><a href='productHome.php?make=$make'>$make</a></li>";
						}
					?>
				</ul>
			</div>
			<div class='col-md-4'>
				<ul style='list-style-type:none'>
					<li><h6>SHOP</h6></li>
					<li><a href='#'>VIEW CART</a></li>
					<li><a href='#'>UPDATE PROFILE</a></li>
					<li><a href='#'>PREVIOUS PURCHASES</a></li>
					<li><a href='#'>LOGOUT</a></li>
				</ul>
			</div>
			<div class='col-md-4'>
				<ul style='list-style-type:none'>
					<li><h6>CATEGORY</h6></li>
					<?php
						$queryF = "SELECT distinct(`category`) FROM `products` order by `category` ";
						$resultF = mysqli_query($connection,$queryF);
						while($row = mysqli_fetch_array($resultF)){
							$category = $row['category'];
							echo"<li><a href='productHome.php?category=$category'>$category</a></li>";
						}
					?>
				</ul>
			</div>
		</div>
	</div>
   </footer>
<!-- footer ends -->
