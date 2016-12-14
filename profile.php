<?php

require 'database.php';

if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
	header('Location: index.php');
	die();
} else {
	$user = getUser($_SESSION['user']);
	
	$name = $user->NomeCliente;
	$email = $user->Email;
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
					<ul style="padding-left: 20px; list-style-type: none; margin-bottom: 0">
						<li>
							<a href="wish_list.php"><span class="glyphicon glyphicon-heart"></span> Wish List</a>
						</li>
						<li>
							<a href="shopping_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
						</li>
						<li>
							<a href="orders.php"><span class="glyphicon glyphicon-list-alt"></span> Orders</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="well">
					<h2 style="margin-top: 0">Account Information</h2>
					<div class="form-group">
						<label for="user">Username:</label>
						<div id="user" style="background-color: #ffffff; border: 2px solid #dce4ec; border-radius: 4px; padding: 10px 15px">
							<?= $_SESSION['user'] ?>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Name:</label>
						<div id="name" style="background-color: #ffffff; border: 2px solid #dce4ec; border-radius: 4px; padding: 10px 15px">
							<?= $name ?>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<div id="email" style="background-color: #ffffff; border: 2px solid #dce4ec; border-radius: 4px; padding: 10px 15px">
							<?= $email ?>
						</div>
					</div>
					<div class="form-group">
						<label for="tax-number">Tax Number:</label>
						<div id="tax-number" style="background-color: #ffffff; border: 2px solid #dce4ec; border-radius: 4px; padding: 10px 15px">
							<?= $taxNumber ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<label for="address">Address:</label>
							<div id="address" style="background-color: #ffffff; border: 2px solid #dce4ec; border-radius: 4px; padding: 10px 15px">
								<span><?= $address ?></span><br>
								<span><?= $local ?></span><br>
								<span><?= $postalCode ?> - <?= $location ?></span><br>
								<span><?= $country ?></span>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<label for="payment">Payment Method:</label>
							<div id="payment" style="background-color: #ffffff; border: 2px solid #dce4ec; border-radius: 4px; padding: 10px 15px">
								<span>Paypal / Credit or Debit Card</span>
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