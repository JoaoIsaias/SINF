<?php

require 'database.php';

if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
	header('Location: index.php');
	die();
} else {
	$orders = getOrdersById($_SESSION['user']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Orders</title>
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
				<a href="profile.php" class="btn btn-block btn-primary">
					<span class="glyphicon glyphicon-triangle-left"></span> Back to Profile
				</a>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="well">
					<h2 style="margin-top: 0">Orders</h2>
					<?php if (count($orders) === 0) { ?>
						<div class="alert alert-info" role="alert">
							<span>You have no orders to show.</span>
						</div>
					<?php } else { ?>
						<div class="table-responsive" style="background-color: #ffffff">
							<table class="table table-striped table-hover" style="margin-bottom: 0">
								<thead>
									<tr>
										<th>Order</th>
										<th>Date</th>
										<th>Time</th>
										<th>Full Price</th>
									</tr>
								</thead>
								<tbody>
									<?php for ($i = 0; $i < count($orders); $i++) { ?>
										<tr>
											<td>
												<a href="order.php?id=<?= $orders[$i]->id ?>">Order #<?= $i + 1 ?></a>
											</td>
											<td><?= explode("T", $orders[$i]->Data)[0] ?></td>
											<td><?= explode("T", $orders[$i]->Data)[1] ?></td>
											<td><?= $orders[$i]->Preco ?>€</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>