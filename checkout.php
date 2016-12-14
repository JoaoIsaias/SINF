<?php

require 'database.php';

if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
	header('Location: index.php');
	die();
}

$user = getUser($_SESSION['user']);

$address = $user->Morada;
$local = $user->Local;
$postalCode = $user->CodigoPostal;
$location = $user->Localidade;
$country = $user->Pais;

$total = 0;
$products = array();
$cart = getShoppingCart($_SESSION['user']);

if (count($cart) > 0) {
	for ($i = 0; $i < count($cart); $i++) {
		array_push($products, getProductById($cart[$i]['productId']));
	}
}

?>

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
				<?php if (count($cart) === 0) { ?>
					<div class="alert alert-info" role="alert">
						<span>You must have items in the Shopping Cart in order to be able to Checkout.</span>
					</div>
				<?php } else { ?>
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
								<?php for ($i = 0; $i < count($products); $i++) { ?>
									<tr>
										<td>
											<a href="product.php?id=<?= $products[$i]->CodArtigo ?>">
												<?= $products[$i]->DescArtigo ?>
											</a>
										</td>
										<td><?= $cart[$i]['quantity'] ?></td>
										<td><?= $products[$i]->Preco ?> €</td>
										<td><?= $cart[$i]['quantity'] * $products[$i]->Preco ?> €</td>
									</tr>
								<?php } ?>
							</tbody>
							<tfoot style="border-bottom: 2px solid #d5d5d5">
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><b>Total: </b><?= $total ?></td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="well">
								<h3 style="margin-top: 0">Send to:</h3>
								<span><?= $address ?></span><br>
								<span><?= $local ?></span><br>
								<span><?= $postalCode ?> - <?= $location ?></span><br>
								<span><?= $country ?></span>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="well">
								<h3 style="margin-top: 0">Payment Method:</h3>
								
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="row text-center" style="margin-bottom: 20px">
			<a href="shopping_cart.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-shopping-cart"></span> Back to Shopping Cart
			</a>
			<?php if (count($cart) > 0) { ?>
				<a href="#" class="btn btn-success">
					<span class="glyphicon glyphicon-ok"></span> Complete Purchase
				</a>
			<?php } else { ?>
				<a href="#" class="btn btn-success" disabled>
					<span class="glyphicon glyphicon-ok"></span> Complete Purchase
				</a>
			<?php } ?>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>