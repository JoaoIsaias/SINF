<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Orders</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
				<div class="well">
					<h3 style="margin-top: 0">Current Information</h3>
					<p><b>Name: </b>Full Name</p>
					<p style="margin-bottom: 0"><b>Email: </b> email@email.com</p>
				</div>
				<div class="well">
					<h3 style="margin-top: 0">Lists</h3>
					<ul style="padding-left: 20px; list-style-type: none">
						<li><a href="wish_list.php">Wish List</a></li>
						<li><a href="shopping_cart.php">Shopping Cart</a></li>
					</ul>
					<h3 style="margin-top: 0">Orders</h3>
					<ul style="padding-left: 20px; list-style-type: none">
						<li><a href="orders.php?tab=history">Order History</a></li>
						<li><a href="orders.php?tab=pending">Pending Orders</a></li>
					</ul>
					<h3 style="margin-top: 0">Manage Account</h3>
					<ul style="padding-left: 20px; list-style-type: none; margin-bottom: 0">
						<li><a href="manage_account.php?tab=settings">Settings</a></li>
						<li><a href="manage_account.php?tab=address">Address Book</a></li>
						<li><a href="manage_account.php?tab=payment">Payment Options</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<ul class="nav nav-tabs nav-justified">
					<li class="active"><a data-toggle="tab" href="#orderHistory">Order History</a></li>
					<li><a data-toggle="tab" href="#pendingOrders">Pending Orders</a></li>
				</ul>
				<div class="well" style="border-top-left-radius: 0; border-top-right-radius: 0">
					<div class="tab-content">
						<div id="orderHistory" class="tab-pane fade in active">
							<div class="table-responsive">
								<table class="table table-striped" style="margin-bottom: 0">
									<thead>
										<tr>
											<th>Order</th>
											<th>Ordered On</th>
											<th>Delivered On</th>
											<th>Paid</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="#">Order #1</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="#">Order #2</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="#">Order #3</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="#">Order #4</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div id="pendingOrders" class="tab-pane fade">
							<div class="table-responsive">
								<table class="table table-striped" style="margin-bottom: 0">
									<thead>
										<tr>
											<th>Order</th>
											<th>Ordered On</th>
											<th>Due Delivery</th>
											<th>Paid</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="#">Order #1</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="#">Order #2</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="#">Order #3</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="#">Order #4</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>