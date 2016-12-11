<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Manage Account</title>
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
					<li class="active"><a data-toggle="tab" href="#settings">Settings</a></li>
					<li><a data-toggle="tab" href="#addressBook">Address Book</a></li>
					<li><a data-toggle="tab" href="#paymentOptions">Payment Options</a></li>
				</ul>
				<div class="well" style="border-top-left-radius: 0; border-top-right-radius: 0">
					<div class="tab-content">
						<div id="settings" class="tab-pane fade in active">
							<form method="post" style="margin-bottom: 20px">
								<div class="form-group">
									<label for="name">New Name:</label>
									<input id="name" type="text" class="form-control" required>
								</div>
								<button type="submit" class="btn btn-primary">Edit Name</button>
							</form>
							<form method="post" style="margin-bottom: 20px">
								<div class="form-group">
									<label for="email">New Email:</label>
									<input id="email" type="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="re-email">Confirm New Email:</label>
									<input id="re-email" type="email" class="form-control" required>
								</div>
								<button type="submit" class="btn btn-primary">Edit Email</button>
							</form>
							<form method="post">
								<div class="form-group">
									<label for="password">New Password:</label>
									<input id="password" type="password" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="re-password">Confirm New Password:</label>
									<input id="re-password" type="password" class="form-control" required>
								</div>
								<button type="submit" class="btn btn-primary">Edit Password</button>
							</form>
						</div>
						<div id="addressBook" class="tab-pane fade">

						</div>
						<div id="paymentOptions" class="tab-pane fade">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>