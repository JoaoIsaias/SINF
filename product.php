<?php

require 'database.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$product = getProductById($_GET['id']);

	$description = $product->DescArtigo;
	$price = $product->Preco;
	$image = $product->Imagem;
	$iva = $product->Iva / 100.0;
	$brand = '';

	if (!empty($product->Marca))
		$brand = getBrandById($product->Marca);

	if (isset($_POST['comment']) && !empty($_POST['comment'])) {
		if (isset($_POST['rating']) && !empty($_POST['rating'])) {
			insertReview($_GET['id'], $_SESSION['user'], $_POST['rating'], $_POST['comment'], date("Y-m-d H:i:s"));
			header('Location: product.php?id=' . $_GET['id']);
			die();
		}
	}

	$category = getCategoryById($product->Familia);
	$reviews = getReviewsById($_GET['id']);
	$storages = getStockById($_GET['id']);
	$related = getRelatedProducts($product->Familia);
	$rating = getProductRating($_GET['id']);

	$maxNum = 0;
	for ($i = 0; $i < count($storages); $i++) {
		$maxNum += $storages[$i]->Stock;
	}

	if ($rating === NULL)
		$rating = 0;

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
						<div class="item active"><img src="images/<?= $image ?>" alt="Test"></div>
						<div class="item"><img src="images/<?= $image ?>" alt="Test"></div>
						<div class="item"><img src="images/<?= $image ?>" alt="Test"></div>
						<div class="item"><img src="images/<?= $image ?>" alt="Test"></div>
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
							<h3 class="pull-right" style="margin: 0 0 5px 0"><?= $price + ($price * $iva) ?>€</h3>
							<h3 style="margin: 0 0 5px 0">
								<?= $description ?>
								<?php if (!empty($brand)) echo "<small> by $brand</small>"; ?>
							</h3>
							<h5 style="margin-top: 0">in <?= $category ?></h5>
							<?php if ($logon === true) { ?>
								<span style="color: red; display: block; margin-bottom: 15px">
									<span>
										<?php printStars($rating); ?>
										<?= $rating ?> stars
									</span>
									<a href="#reviews" class="pull-right"><?= count($reviews) ?> reviews</a>
								</span>
								<?php if ($inList === false && $inCart === false) { ?>
									<form method="post">
										<div class="clearfix" style="margin-bottom: 10px">
											<button class="btn btn-primary" name="addtolist" type="submit">
												<span class="glyphicon glyphicon-list-alt"></span> Add To Wish List
											</button>
											<button class="btn btn-primary pull-right" name="addtocart" type="submit">
												<span class="glyphicon glyphicon-shopping-cart"></span> Add To Shopping Cart
											</button>
										</div>
										<input type="number" name="quantity" min="1" max="<?= $maxNum ?>" class="form-control pull-right" style="width: 100px" value="1">
										<span style="padding-top: 10px; margin-right: 5px" class="pull-right"><b>Quantity:</b></span>
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
										<div class="clearfix" style="margin-bottom: 10px">
											<button disabled class="btn btn-primary" name="addtolist" type="submit">
												<span class="glyphicon glyphicon-list-alt"></span> Add To Wish List
											</button>
											<button class="btn btn-primary pull-right" name="addtocart" type="submit">
												<span class="glyphicon glyphicon-shopping-cart"></span> Add To Shopping Cart
											</button>
										</div>
										<input type="number" name="quantity" min="1" max="<?= $maxNum ?>" class="form-control pull-right" style="width: 100px" value="1">
										<span style="padding-top: 10px; margin-right: 5px" class="pull-right"><b>Quantity:</b></span>
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
						<?php for ($i = 0; $i < count($related); $i++) { ?>
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="thumbnail">
									<img src="images/<?= $related[$i]->Imagem ?>" alt="Test">
									<div class="caption">
										<h4 style="margin: 0" class="pull-right">
											<?= $related[$i]->Preco + ($related[$i]->Preco * ($related[$i]->Iva / 100.0)) ?>€
										</h4>
										<h4 style="margin: 0">
											<a href="product.php?id=<?= $related[$i]->CodArtigo ?>">
												<?= $related[$i]->DescArtigo ?>
											</a>
										</h4>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } else { ?>
					<div class="alert alert-info" role="alert">
						<p>There are no related products, currently.</p>
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
								<?php printStars($reviews[$i]->Classificacao); ?>
								<?= $reviews[$i]->Classificacao ?> stars
							</span>
							<span style="display: block; margin-bottom: 10px">
								by <b><?= getUser($reviews[$i]->CodCliente)->NomeCliente ?></b> on <b><?= $reviews[$i]->Data ?></b>
							</span>
							<span style="display: block">
								<?= $reviews[$i]->Comentario ?>
							</span>
						</div>
					<?php } ?>
					<form method="post">
						<div class="well clearfix">
							<textarea name="comment" style="resize: vertical; margin-bottom: 20px" class="form-control" placeholder="Leave a review..." rows="6" required></textarea>
							<span class="pull-left" style="padding-top: 10px; margin-right: 5px">
								<b>Rating:</b>
							</span>
							<input class="form-control pull-left" style="width: 80px" type="number" min="1" max="5" name="rating" required>
							<button type="submit" class="btn btn-success pull-right" <?php if ($logon === false) echo "disabled"; ?>>
								<span class="glyphicon glyphicon-pencil"></span> Submit
							</button>
						</div>
					</form>
				<?php } else { ?>
					<div class="alert alert-info" role="alert">
						<p style="margin-bottom: 15px">There are no reviews for this product, currently.</p>
					</div>
					<form method="post">
						<div class="well clearfix">
							<textarea name="comment" style="resize: vertical; margin-bottom: 20px" class="form-control" placeholder="Leave a review..." rows="6" required></textarea>
							<span class="pull-left" style="padding-top: 10px; margin-right: 5px">
								<b>Rating:</b>
							</span>
							<input class="form-control pull-left" style="width: 80px" type="number" min="1" max="5" name="rating" required>
							<button type="submit" class="btn btn-success pull-right" <?php if ($logon === false) echo "disabled"; ?>>
								<span class="glyphicon glyphicon-pencil"></span> Submit
							</button>
						</div>
					</form>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
	<script src="js/product.js"></script>
</body>
</html>