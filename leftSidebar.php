<?php include "connection.php" ?>
<!-- LEFT SIDEBAR -->
<div class="panel-group" id="leftSidebar">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#leftSidebar" href="#brand">BRAND</a>
        </h4>
      </div>
      <div id="brand" class="panel-collapse collapse in">
        <div class="panel-body">
        	<ul class="list-group">
        		<?php $queryB = "SELECT distinct(`make`) FROM `products` order by `make` ";
					$resultB = mysqli_query($connection,$queryB);
					while($row = mysqli_fetch_array($resultB)){
						$make = $row['make']; ?>
						<div class="checkbox"><li class="list-group-item"><label><input type="checkbox" value=""><?php echo $make ?></label></li></div>
					<?php } ?>
        	</ul>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#leftSidebar" href="#category">CATEGORY</a>
        </h4>
      </div>
      <div id="category" class="panel-collapse collapse in">
        <div class="panel-body">
			<ul class="list-group">
        		<?php $queryC = "SELECT distinct(`category`) FROM `products` order by `category` ";
					$resultC = mysqli_query($connection,$queryC);
					while($row = mysqli_fetch_array($resultC)){
						$category = $row['category']; ?>
						<li class="list-group-item"><div class="checkbox"><label><input type="checkbox" value=""><?php echo $category ?></label></div></li>
				<?php } ?>
        	</ul>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#leftSidebar" href="#seller">SELLER</a>
        </h4>
      </div>
      <div id="seller" class="panel-collapse collapse in">
        <div class="panel-body">
			<?php $queryS = "SELECT distinct(`seller`) FROM `products` order by `seller` ";
				$resultS = mysqli_query($connection,$queryS);
				while($row = mysqli_fetch_array($resultS)){
					$seller = $row['seller']; ?>
					<div class="checkbox"><label><input type="checkbox" value=""><?php echo $seller ?></label></div>
			<?php } ?>
        </div>
      </div>
    </div>
  </div> 


<!-- sidebar ends -->
