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
					<li>
						<a href="#"><span class="glyphicon glyphicon-list-alt"></span> Wish List</a>
					</li>
					<li>
						<a href="shopping_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
					</li>
					<li>
						<a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a>
					</li>
					<li>
						<a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a>
					</li>
				</ul>
				<form action="search_results.php" method="get" class="navbar-form navbar-right">
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
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</nav>