<!-- RIGHT SIDEBAR -->
<div class="panel panel-info container-fluid" id="shopkart">
	
	<div class="panel-heading row">
	<div class="col-md-9">
	<button type="submit" id="btnkart" class="btn btn-link">
	<span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</button>
	</div>

	<div class="col-md-3"><form action = "productHome.php?action=empty" method="post">
	<button type="submit" class="btn btn-link"/>Empty </form> </div>
	</div>
	<div class="panel-body">
		
		<table id="cart" class="table table-hover table-condensed">
			<thead>
				<tr>
					<th width="50%"> Item </th>
					<th width="25%"> Price </th>
					<th width="15%"> Qty </th>
					<th width="10%"> A </th>
				</tr>
			</thead>
			<tbody>
			
			<?php		
				foreach ($_SESSION["cart_item"] as $item){
				$querycart1 = "select * from products where pid='".$item."'";

				$resultcart1 = mysqli_query($connection, $querycart1);
				$rowcart1 = mysqli_fetch_assoc($resultcart1);
			?>
			<tr>
			<td><?php echo $rowcart1['make']." ".$rowcart1['model']; ?></td>
			<td align="center"><?php echo "$".$rowcart1['price']; ?></td>
			<td><input type="number" onchange="updateQTY(this.id,this.value)" 
			id = "<?php echo $item; ?>" value="<?php echo $_SESSION['qty'][$item] ?>"></td>
			<td><a href="productHome.php?action=remove&id=<?php echo $item; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
			</tr>
			<?php
				$item_total += ($rowcart1["price"])*$_SESSION['qty'][$item];
			}
			?>

			</tbody>
			<tfoot>
				<tr>
					<td colspan="3"> <h4 id="subtot" class="text-center text-danger">
					Total = $ <?php $_SESSION['total'] = $item_total;
								echo $item_total; ?>
					</h4>
					<td><a href="productHome.php"><button class="btn btn-link">
					<span class="glyphicon glyphicon-refresh"></span></button> </a>
					</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="2">
					<a href="#" class="btn btn-success btn-block">Checkout</a></td>
					<td></td>
				</tr>
			</tfoot>
		</table>
		
	</div>
</div>


