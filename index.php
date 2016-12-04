<?php

require 'database.php';

$categories = getAllCategories();

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
						<div class="item active">
							<img src="images/test.jpg" alt="Test">
							<div class="carousel-caption">
								<h3>Test</h3>
								<p>Testing.</p>
							</div>
						</div>
						<div class="item">
							<img src="images/test.jpg" alt="Test">
							<div class="carousel-caption">
								<h3>Test</h3>
								<p>Testing.</p>
							</div>
						</div>
						<div class="item">
							<img src="images/test.jpg" alt="Test">
							<div class="carousel-caption">
								<h3>Test</h3>
								<p>Testing.</p>
							</div>
						</div>
						<div class="item">
							<img src="images/test.jpg" alt="Test">
							<div class="carousel-caption">
								<h3>Test</h3>
								<p>Testing.</p>
							</div>
						</div>
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
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="thumbnail">
							<img src="images/test.jpg" alt="Test">
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="thumbnail">
							<img src="images/test.jpg" alt="Test">
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="thumbnail">
							<img src="images/test.jpg" alt="Test">
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="thumbnail">
							<img src="images/test.jpg" alt="Test">
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="thumbnail">
							<img src="images/test.jpg" alt="Test">
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="thumbnail">
							<img src="images/test.jpg" alt="Test">
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="thumbnail">
							<img src="images/test.jpg" alt="Test">
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="thumbnail">
							<img src="images/test.jpg" alt="Test">
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
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>