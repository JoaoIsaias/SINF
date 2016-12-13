<?php

require 'database.php';

/*$products = array();
$categories = getAllCategories();
$randomNumbers = generateNRandomNumbers(4, count($categories) - 1);

for ($c = 0; $c < 4; $c++) {
	if ($categories[$randomNumbers[$c]]->Descricao !== 'IGNORAR')
		array_push($products, getByCategory($categories[$randomNumbers[$c]]->IdCategoria));
	else
		array_push($products, getByCategory($categories[rand(0, count($categories) - 1)]->IdCategoria));
}

for ($i = 0; $i < count($products); $i++) {
	var_dump($products[$i]);
	echo '<br>PAUSE<br>';
}*/

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
		<?php for ($i = 0; $i < 4; $i++) { ?>
			<div class="row">
				<h3 style="margin: 0 0 10px 15px"><?= $categories[$randomNumbers[$i]]->Descricao ?></h3>
				<?php for ($j = 0; $j < 4; $j++) { ?>
					<div class="col-lg-3 col-md-3 col-sm-6">
						<div class="thumbnail">
							<img src="images/mediumImage.png" alt="Test">
							<div class="caption">
								<h4 class="pull-right" style="margin: 0">
									<?= $products[$i][$j]->Preco ?>€
								</h4>
								<h4 style="margin: 0">
									<a href="product.php?id=<?= $products[$i][$j]->CodArtigo ?>">
										<?= $products[$i][$j]->DescArtigo ?>
									</a>
								</h4>
							</div>
							<div class="caption clearfix" style="padding-top: 0">
								<span class="pull-right">
									<a href="product.php?id=<?= $products[$i][$j]->CodArtigo ?>#reviews">
										<?= 0 ?>
										<span> reviews</span>
									</a>
								</span>
								<span>
									<!-- print stars -->
								</span>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		<!-- <div class="row">
			<h3 style="margin: 0 0 10px 15px">Category #1</h3>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<h3 style="margin: 0 0 10px 15px">Category #2</h3>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<h3 style="margin: 0 0 10px 15px">Category #3</h3>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<h3 style="margin: 0 0 10px 15px">Category #4</h3>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="thumbnail">
					<img src="images/mediumImage.png" alt="Test">
					<div class="caption">
						<h3 class="pull-right" style="margin: 0">$24.99</h3>
						<a href="product.php"><h3 style="margin: 0">Test</h3></a>
					</div>
					<div class="caption" style="padding-top: 0">
						<span class="pull-right">
							<a href="product.php#reviews">69 reviews</a>
						</span>
						<span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
						</span>
					</div>
				</div>
			</div>
		</div> -->
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>