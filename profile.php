<?php

require 'database.php';

if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
	header('Location: index.php');
	die();
} else {
	$user = getUser($_SESSION['user']);

	$name = $user->NomeCliente;
	$taxNumber = $user->NumContribuinte;
	$address = $user->Morada;
	$local = $user->Local;
	$postalCode = $user->CodigoPostal;
	$location = $user->Localidade;
	$country = $user->Pais;
}

?>

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
				<div class="well">
					<h2 style="margin-top: 0">Account Information</h2>
					<div class="form-group">
						<label for="user">Username:</label>
						<input id="user" type="text" class="form-control" value="<?= $_SESSION['user'] ?>" disabled>
					</div>
					<div class="form-group">
						<label for="name">Name:</label>
						<input id="name" type="text" class="form-control" value="<?= $name ?>" disabled>
					</div>
					<div class="form-group">
						<label for="tax-number">Tax Number:</label>
						<input id="tax-number" type="text" class="form-control" value="<?= $taxNumber ?>" disabled>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<p><b>Address:</b></p>
							<span><?= $address ?></span><br>
							<span><?= $local ?></span><br>
							<span><?= $postalCode ?> - <?= $location ?></span><br>
							<span><?= $country ?></span>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<p><b>Payment Method:</b></p>
							<span>Paypal / Credit or Debit Card</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>