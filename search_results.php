<?php

require 'database.php';

$type = 'both';
$option = 'All';
$term = '';
$results = NULL;

if (isset($_GET['type']) && isset($_GET['option']) && isset($_GET['term'])) {
	if (!empty($_GET['type']) && !empty($_GET['option']) && !empty($_GET['term'])) {
		$type = $_GET['type'];
		$option = $_GET['option'];
		$term = $_GET['term'];

		if ($type === 'both') {
			$results = getSearchResults($term);
		} else if ($type === 'brand') {
			$brands = getAllBrands();
			$brandID = getBrandId($_GET['option'], $brands);
			$results = getSpecificSearchResults($term, $brandID);
		} else if ($type === 'category') {
			$categories = getAllCategories();
			$categoryID = getCategoryId($_GET['option'], $categories);
			$results = getSpecificSearchResults($term, $categoryID);
		}
	} else {
		header('Location: index.php');
		die();
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
	<title>Search Results</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<?php if ($type === 'both') { ?>
					<h2 style="margin-top: 0">Search results for "<?= $term ?>"</h2>
				<?php } else { ?>
					<h2 style="margin-top: 0">Search results for "<?= $term ?>" in "<?= $option ?>"</h2>
				<?php } ?>
				<?php if ($results === NULL || count($results) === 0) { ?>
					<div class="alert alert-warning" role="alert">
						<span><b>Warning!</b> There are no matches for "<?= $term ?>".</span>
					</div>
				<?php } else { ?>
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
								<?php for ($i = 0; $i < count($results); $i++) { ?>
									<tr>
										<td>
											<a href="product.php?id=<?= $results[$i]->CodArtigo ?>">
												<img src="images/smallImage.png" class="img-responsive" width="65" height="65">
											</a>
										</td>
										<td>
											<h5>
												<a href="product.php?id=<?= $results[$i]->CodArtigo ?>">
													<?= $results[$i]->DescArtigo ?>
												</a>
											</h5>
										</td>
										<td><h5><?= $results[$i]->Preco ?> €</h5></td>
										<td>
											<h5>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span class="glyphicon glyphicon-star"></span>
												<span style="margin-left: 5px">5.0 stars</span>
											</h5>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>