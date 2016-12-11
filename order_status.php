<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Delivery Status</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 style="margin-top: 0">Order #1</h2>
				<p><b>Ordered on: </b>DD/MM/YYYY</p>
				<p><b>Due Delivery / Delivered on: </b>DD/MM/YYYY</p>
				<div class="table-respnsive">
					<table class="table table-striped table-hover" style="margin-bottom: 10px">
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
								<td><a href="product.php">Product #1</a></td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
							</tr>
							<tr>
								<td><a href="product.php">Product #2</a></td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
							</tr>
							<tr>
								<td><a href="product.php">Product #3</a></td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
							</tr>
							<tr>
								<td><a href="product.php">Product #4</a></td>
								<td>1</td>
								<td>$24.99</td>
								<td>$24.99</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><b>Total: </b>$24.99</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="well">
					<h3 style="margin-top: 0">Delivery Status</h3>
					<div style="margin-bottom: 10px">
						<div class="progress" style="background-color: #ffffff; margin-bottom: 0">
							<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
								<span class="sr-only">10% Complete (success)</span>
							</div>
						</div>
						<span>0%</span>
						<span class="pull-right">100%</span>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<p><b>Delivery Address:</b></p>
							<p>something</p>
							<p>something</p>
							<p>something</p>
							<p>something</p>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<p><b>Payment Method:</b></p>
							<p style="margin-bottom: 0">something</p>
						</div>
					</div>
					<h3 style="margin-top: 0">Invoice</h3>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>