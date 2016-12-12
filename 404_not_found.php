<?php

require 'database.php';

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>404 Not Found</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-1 col-lg-6 col-md-8 col-sm-10">
				<div class="jumbotron text-center">
					<h1 style="margin: 0">404 <small>error</small></h1>
					<h4 style="margin-top: 0">
						Page not found <span class="glyphicon glyphicon-search"></span>
					</h4>
					<span>We are sorry but the page you are looking for does not exist.</span>
					<br>
					<span>You could return to the <a href="index.php">Homepage</a> or search for something else with the search box above.</span>
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>