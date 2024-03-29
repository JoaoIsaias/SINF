<?php

$term = '';
$logon = false;

$brands = getAllBrands();
$categories = getAllCategories();

if (isset($_GET['term'])) {
	if (!empty($_GET['term'])) {
		$term = $_GET['term'];
	}
}

if (isset($_SESSION['user'])) {
	if (!empty($_SESSION['user'])) {
		$logon = true;
	}
}

?>

<nav class="navbar navbar-default" style="border-radius: 0">
	<div class="container">
		<div class="row">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="index.php" style="margin-left: 0">Website Name</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<?php if ($logon === true) { ?>
						<li>
							<a href="wish_list.php"><span class="glyphicon glyphicon-heart"></span> Wish List</a>
						</li>
						<li>
							<a href="shopping_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
						</li>
					<?php } ?>
					<li>
						<?php if ($logon === true) { ?>
							<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
						<?php } else { ?>
							<a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a>
						<?php } ?>
					</li>
					<li>
						<?php if ($logon === true) { ?>
							<a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['user'] ?>'s Profile</a>
						<?php } else { ?>
							<a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a>
						<?php } ?>
					</li>
				</ul>
				<div class="navbar-form navbar-right">
					<div class="input-group">
						<div class="input-group-btn">
							<button id="dropdown" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								All<span class="text-hide">|both</span><span style="margin-left: 5px" class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a class="both" href="#">All</a></li>
								<li class="dropdown-header"><h5 style="margin: 0">Brands</h5></li>
								<?php for ($i = 0; $i < count($brands); $i++) { ?>
									<?php if ($brands[$i]->Descricao !== 'IGNORAR') { ?>
										<li><a class="brand" href="#"><?= $brands[$i]->Descricao ?></a></li>
									<?php } ?>
								<?php } ?>
								<li class="dropdown-header"><h5 style="margin: 0">Categories</h5></li>
								<?php for ($i = 0; $i < count($categories); $i++) { ?>
									<?php if ($categories[$i]->IdCategoria !== 'IGNORAR') { ?>
										<li><a class="category" href="#"><?= $categories[$i]->Descricao ?></a></li>
									<?php } ?>
								<?php } ?>
							</ul>
						</div>
						<input id="search-box" type="text" class="form-control" value="<?= $term ?>" placeholder="Search">
						<div class="input-group-btn">
							<button id="submit" type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>