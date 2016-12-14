<?php

require 'database.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$product = getProductById($_GET['id']);

	$description = $product->DescArtigo;
	$price = $product->Preco;
	$brand = '';

	if (!empty($product->Marca))
		$brand = getBrandById($product->Marca);

	$category = getCategoryById($product->Familia);
	$reviews = getReviewsById($_GET['id']);
	$storages = getStockById($_GET['id']);
	$related = getByCategory($product->Familia);
	$randomNumbers = generateNRandomNumbers(4, count($related));

	$list = NULL;
	$cart = NULL;
	$inList = false;
	$inCart = false;

	if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		$list = getWishList($_SESSION['user']);
		$cart = getShoppingCart($_SESSION['user']);

		if (count($list) !== 0) {
			$inList = inWishList($_GET['id'], $list);
		}

		if (count($list) !== 0) {
			$inCart = inShoppingCart($_GET['id'], $cart);
		}
	}

	if (isset($_POST['addtolist'])) {
		addToWishList($_SESSION['user'], $_GET['id']);
		header('Location: wish_list.php');
		die();
	} else if (isset($_POST['addtocart'])) {
		addToShoppingCart($_SESSION['user'], $_GET['id'], $_POST['quantity']);
		header('Location: shopping_cart.php');
		die();
	}
} else {
	header('Location: 404_not_found.php');
	die();
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title><?= $description ?></title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
						<li data-target="#myCarousel" data-slide-to="3"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active"><img src="images/bigImage.png" alt="Test"></div>
						<div class="item"><img src="images/bigImage.png" alt="Test"></div>
						<div class="item"><img src="images/bigImage.png" alt="Test"></div>
						<div class="item"><img src="images/bigImage.png" alt="Test"></div>
					</div>
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="well">
					<div class="row">
						<div class="col-lg-7 col-md-7 col-sm-7" style="margin-bottom: 20px">
							<h3 class="pull-right" style="margin: 0 0 5px 0"><?= $price ?>€</h3>
							<h3 style="margin: 0 0 5px 0">
								<?= $description ?>
								<?php if (!empty($brand)) echo "<small> by $brand</small>"; ?>
							</h3>
							<h5 style="margin-top: 0">in <?= $category ?></h5>
							<?php if ($logon === true) { ?>
								<span style="color: red; display: block; margin-bottom: 15px">
									<span>5.0 stars</span>
									<a href="#reviews" class="pull-right"><?= count($reviews) ?> reviews</a>
								</span>
								<?php if ($inList === false && $inCart === false) { ?>
									<form method="post">
										<button class="btn btn-primary" name="addtolist" type="submit">
											<span class="glyphicon glyphicon-list-alt"></span> Add To Wish List
										</button>
										<input type="hidden" name="quantity" value="1">
										<button class="btn btn-primary pull-right" name="addtocart" type="submit">
											<span class="glyphicon glyphicon-shopping-cart"></span> Add To Shopping Cart
										</button>
									</form>
								<?php } else if ($inList === false && $inCart === true) { ?>
									<form method="post">
										<button class="btn btn-primary" name="addtolist" type="submit">
											<span class="glyphicon glyphicon-list-alt"></span> Add To Wish List
										</button>
										<button disabled class="btn btn-primary pull-right" name="addtocart" type="submit">
											<span class="glyphicon glyphicon-shopping-cart"></span> Add To Shopping Cart
										</button>
									</form>
								<?php } else if ($inList === true && $inCart === false) { ?>
									<form method="post">
										<button disabled class="btn btn-primary" name="addtolist" type="submit">
											<span class="glyphicon glyphicon-list-alt"></span> Add To Wish List
										</button>
										<input type="hidden" name="quantity" value="1">
										<button class="btn btn-primary pull-right" name="addtocart" type="submit">
											<span class="glyphicon glyphicon-shopping-cart"></span> Add To Shopping Cart
										</button>
									</form>
								<?php } else { ?>
									<form method="post">
										<button disabled class="btn btn-primary" name="addtolist" type="submit">
											<span class="glyphicon glyphicon-list-alt"></span> Add To Wish List
										</button>
										<button disabled class="btn btn-primary pull-right" name="addtocart" type="submit">
											<span class="glyphicon glyphicon-shopping-cart"></span> Add To Shopping Cart
										</button>
									</form>
								<?php } ?>
							<?php } else { ?>
								<span style="color: red; display: block">
									<span>5.0 stars</span>
									<a href="#reviews" class="pull-right"><?= count($reviews) ?> reviews</a>
								</span>
							<?php } ?>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5">
							<h3 style="margin-top: 0">Storages</h3>
							<ul class="list-group" style="margin-bottom: 0">
								<?php for ($i = 0; $i < count($storages); $i++) { ?>
									<li class="list-group-item clearfix">
										<span class="pull-left"><?= $storages[$i]->Descricao ?></span>
										<span class="badge pull-left" style="margin-left: 10px"><?= $storages[$i]->Stock ?></span>
										<br>
										<span><?= $storages[$i]->Morada ?></span>
										<br>
										<span><?= $storages[$i]->Localidade ?></span>
										<br>
										<span><?= $storages[$i]->CodPostal ?> - <?= $storages[$i]->CodPostalLocalidade ?></span>
									</li>
								<?php } ?>
								<li class="list-group-item">
									<label for="quantity">Quantity:</label>
									<input id="quantity" type="number" min="1" value="1" class="form-control">
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="related" class="row">
			<div id="reviews" class="col-lg-12 col-md-12 col-sm-12">
				<h4 style="margin-top: 0">Related Products</h4>
				<?php if (count($related) > 0) { ?>
					<div class="row">
						<?php for ($i = 0; $i < 4; $i++) { ?>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="thumbnail">
									<img src="images/mediumImage.png" alt="Test">
									<div class="caption">
										<h4 style="margin: 0" class="pull-right">
											<?= $related[$randomNumbers[$i]]->Preco ?>€
										</h4>
										<h4 style="margin: 0">
											<a href="product.php?id=<?= $related[$randomNumbers[$i]]->CodArtigo ?>">
												<?= $related[$randomNumbers[$i]]->DescArtigo ?>
											</a>
										</h4>
										<span class="clearfix">
											<span>
												<!-- print stars -->
											</span>
											<a class="pull-right" href="product.php?id=<?= $related[$randomNumbers[$i]]->CodArtigo ?>#reviews">
												<?= count(getReviewsById($related[$randomNumbers[$i]]->CodArtigo)) ?>
												<span> reviews</span>
											</a>
										</span>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } else { ?>
					<div class="alert alert-info" role="alert">
						<p style="margin-bottom: 15px">There are no related products, currently.</p>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div id="reviews" class="col-lg-12 col-md-12 col-sm-12">
				<h4 style="margin-top: 0">Reviews</h4>
				<?php if (count($reviews) > 0) { ?>
					<?php for ($i = 0; $i < count($reviews); $i++) { ?>
						<div class="well">
							<span style="display: block">
								<!-- print stars -->
								<!-- print how long ago -->
							</span>
							<span style="display: block; margin-bottom: 10px">
								<!-- who and date -->
							</span>
							<span style="display: block">
								<!-- comment -->
							</span>
						</div>
					<?php } ?>
				<?php } else { ?>
					<div class="alert alert-info" role="alert">
						<p style="margin-bottom: 15px">There are no reviews fot this product, currently.</p>
						<button type="button" class="btn btn-primary">Be the first to leave one</button>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
	<script src="js/product.js"></script>
</body>
</html>