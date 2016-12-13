<?php

require 'database.php';

$his = '';
$pen = '';
$tab = $_GET['tab'];

if (isset($tab)) {
	if (!empty($tab)) {
		if ($tab === 'history') {
			$his = "in active";
		} else if ($tab === 'pending') {
			$pen = "in active";
		}
	} else {
		$his = "in active";
	}
} else {
	$his = "in active";
}

?>

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
						<li>
							<a href="wish_list.php"><span class="glyphicon glyphicon-heart"></span> Wish List</a>
						</li>
						<li>
							<a href="shopping_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
						</li>
					</ul>
					<h3 style="margin-top: 0">Orders</h3>
					<ul style="padding-left: 20px; list-style-type: none">
						<li>
							<a href="orders.php?tab=history"><span class="glyphicon glyphicon-list-alt"></span> Order History</a>
						</li>
						<li>
							<a href="orders.php?tab=pending"><span class="glyphicon glyphicon-time"></span> Pending Orders</a>
						</li>
					</ul>
					<h3 style="margin-top: 0">Manage Account</h3>
					<ul style="padding-left: 20px; list-style-type: none; margin-bottom: 0">
						<li>
							<a href="manage_account.php?tab=settings"><span class="glyphicon glyphicon-cog"></span> Settings</a>
						</li>
						<li>
							<a href="manage_account.php?tab=address"><span class="glyphicon glyphicon-book"></span> Address Book</a>
						</li>
						<li>
							<a href="manage_account.php?tab=payment"><span class="glyphicon glyphicon-credit-card"></span> Payment Options</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<ul class="nav nav-tabs nav-justified">
					<li <?php if (!empty($his)) echo "class=\"active\""; ?>>
						<a data-toggle="tab" href="#orderHistory">Order History</a>
					</li>
					<li <?php if (!empty($pen)) echo "class=\"active\""; ?>>
						<a data-toggle="tab" href="#pendingOrders">Pending Orders</a>
					</li>
				</ul>
				<div class="well" style="border-top-left-radius: 0; border-top-right-radius: 0">
					<div class="tab-content">
						<div id="orderHistory" <?php echo "class=\"tab-pane fade $his\""; ?>>
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
											<td><a href="order_status.php">Order #1</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="order_status.php">Order #2</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="order_status.php">Order #3</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="order_status.php">Order #4</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div id="pendingOrders" <?php echo "class=\"tab-pane fade $pen\""; ?>>
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
											<td><a href="order_status.php">Order #1</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="order_status.php">Order #2</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="order_status.php">Order #3</a></td>
											<td>DD/MM/YYYY</td>
											<td>DD/MM/YYYY</td>
											<td>$24.99</td>
										</tr>
										<tr>
											<td><a href="order_status.php">Order #4</a></td>
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