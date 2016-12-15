<?php

require 'database.php';

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	$ids = getOrderById($_GET['id']);

	$total = 0;
	$totalIva = 0;
	$products = array();

	for ($i = 0; $i < count($ids); $i++) {
		array_push($products, getProductById($ids[$i]->CodArtigo));
	}

	for ($i = 0; $i < count($products); $i++) {
		$total += $ids[$i]->Quantidade * $products[$i]->Preco;
		$totalIva += $ids[$i]->Quantidade * ($products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)));
	}
} else {
	header('Location: index.php');
	die();
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Delivery Status</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 style="margin-top: 0">Order #1</h2>
				<p><b>Date: </b></p>
				<div class="table-respnsive">
					<table class="table table-striped table-hover" style="margin-bottom: 10px">
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
									<td><?= $ids[$i]->Quantidade ?></td>
									<td><?= $products[$i]->Iva ?>%</td>
									<td><?= $products[$i]->Preco ?>€</td>
									<td><?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€</td>
									<td><?= $ids[$i]->Quantidade * $products[$i]->Preco ?>€</td>
									<td><?= $ids[$i]->Quantidade * ($products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0))) ?>€</td>
									<td>
								</tr>
							<?php } ?>
						</tbody>
						<tfoot>
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
				<div class="well">
					<h3 style="margin-top: 0">Delivery Status</h3>
					<div style="margin-bottom: 10px">
						<div class="progress" style="background-color: #ffffff; margin-bottom: 0">
							<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
								<span class="sr-only">10% Complete (success)</span>
							</div>
						</div>
						<span>0%</span>
						<span class="pull-right">100%</span>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<p><b>Delivery Address:</b></p>
							<p>something</p>
							<p>something</p>
							<p>something</p>
							<p>something</p>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<p><b>Payment Method:</b></p>
							<p style="margin-bottom: 0">something</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>