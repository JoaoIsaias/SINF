<?php

require 'database.php';

$load = $_GET['load'];

$mode = 'less';
$products = NULL;

if (isset($load) && !empty($load)) {
	if ($load === 'more') {
		$mode = 'more';
		$products = get32RandProducts();
	} else {
		$products = get16RandProducts();
	}
} else {
	$products = get16RandProducts();
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Homepage</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom: 20px">
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
			</div>
		</div>
		<div class="row">
			<?php for ($i = 0; $i < 4; $i++) { ?>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/mediumImage.png" alt="Test">
						<div class="caption">
							<h4 style="margin: 0" class="pull-right">
								<?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€
							</h4>
							<h4 style="margin: 0">
								<a href="product.php?id=<?= $products[$i]->CodArtigo ?>">
									<?= $products[$i]->DescArtigo ?>
								</a>
							</h4>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row">
			<?php for ($i = 4; $i < 8; $i++) { ?>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/mediumImage.png" alt="Test">
						<div class="caption">
							<h4 style="margin: 0" class="pull-right">
								<?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€
							</h4>
							<h4 style="margin: 0">
								<a href="product.php?id=<?= $products[$i]->CodArtigo ?>">
									<?= $products[$i]->DescArtigo ?>
								</a>
							</h4>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row">
			<?php for ($i = 8; $i < 12; $i++) { ?>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/mediumImage.png" alt="Test">
						<div class="caption">
							<h4 style="margin: 0" class="pull-right">
								<?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€
							</h4>
							<h4 style="margin: 0">
								<a href="product.php?id=<?= $products[$i]->CodArtigo ?>">
									<?= $products[$i]->DescArtigo ?>
								</a>
							</h4>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row">
			<?php for ($i = 12; $i < 16; $i++) { ?>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/mediumImage.png" alt="Test">
						<div class="caption">
							<h4 style="margin: 0" class="pull-right">
								<?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€
							</h4>
							<h4 style="margin: 0">
								<a href="product.php?id=<?= $products[$i]->CodArtigo ?>">
									<?= $products[$i]->DescArtigo ?>
								</a>
							</h4>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php if ($mode === 'less') { ?>
			<div class="text-center" style="margin-bottom: 20px">
				<a href="index.php?load=more" class="btn btn-success">
					<span class="glyphicon glyphicon-refresh"></span> Load More
				</a>
			</div>
		<?php } else { ?>
		<div class="row">
			<?php for ($i = 16; $i < 20; $i++) { ?>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/mediumImage.png" alt="Test">
						<div class="caption">
							<h4 style="margin: 0" class="pull-right">
								<?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€
							</h4>
							<h4 style="margin: 0">
								<a href="product.php?id=<?= $products[$i]->CodArtigo ?>">
									<?= $products[$i]->DescArtigo ?>
								</a>
							</h4>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row">
			<?php for ($i = 20; $i < 24; $i++) { ?>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/mediumImage.png" alt="Test">
						<div class="caption">
							<h4 style="margin: 0" class="pull-right">
								<?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€
							</h4>
							<h4 style="margin: 0">
								<a href="product.php?id=<?= $products[$i]->CodArtigo ?>">
									<?= $products[$i]->DescArtigo ?>
								</a>
							</h4>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row">
			<?php for ($i = 24; $i < 28; $i++) { ?>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/mediumImage.png" alt="Test">
						<div class="caption">
							<h4 style="margin: 0" class="pull-right">
								<?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€
							</h4>
							<h4 style="margin: 0">
								<a href="product.php?id=<?= $products[$i]->CodArtigo ?>">
									<?= $products[$i]->DescArtigo ?>
								</a>
							</h4>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row">
			<?php for ($i = 28; $i < 32; $i++) { ?>
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/mediumImage.png" alt="Test">
						<div class="caption">
							<h4 style="margin: 0" class="pull-right">
								<?= $products[$i]->Preco + ($products[$i]->Preco * ($products[$i]->Iva / 100.0)) ?>€
							</h4>
							<h4 style="margin: 0">
								<a href="product.php?id=<?= $products[$i]->CodArtigo ?>">
									<?= $products[$i]->DescArtigo ?>
								</a>
							</h4>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>