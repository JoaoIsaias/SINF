<?php

require 'database.php';

if (isset($_POST['addtowishlist'])) {
	addToWishList($_POST['addtowishlist']);
}

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
	
	$isInWishList = isInWishList($_GET['id']);
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
						<div class="col-lg-7 col-md-7 col-sm-7">
							<h3 class="pull-right" style="margin: 0 0 5px 0"><?= $price ?>€</h3>
							<h3 style="margin: 0 0 5px 0">
								<?= $description ?>
								<?php if (!empty($brand)) echo "<small> by $brand</small>"; ?>
							</h3>
							<h5 style="margin-top: 0">in <?= $category ?></h5>
							<span style="color: red; display: block; margin-bottom: 15px">
								<span>5.0 stars</span>
								<a href="#reviews" class="pull-right"><?= count($reviews) ?> reviews</a>
							</span>
							<form method="post">
								<button <?php if ($isInWishList) { echo "disabled"; } ?> class="btn btn-primary" name="addtowishlist" value="<?= $_GET['id'] ?>" type="submit">
									<span class="glyphicon glyphicon-list-alt"></span> Add To Wish List
								</button>
								<button class="btn btn-primary pull-right">
									<span class="glyphicon glyphicon-shopping-cart"></span> Add To Shopping Cart
								</button>
							</form>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5">
							<h3 style="margin-top: 0">Stock</h3>
							<ul class="list-group" style="margin-bottom: 0">
								<?php for ($i = 0; $i < count($storages); $i++) { ?>
									<li class="list-group-item clearfix">
										<span class="pull-left"><?= $storages[$i]->Descricao ?></span>
										<span class="badge pull-left" style="margin-left: 10px"><?= $storages[$i]->Stock ?></span>
										<input class="pull-right" type="number" min="0" max="<?= $storages[$i]->Stock ?>" value="1">
									</li>
								<?php } ?>
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
</body>
</html>