<?php

require 'database.php';

if ($_POST['removeall']) {
	removeAllFromWishList();
} else if ($_POST['remove'] && $_POST['id']) {
	removeFromWishList($_POST['id']);
}
// var_dump($products);

$products = getWishList();

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
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Product</th>
								<th>Stock</th>
								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
						<?php for ($i = 0; $i < count($products); $i++) { ?>
							<form method="post">
								<tr>
									<td><a href="product.php?id=<?= $products[$i]->CodArtigo ?>"><?= $products[$i]->Descricao ?></a></td>
									<?php if ($products[$i]->Stock > 0) { ?>
									<td>In Stock</td>
									<?php } else { ?>
									<td>Not in Stock</td>
									<?php } ?>
									<td><?= $products[$i]->Preco ?> €</td>
									<td>
										<input type="hidden" name="id" value="<?= $products[$i]->CodArtigo ?>">
										<button type="submit" name="remove" class="btn btn-danger pull-left">
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
									<td>
										<button type="submit" name="removeall" class="btn btn-danger pull-left">
											<span class="glyphicon glyphicon-remove"></span> Remove All
										</button>
									</td>
								</tr>
							</form>
						</tfoot>
					</table>
				</div>
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