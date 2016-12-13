<?php

require 'database.php';

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Search Results</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<h2 style="margin: 0 0 10px 15px">Search results for ""</h2>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product</th>
								<th>Price</th>
								<th>Reviews</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<a href="product.php?id=">
										<img src="images/smallImage.png" class="img-responsive" width="65" height="65">
									</a>
								</td>
								<td>
									<h4>
										<a href="product.php?id=">Product</a> <small>by Brand in Category</small>
									</h4>
								</td>
								<td><h4>24.99€</h4></td>
								<td>
									<h4>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span style="margin-left: 5px">5.0 stars</span>
									</h4>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>