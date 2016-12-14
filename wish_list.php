<?php

require 'database.php';

if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
	header('Location: index.php');
	die();
}

if (isset($_POST['remove'])) {
	if (isset($_POST['id']) && !empty($_POST['id'])) {
		deleteFromWishList($_SESSION['user'], $_POST['id']);
	}
}

$total = 0;
$totalIva = 0;
$list = getWishList($_SESSION['user']);

if (isset($_POST['removeall'])) {
	for ($i = 0; $i < count($list); $i++) {
		deleteFromWishList($_SESSION['user'], $list[$i]['productId']);
	}
}

$products = array();
$list = getWishList($_SESSION['user']);

if (count($list) > 0) {
	for ($i = 0; $i < count($list); $i++) {
		array_push($products, getProductById($list[$i]['productId']));
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Wish List</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 style="margin-top: 0">Wish List</h2>
				<?php if (count($list) === 0) { ?>
					<div class="alert alert-info" role="alert">
						<span>Currently, you have no products on the Wish List.</span>
					</div>
				<?php } else { ?>
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Product</th>
									<th>Stock</th>
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
										<td><?= $products[$i]->Iva ?>%</td>
										<td><?= $products[$i]->Preco ?>€</td>
										<td><?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€</td>
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
								<form method="post">
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td><b>Total: </b><?= $total ?>€</td>
										<td><b>Total (IVA): </b><?= $totalIva ?>€</td>
										<td>
											<button type="submit" name="removeall" class="btn btn-sm btn-danger pull-left">
												<span class="glyphicon glyphicon-remove"></span> Remove All
											</button>
										</td>
									</tr>
								</form>
							</tfoot>
						</table>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="row text-center">
			<a href="index.php" class="btn btn-info">
				<span class="glyphicon glyphicon-triangle-left"></span> Continue Shopping
			</a>
			<a href="shopping_cart.php" class="btn btn-success">
				<span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
			</a>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>