<?php include "connection.php" ?>
<!-- js -->
<script>
$(document).ready(function(){
  $("#seller").on("hide.bs.collapse", function(){
    $("#arrowbtnseller").html('<span class="glyphicon glyphicon-collapse-down"></span> SELLER');
  });
  $("#seller").on("show.bs.collapse", function(){
    $("#arrowbtnseller").html('<span class="glyphicon glyphicon-collapse-up"></span> SELLER');
  });
  $("#category").on("hide.bs.collapse", function(){
    $("#arrowbtncategory").html('<span class="glyphicon glyphicon-collapse-down"></span> CATEGORY');
  });
  $("#category").on("show.bs.collapse", function(){
    $("#arrowbtncategory").html('<span class="glyphicon glyphicon-collapse-up"></span> CATEGORY');
  });
  $("#brand").on("hide.bs.collapse", function(){
    $("#arrowbtnbrand").html('<span class="glyphicon glyphicon-collapse-down"></span> BRAND');
  });
  $("#brand").on("show.bs.collapse", function(){
    $("#arrowbtnbrand").html('<span class="glyphicon glyphicon-collapse-up"></span> BRAND');
  });
});
</script>

<!-- LEFT SIDEBAR -->
<div class="panel-group" id="leftSidebar">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <button type="button" id="arrowbtnbrand" class="btn btn-link" data-toggle="collapse" data-target="#brand">
      		<span class="glyphicon glyphicon-collapse-up"></span> BRAND
		  </button>
        </h4>
      </div>
      <div id="brand" class="panel-collapse collapse in">
        <div class="panel-body list-group">
			<?php $queryB = "SELECT distinct(`make`) FROM `products` order by `make` ";
				$resultB = mysqli_query($connection,$queryB);
				while($row = mysqli_fetch_array($resultB)){
					$make = $row['make']; ?>
					<a href='productHome.php?make=<?php echo $make ?>' class='list-group-item'><?php echo $make ?></a>
					<!-- <div class="checkbox"><label>&nbsp&nbsp<input type="checkbox" value=""><?php echo $make ?></label></div> -->
				<?php } ?>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <button type="button" id="arrowbtncategory" class="btn btn-link" data-toggle="collapse" data-target="#category">
      		<span class="glyphicon glyphicon-collapse-up"></span> CATEGORY
		  </button>
        </h4>
      </div>
      <div id="category" class="panel-collapse collapse in">
        <div class="panel-body list-group">
			<?php $queryC = "SELECT distinct(`category`) FROM `products` order by `category` ";
				$resultC = mysqli_query($connection,$queryC);
				while($row = mysqli_fetch_array($resultC)){
					$category = $row['category']; ?>

					<a href='productHome.php?category=<?php echo $category ?>' class='list-group-item'><?php echo $category ?></a>
					<!-- <div class="checkbox"><label>&nbsp&nbsp<input type="checkbox" value='<?php echo $category ?>'><?php echo $category ?></label></div> -->

			<?php } ?>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <button type="button" id="arrowbtnseller" class="btn btn-link" data-toggle="collapse" data-target="#seller">
      		<span class="glyphicon glyphicon-collapse-up"></span> SELLER
		  </button>
        </h4>
      </div>
	  <div id="seller" class="panel-collapse collapse in">
        <div class="panel-body list-group">
			<?php $queryS = "SELECT distinct(`seller`) FROM `products` order by `seller` ";
				$resultS = mysqli_query($connection,$queryS);
				while($row = mysqli_fetch_array($resultS)){
					$seller = $row['seller']; ?>
					<a href='productHome.php?seller=<?php echo $seller ?>' class='list-group-item'><?php echo $seller ?></a>
					<!-- <div class="checkbox"><label>&nbsp&nbsp<input type="checkbox" value=""><?php echo $seller ?></label></div> -->
			<?php } ?>
        </div>
      </div>
    </div>
  </div> 


<!-- sidebar ends -->
