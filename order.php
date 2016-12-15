<?php

require 'database.php';

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	$ids = getOrderById($_GET['id']);
	$user = getUser($_SESSION['user']);
	$orderData = getOrderDataById($_GET['id']);
	$orderState = getOrderState($orderData[0]->NumDoc);

	$address = $user->Morada;
	$local = $user->Local;
	$postalCode = $user->CodigoPostal;
	$location = $user->Localidade;
	$country = $user->Pais;

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
	<title>Order</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 style="margin-top: 0">Order <small><?= $_GET['id'] ?></small></h2>
				<p><b>Date: </b><?= explode("T", $orderData[0]->Data)[0] ?></p>
				<p><b>Time: </b><?= explode("T", $orderData[0]->Data)[1] ?></p>
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
					<?php if ($orderState === 'Encomendado') { ?>
						<h3 style="margin-top: 0">Delivery Status: Ordered</h3>
					<?php } else if ($orderState === 'Expedida') { ?>
						<h3 style="margin-top: 0">Delivery Status: Shipped</h3>
					<?php } else if ($orderState === 'Encomenda Completa') { ?>
						<h3 style="margin-top: 0">Delivery Status: Delivered</h3>
					<?php } ?>
					<div style="margin-bottom: 10px">
						<?php if ($orderState === 'Encomendado') { ?>
							<div class="progress" style="background-color: #ffffff; margin-bottom: 0">
								<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
									<span>10%</span>
								</div>
							</div>
						<?php } else if ($orderState === 'Expedida') { ?>
							<div class="progress" style="background-color: #ffffff; margin-bottom: 0">
								<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
									<span>60%</span>
								</div>
							</div>
						<?php } else if ($orderState === 'Encomenda Completa') { ?>
							<div class="progress" style="background-color: #ffffff; margin-bottom: 0">
								<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									<span>100%</span>
								</div>
							</div>
						<?php } ?>
						<span>0%</span>
						<span class="pull-right">100%</span>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<h4 style="margin-top: 0">Send to:</h4>
							<span><?= $address ?></span><br>
							<span><?= $local ?></span><br>
							<span><?= $postalCode ?> - <?= $location ?></span><br>
							<span><?= $country ?></span>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<h4 style="margin-top: 0">Payment Method:</h4>
							<span>Cash Payment</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>