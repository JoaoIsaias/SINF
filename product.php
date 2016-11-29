<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Product Name</title>
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
						<div class="item active"><img src="images/test.jpg" alt="Test"></div>
						<div class="item"><img src="images/test.jpg" alt="Test"></div>
						<div class="item"><img src="images/test.jpg" alt="Test"></div>
						<div class="item"><img src="images/test.jpg" alt="Test"></div>
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
						<div class="col-lg-6 col-md-6 col-sm-6">
							<h3 id="product-price" class="pull-right" style="margin: 0 0 5px 0"></h3>
							<h3 id="product-name" style="margin: 0 0 5px 0"></h3>
							<h5 id="product-category" style="margin-top: 0"></h5>
							<a id="number-reviews" href="#reviews" class="pull-right"></a>
							<span id="product-classification" style="color: red; display: block; margin-bottom: 15px"></span>
							<button class="btn btn-primary">
								<span class="glyphicon glyphicon-list-alt"></span> Add To Wish List
							</button>
							<button class="btn btn-primary pull-right">
								<span class="glyphicon glyphicon-shopping-cart"></span> Add To Shopping Cart
							</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<h3 style="margin-top: 0">Stock</h3>
							<ul id="storages" class="list-group" style="margin-bottom: 0"></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="related" class="row">
			<h4 style="margin: 0 0 10px 15px">Related Products</h4>
		</div>
		<div class="row">
			<div id="reviews" class="col-lg-12 col-md-12 col-sm-12">
				<h4 style="margin-top: 0">Reviews</h4>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>