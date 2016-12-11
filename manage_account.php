<?php

$set = '';
$add = '';
$pay = '';
$tab = $_GET['tab'];

if (isset($tab)) {
	if (!empty($tab)) {
		if ($tab === 'settings') {
			$set = "in active";
		} else if ($tab === 'address') {
			$add = "in active";
		} else if ($tab === 'payment') {
			$pay = "in active";
		}
	} else {
		$set = "in active";
	}
} else {
	$set = "in active";
}

?>

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
					<li <?php if (!empty($set)) echo "class=\"active\""; ?>>
						<a data-toggle="tab" href="#settings">Settings</a>
					</li>
					<li <?php if (!empty($add)) echo "class=\"active\""; ?>>
						<a data-toggle="tab" href="#addressBook">Address Book</a>
					</li>
					<li <?php if (!empty($pay)) echo "class=\"active\""; ?>>
						<a data-toggle="tab" href="#paymentOptions">Payment Options</a>
					</li>
				</ul>
				<div class="well" style="border-top-left-radius: 0; border-top-right-radius: 0">
					<div class="tab-content">
						<div id="settings" <?php echo "class=\"tab-pane fade $set\""; ?>>
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
						<div id="addressBook" <?php echo "class=\"tab-pane fade $add\""; ?>>
							<h4 style="margin: 0 0 10px 0">Addresses</h4>
							<div style="padding: 15px; margin-bottom: 20px; border: 2px solid #d7e0e9; border-radius: 4px; background-color: #ffffff">
								<p>something</p>
								<p>something</p>
								<p>something</p>
								<p>something</p>
								<div class="text-center">
									<button type="button" class="btn btn-primary">Edit Address</button>
									<button type="button" class="btn btn-danger">
										<span class="glyphicon glyphicon-remove"></span> Remove Address
									</button>
								</div>
							</div>
							<div class="text-center">
								<button type="button" class="btn btn-success">
									<span class="glyphicon glyphicon-plus"></span> Add Address
								</button>
							</div>
						</div>
						<div id="paymentOptions" <?php echo "class=\"tab-pane fade $pay\""; ?>>
							<h4 style="margin-top: 0">Paypal Account</h4>
							<p>something</p>
							<div class="text-center" style="margin-bottom: 20px">
								<button type="button" class="btn btn-primary">Edit Account</button>
								<button type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-remove"></span> Remove Account
								</button>
							</div>
							<h4 style="margin: 0">Credit/Debit Cards</h4>
							<div class="table-responsive">
								<table class="table table-striped" style="margin-bottom: 0">
									<thead>
										<tr>
											<th>Name on Card</th>
											<th>Ending Digits</th>
											<th>Expires</th>
											<th>Edit</th>
											<th>Remove</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Name</td>
											<td>5687</td>
											<td>MM/YYYY</td>
											<td>
												<button type="button" class="btn btn-primary">Edit</button>
											</td>
											<td>
												<button type="button" class="btn btn-danger">
													<span class="glyphicon glyphicon-remove"></span>
												</button>
											</td>
										</tr>
										<tr>
											<td>Name</td>
											<td>5687</td>
											<td>MM/YYYY</td>
											<td>
												<button type="button" class="btn btn-primary">Edit</button>
											</td>
											<td>
												<button type="button" class="btn btn-danger">
													<span class="glyphicon glyphicon-remove"></span>
												</button>
											</td>
										</tr>
										<tr>
											<td>Name</td>
											<td>5687</td>
											<td>MM/YYYY</td>
											<td>
												<button type="button" class="btn btn-primary">Edit</button>
											</td>
											<td>
												<button type="button" class="btn btn-danger">
													<span class="glyphicon glyphicon-remove"></span>
												</button>
											</td>
										</tr>
										<tr>
											<td>Name</td>
											<td>5687</td>
											<td>MM/YYYY</td>
											<td>
												<button type="button" class="btn btn-primary">Edit</button>
											</td>
											<td>
												<button type="button" class="btn btn-danger">
													<span class="glyphicon glyphicon-remove"></span>
												</button>
											</td>
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