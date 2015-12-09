<?php 
	include "connection.php";
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
	$uname = $_SESSION['user'];
	$queryU = "select * from users
			  where username = '".$uname."'";
	$resultU = mysqli_query($connection, $queryU);
	$num_rows = mysqli_num_rows($resultU);
	$rowU;
	if($num_rows == 1)
	{
		$rowU=mysqli_fetch_assoc($resultU); 
		$dob1 = $rowU['dob'];
		$dobtemp = str_replace("-","",$dob1);
		$dob = substr($dobtemp,4,2)."/".substr($dobtemp,6,2)."/".substr($dobtemp,0,4); 
	}
?>
<script type = "text/javascript">
	// $(".dropdown-menu li a").click(function(){
// 	  $(this).parents(".dropdown input-group-btn").find('#categoryBtn').text($(this).text);
// 	  $(this).parents(".dropdown input-group-btn").find('#categoryBtn').val($(this).text);
// 	});
	$(".dropdown-menu li a").click(function(){
		$("#categoryBtn").attr('value','whatever');
	});
</script>
<!-- custom header -->
  <div class='container-fluid' style='margin-bottom:10px'>
    <div class='row' style='background-color:#b2cccc'>
     <div style='padding-top:10px'>
      <div class='col-md-2'> <h4><strong>Welcome <?php echo $user_details['fname']." ".$user_details['lname']; ?> !</strong></h4></div>
    <div class='col-md-7'>
        <form role='form' action="productHome.php" class='form-group' method="post" enctype="multipart/form-data">
		<div id ="form" class='input-group input-group-md'>
			<div class="dropdown input-group-btn">
            <button type="button" class='btn btn-default' id="categoryBtn" name="category" data-toggle="dropdown">CATEGORY <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="productHome.php?category like '%'">ALL</a></li>
					<?php $queryC = "SELECT distinct(`category`) FROM `products` order by `category` ";
						$resultC = mysqli_query($connection,$queryC);
						while($row = mysqli_fetch_array($resultC)){
							$category = $row['category']; ?>
							<li><a href="productHome.php?category=<?php echo $category ?>"><?php echo $category ?></a></li>
							
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
    	<?php if($uname != 'Guest') { ?>
		  <div class="dropdown" style='float:right'>
		  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <span class='glyphicon glyphicon-user'></span> My Account
		  <span class="caret"></span></button>
		  <ul class="dropdown-menu">
			<li><a href="#">Purchase History</a></li>
			<li><a data-toggle="modal" href="#update">Update Profile</a></li>
			<li><a href="#">Logout</a></li>
		  </ul>
		</div>
			<?php } ?>
    </div>
    </div>
   </div>
  </div>
  
  <!-- registration popup-->
		<div class="modal fade" id="update" role="dialog">
		<div class="modal-dialog modal-lg">
	
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Update</h4>
			</div>
			<div class="modal-body">
			  <form id="updateUser" action="updateUser.php" method="post" class="form-horizontal" role="form">
				<fieldset>
				<div class="form-group">
				  <label class="col-md-2 control-label" for="regemail">Email</label>  
				  <div class="col-md-4">
					<input id="regemail" name="email" type="text" value='<?php echo $rowU['email']; ?>' class="form-control input-md" readonly>
				  </div>
				  
				  <label class="col-md-2 control-label" for="regusername">Username</label>  
				  <div class="col-md-4">
					<input id="regusername" name="username" type="text" value='<?php echo $rowU['username'] ?>' class="form-control input-md" readonly>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="fname">First Name</label>  
				  <div class="col-md-4">
					<input id="fname" name="fname" type="text" value='<?php echo $rowU['fname'] ?>' class="form-control input-md">
				  </div>
				  
				  <label class="col-md-2 control-label" for="lname">Last Name</label>  
				  <div class="col-md-4">
					<input id="lname" name="lname" type="text" value='<?php echo $rowU['lname'] ?>' class="form-control input-md">
				  </div>
				</div>
				<?php
				$decpwd = decryptIt($rowU['password']);
				$decpcno = decryptIt($rowU['pcardno']);
				$decscno = decryptIt($rowU['scardno']);
				function encryptIt( $q ) {
					$cryptKey  = 'nanee01358386';
					$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
					return( $qEncoded );
				}

				function decryptIt( $q ) {
					$cryptKey  = 'nanee01358386';
					$qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
					return( $qDecoded );
				}
				?>
				<div class="form-group">
				  <label class="col-md-2 control-label" for="pwd">Password</label>  
				  <div class="col-md-4">
					<input id="rpwd" name="pwd" type="password" value='<?php echo $decpwd ?>' class="form-control input-md">
				  </div>
				  
				  <label class="col-md-2 control-label" for="rpwd">Re-Type Password</label>  
				  <div class="col-md-4">
					<input id="rrpwd" name="rpwd" type="password" value='<?php echo $decpwd ?>' class="form-control input-md">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="dob">Date of Birth</label>  
				  <div class="col-md-4 date">
					<div class="input-group input-append date" id="datePicker" data-date-format="mm/dd/yyyy">
						<input id="dob" type="text" class="form-control" name="dob" value='<?php echo $dob; ?>'/>
						<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
					</div> 
				  </div>
				  
				  <script type = "text/javascript">
					$(function(){
						$('#datePicker').datepicker('show');
					});
				  </script>
				  

				  <label class="col-md-2 control-label" for="phone">Phone</label>  
				  <div class="col-md-4">
					<input id="phone" name="phone" type="text" value='<?php echo $rowU['phone'] ?>' class="form-control input-md">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="address">Address</label>  
				  <div class="col-md-4">
					<input id="street" name="street" type="text" value='<?php echo $rowU['street'] ?>' class="form-control input-md">
				  </div>
				  <span class="col-md-2">
					<input id="city" name="city" type="text" value='<?php echo $rowU['city'] ?>' class="form-control input-md">
				  </span>
				  <span class="col-md-2">
					<input id="state" name="state" type="text" value='<?php echo $rowU['state'] ?>' class="form-control input-md">
				  </span>
				  <span class="col-md-2">
					<input id="zip" name="zip" type="text" value='<?php echo $rowU['zip'] ?>' class="form-control input-md">
				  </span>
				</div>
  
				<div class="form-group">
				  <label class="col-md-2 control-label" for="pcard">Primary Card (Default)</label>
				  <div class="col-md-4">
					<input id="pcard" name="pcno" type="text" value='<?php echo $decpcno ?>' class="form-control input-md">
				  </div>
				  <div class="col-md-3">
					<select id="pcard" name="pctype" type="text" value='<?php echo $rowU['pcardtype'] ?>' class="form-control input-md">
					<option> VISA </option>
					<option> Master </option>
					<option> AMEX </option>
					<option> Discover </option>
					</select>
				  </div>
				  <div class="col-md-3">
					<input id="pcard" name="pcexp" type="text" value='<?php echo $rowU['pcardexp'] ?>' class="form-control input-md">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-md-2 control-label" for="scard">Secondary Card (Optional)</label>
				  <div class="col-md-4">
					<input id="scard" name="scno" type="text" value='<?php echo $decscno ?>'
					placeholder='Card Number' class="form-control input-md">
				  </div>
				  <div class="col-md-3">
					<input id="scard" name="sctype" type="text" value='<?php echo $rowU['scardtype'] ?>' 
					placeholder='Card Type' class="form-control input-md">
				  </div>
				  <div class="col-md-3">
					<input id="scard" name="scexp" type="text" value='<?php echo $rowU['scardexp'] ?>'
					placeholder='Card Expiry' class="form-control input-md">
				  </div>
				</div>

				<div class="form-group">
				  <div class="col-md-offset-4">
				  <button form="updateUser" type="submit" name="usubmit" class="btn btn-success">Update</button>
				  <span class="col-md-offset-1"><button type="reset" class="btn btn-danger">Reset</button></span>
				  </div>
				</div>
				</fieldset>
				</form>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="">
			  Close</button>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- end of registration popup-->

<?php
	if(isset($_POST['logout']))
	{
		//session_unset();
		session_destroy();
		session_start();
		$_SESSION['user']='Guest';

		echo "<meta http-equiv='refresh' content='0; url=welcome.php'>";
	}
?>
