<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Profile</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
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
				<div class="well">
					<h2 style="margin-top: 0">Account Information</h2>
					<div class="form-group">
						<label for="name">Name:</label>
						<input id="name" type="text" class="form-control" disabled="disabled">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input id="email" type="email" class="form-control" disabled="disabled">
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<p><b>Current Address:</b></p>
							<p>something</p>
							<p>something</p>
							<p>something</p>
							<p style="margin-bottom: 0">something</p>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<p><b>Current Payment Method:</b></p>
							<p>Paypal / Credit or Debit Card</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>