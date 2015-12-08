<!-- RIGHT SIDEBAR -->

		<div class="panel panel-info">
			<div class="panel-heading">Favourites List</div>
			<div class="panel-body">
				
				<table id="cart" class="table">
						<tr>
						<div class= 'row'>
							<div class='col-md-4'>
								<th>Product</th>
							</div>
							<div class='col-md-2'>
								<th class="text-center">Price</th>
							</div>
						</div>
						</tr>
				</table>
			</div>
		</div>
		
		<div class="panel panel-info">
			
			<div class="panel-heading">Shopping Cart<form action = "productHome.php?action=empty" method="post">
			<button type="submit" class="btn btn-link"/>
			Empty </form> </div>
			<div class="panel-body">
				
				<table id="cart" class="table table-hover table-condensed">
					<thead>
						<tr>
							<th width="50%"> Item </th>
<!-- 							<th width="15%"> Qty </th> -->
							<th align="center" width="25%"> Price </th>
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
<!-- 					<td><input type="number" value="1" name="quantity" min="1" max="5"></td> -->
					<td align="center"><?php echo "$".$rowcart1['price']; ?></td>
					<td><a href="productHome.php?action=remove&id=<?php echo $item; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
					<?php
						$item_total += ($rowcart1["price"]);
					}
					?>

					</tbody>
					<tfoot>
						<tr>
							<td colspan="2"> <h4 class="text-center text-danger">
							Subtotal = $<?php echo $item_total; ?></h4>
							<a href="#" class="btn btn-success btn-block">Checkout</a></td>
						</tr>
					</tfoot>
				</table>
				
			</div>
		</div>


