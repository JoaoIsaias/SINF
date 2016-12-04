<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Shopping Cart</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 style="margin-top: 0">Shopping Cart</h2>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Product</th>
								<th>Stock</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Subtotal</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Product name #1</td>
								<td>In Stock</td>
								<td>
									<input type="number" min="1" placeholder="1">
								</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-danger">
										<span class="glyphicon glyphicon-remove pull-left"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td>Product name #2</td>
								<td>In Stock</td>
								<td>
									<input type="number" min="1" placeholder="1">
								</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-danger">
										<span class="glyphicon glyphicon-remove pull-left"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td>Product name #3</td>
								<td>In Stock</td>
								<td>
									<input type="number" min="1" placeholder="1">
								</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-danger">
										<span class="glyphicon glyphicon-remove pull-left"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td>Product name #4</td>
								<td>In Stock</td>
								<td>
									<input type="number" min="1" placeholder="1">
								</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-danger">
										<span class="glyphicon glyphicon-remove pull-left"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td>Product name #5</td>
								<td>In Stock</td>
								<td>
									<input type="number" min="1" placeholder="1">
								</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-danger">
										<span class="glyphicon glyphicon-remove pull-left"></span>
									</button>
								</td>
							</tr>
						</tbody>
						<tfoot style="border-bottom: 2px solid #d5d5d5">
							<tr>
								<td></td>
								<td></td>
								<td>
									<button class="btn btn-primary pull-left">
										<span class="glyphicon glyphicon-refresh"></span> Update Quantity
									</button>
								</td>
								<td></td>
								<td><b>Total:</b> $24.99</td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<a href="index.php" class="btn btn-info">
				<span class="glyphicon glyphicon-triangle-left"></span> Continue Shopping
			</a>
			<a href="checkout.php" class="btn btn-success">
				<span class="glyphicon glyphicon-credit-card"></span> Checkout
			</a>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>