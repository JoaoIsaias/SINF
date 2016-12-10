<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Wish List</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 style="margin-top: 0">Wish List</h2>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Product</th>
								<th>Stock</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Subtotal</th>
								<th>Shopping Cart</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="product.php">Product name #1</a></td>
								<td>In Stock</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-success pull-left">
										<span class="glyphicon glyphicon-plus"></span> Add
									</button>
								</td>
								<td>
									<button class="btn btn-danger pull-left">
										<span class="glyphicon glyphicon-remove"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td><a href="product.php">Product name #1</a></td>
								<td>In Stock</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-success pull-left">
										<span class="glyphicon glyphicon-plus"></span> Add
									</button>
								</td>
								<td>
									<button class="btn btn-danger pull-left">
										<span class="glyphicon glyphicon-remove"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td><a href="product.php">Product name #1</a></td>
								<td>In Stock</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-success pull-left">
										<span class="glyphicon glyphicon-plus"></span> Add
									</button>
								</td>
								<td>
									<button class="btn btn-danger pull-left">
										<span class="glyphicon glyphicon-remove"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td><a href="product.php">Product name #1</a></td>
								<td>In Stock</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-success pull-left">
										<span class="glyphicon glyphicon-plus"></span> Add
									</button>
								</td>
								<td>
									<button class="btn btn-danger pull-left">
										<span class="glyphicon glyphicon-remove"></span>
									</button>
								</td>
							</tr>
							<tr>
								<td><a href="product.php">Product name #1</a></td>
								<td>In Stock</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
								<td>
									<button class="btn btn-success pull-left">
										<span class="glyphicon glyphicon-plus"></span> Add
									</button>
								</td>
								<td>
									<button class="btn btn-danger pull-left">
										<span class="glyphicon glyphicon-remove"></span>
									</button>
								</td>
							</tr>
						</tbody>
						<tfoot style="border-bottom: 2px solid #d5d5d5">
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td><b>Total:</b> $24.99</td>
								<td>
									<button class="btn btn-primary pull-left">
										<span class="glyphicon glyphicon-plus"></span> Add All
									</button>
								</td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>