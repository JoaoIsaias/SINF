<nav class="navbar navbar-inverse" style="border-radius: 0">
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
					<li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Wish List</a></li>
					<li><a href="shopping_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
				</ul>
				<form id="smallForm" action="search_results.php" class="navbar-form navbar-right" role="search" style="display: none">
					<div class="input-group">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								All <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Category #1</a></li>
								<li><a href="#">Category #2</a></li>
								<li><a href="#">Category #3</a></li>
								<li><a href="#">Category #4</a></li>
							</ul>
						</div>
						<input type="text" class="form-control" placeholder="Search">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div id="firstRow" class="row">
			<form method="get" action="search_results.php" class="navbar-form text-center" role="search">
				<button id="all-btn" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 9%">
					All <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li><a href="#">Category #1</a></li>
					<li><a href="#">Category #1</a></li>
					<li><a href="#">Category #1</a></li>
					<li><a href="#">Category #1</a></li>
				</ul>
				<input id="search-bar" type="text" class="form-control" placeholder="Search" style="width: 80%">
				<button id="search-btn" class="btn btn-default" type="submit" style="width: 9%">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</form>
		</div>
	</div>
</nav>