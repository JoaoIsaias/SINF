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
			<div class="col-lg-offset-1 col-md-offset-1 col-lg-7 col-md-7 col-sm-8">
				<div class="well">
					<h2 style="margin-top: 0">Account Information</h2>
					<p><b>Name:</b> Alexandre Saraiva Moreira</p>
					<p><b>Email:</b> email@gmail.com</p>
					<p><b>Password:</b> ************</p>
					<p><b>Current Address:</b> shbvskrbvsrbv</p>
					<p style="margin-bottom: 0"><b>Current Payment Method:</b> Paypal / Credit or Debit Card</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-4">
				<div class="well">
					<h3 style="margin-top: 0">Lists</h3>
					<ul style="padding-left: 20px; list-style-type: none">
						<li><a href="wish_list.php">Wish List</a></li>
						<li><a href="shopping_cart.php">Shopping Cart</a></li>
					</ul>
					<h3 style="margin-top: 0">Orders</h3>
					<ul style="padding-left: 20px; list-style-type: none">
						<li><a href="orders.php">Order History</a></li>
						<li><a href="orders.php">Pending Orders</a></li>
					</ul>
					<h3 style="margin-top: 0">Manage Account</h3>
					<ul style="padding-left: 20px; list-style-type: none; margin-bottom: 0">
						<li><a href="manage_account.php">Settings</a></li>
						<li><a href="manage_account.php">Address Book</a></li>
						<li><a href="manage_account.php">Payment Options</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>