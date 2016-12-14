<?php

require 'database.php';

if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
	header('Location: index.php');
	die();
}

if (isset($_POST['remove'])) {
	if (isset($_POST['id']) && !empty($_POST['id'])) {
		deleteFromShoppingCart($_SESSION['user'], $_POST['id']);
	}
}

$total = 0;
$totalIva = 0;
$cart = getShoppingCart($_SESSION['user']);

if (isset($_POST['removeall'])) {
	for ($i = 0; $i < count($cart); $i++) {
		deleteFromShoppingCart($_SESSION['user'], $cart[$i]['productId']);
	}
}

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
	<title>Shopping Cart</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 style="margin-top: 0">Shopping Cart</h2>
				<?php if (count($cart) === 0) { ?>
					<div class="alert alert-info" role="alert">
						<span>Currently, you have no products on the Shopping Cart.</span>
					</div>
				<?php } else { ?>
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Product</th>
									<th>Stock</th>
									<th>Quantity</th>
									<th>IVA</th>
									<th>Price</th>
									<th>Price + IVA</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($i = 0; $i < count($products); $i++) { ?>
									<form method="post">
										<tr>
											<td><a href="product.php?id=<?= $products[$i]->CodArtigo ?>"><?= $products[$i]->DescArtigo ?></a></td>
											<?php if ($products[$i]->Stock > 0) { ?>
												<td>In Stock</td>
											<?php } else { ?>
												<td>Not in Stock</td>
											<?php } ?>
											<td><?= $cart[$i]['quantity'] ?></td>
											<td><?= $products[$i]->Iva ?>%</td>
											<td><?= $cart[$i]['quantity'] * $products[$i]->Preco ?>€</td>
											<td><?= $cart[$i]['quantity'] * ($products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0))) ?>€</td>
											<td>
												<input type="hidden" name="id" value="<?= $products[$i]->CodArtigo ?>">
												<button type="submit" name="remove" class="btn btn-sm btn-danger pull-left">
													<span class="glyphicon glyphicon-remove"></span>
												</button>
											</td>
										</tr>
									</form>
								<?php } ?>
							</tbody>
							<tfoot style="border-bottom: 2px solid #d5d5d5">
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b>Total: </b><?= $total ?>€</td>
									<td><b>Total (IVA): </b><?= $totalIva ?>€</td>
									<td>
										<form method="post">
											<button type="submit" name="removeall" class="btn btn-sm btn-danger pull-left">
												<span class="glyphicon glyphicon-remove"></span> Remove All
											</button>
										</form>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="row text-center" style="margin-bottom: 20px">
			<a href="index.php" class="btn btn-info">
				<span class="glyphicon glyphicon-triangle-left"></span> Continue Shopping
			</a>
			<?php if (count($cart) > 0) { ?>
				<a href="checkout.php" class="btn btn-success">
					<span class="glyphicon glyphicon-credit-card"></span> Checkout
				</a>
			<?php } else { ?>
				<a href="checkout.php" class="btn btn-success" disabled>
					<span class="glyphicon glyphicon-credit-card"></span> Checkout
				</a>
			<?php } ?>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>