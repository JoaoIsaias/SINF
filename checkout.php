<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Checkout</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 style="margin-top: 0">Checkout</h2>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Product</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Product name #1</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
							</tr>
							<tr>
								<td>Product name #2</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
							</tr>
							<tr>
								<td>Product name #3</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
							</tr>
							<tr>
								<td>Product name #4</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
							</tr>
							<tr>
								<td>Product name #5</td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
							</tr>
						</tbody>
						<tfoot style="border-bottom: 2px solid #d5d5d5">
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><b>Total: </b>$24.99</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="well">
					<h3 style="margin-top: 0">Send to:</h3>
					<div style="margin-bottom: 10px">
						<span>Full Name</span>
						<br>
						<span>Street Name</span>
						<br>
						<span>City Name</span>
						<br>
						<span>Postal Code</span>
					</div>
					<a href="#" class="btn btn-info">Change Address</a>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="well">
					<h3 style="margin-top: 0">Payment Method:</h3>
					<div class="radio">
						<label><input type="radio" name="optradio">Paypal</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="optradio">Credit Card</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row text-center" style="margin-bottom: 20px">
			<a href="shopping_cart.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-shopping-cart"></span> Back to Shopping Cart
			</a>
			<a href="#" class="btn btn-success">
				<span class="glyphicon glyphicon-ok"></span> Complete Purchase
			</a>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>