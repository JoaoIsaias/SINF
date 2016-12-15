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
$totalIva = 0;
$products = array();
$cart = getShoppingCart($_SESSION['user']);

if (count($cart) > 0) {
	for ($i = 0; $i < count($cart); $i++) {
		array_push($products, getProductById($cart[$i]['productId']));
	}

	for ($i = 0; $i < count($products); $i++) {
		$total += $cart[$i]['quantity'] * $products[$i]->Preco;
		$totalIva += $cart[$i]['quantity'] * ($products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)));
	}

	if (isset($_POST['purchase'])) {
		$bought = array();

		for ($i = 0; $i < count($products); $i++) {
			$bought[$i]['CodArtigo'] = $products[$i]->CodArtigo;
			$bought[$i]['Quantidade'] = $cart[$i]['quantity'];
			$bought[$i]['PrecoUnitario'] = $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0));
		}

		insertOrder($_SESSION['user'], $bought);

		for ($i = 0; $i < count($cart); $i++) {
			deleteFromShoppingCart($_SESSION['user'], $cart[$i]['productId']);
		}

		header('Location: orders.php');
		die();
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
									<th>IVA</th>
									<th>Price</th>
									<th>Price + IVA</th>
									<th>Subtotal</th>
									<th>Subtotal (IVA)</th>
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
										<td><?= $products[$i]->Iva ?>%</td>
										<td><?= $products[$i]->Preco ?>€</td>
										<td><?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€</td>
										<td><?= $cart[$i]['quantity'] * $products[$i]->Preco ?>€</td>
										<td><?= $cart[$i]['quantity'] * ($products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0))) ?>€</td>
									</tr>
								<?php } ?>
							</tbody>
							<tfoot style="border-bottom: 2px solid #d5d5d5">
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b>Total: </b><?= $total ?>€</td>
									<td><b>Total (IVA): </b><?= $totalIva ?>€</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="well">
								<h4 style="margin-top: 0">Send to:</h4>
								<span><?= $address ?></span><br>
								<span><?= $local ?></span><br>
								<span><?= $postalCode ?> - <?= $location ?></span><br>
								<span><?= $country ?></span>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="well">
								<h4 style="margin-top: 0">Payment Method:</h4>
								<span>Cash Payment</span>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<form method="post" class="text-center" style="margin-bottom: 20px">
			<a href="shopping_cart.php" class="btn btn-primary">
				<span class="glyphicon glyphicon-shopping-cart"></span> Back to Shopping Cart
			</a>
			<?php if (count($cart) > 0) { ?>
				<button name="purchase" type="submit" class="btn btn-success">
					<span class="glyphicon glyphicon-ok"></span> Complete Purchase
				</button>
			<?php } else { ?>
				<button name="purchase" type="submit" class="btn btn-success" disabled>
					<span class="glyphicon glyphicon-ok"></span> Complete Purchase
				</button>
			<?php } ?>
		</form>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>