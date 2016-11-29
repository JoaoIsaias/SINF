<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Register</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-1 col-lg-6 col-md-8 col-sm-10">
				<h1 style="margin-top: 0">Register</h1>
				<div class="well">
					<form>
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control text-center" placeholder="Name">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="email" class="form-control text-center" placeholder="Email">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-envelope"></span>
								</span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="email" class="form-control text-center" placeholder="Confirm Email">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-envelope"></span>
								</span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="password" class="form-control text-center" placeholder="Password">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="password" class="form-control text-center" placeholder="Confirm Password">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</span>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">
							Create Account <span class="glyphicon glyphicon-triangle-right"></span>
						</button>
						<span style="float: right; margin: 8px 0px; font-size: small">
							Have an account already? <a href="login.php">Log In</a>
						</span>
					</form>
				</div>
				<div class="alert alert-info" role="alert">
					In order to help keep your information secure, we have some minimum password requirements.<br>
					1. Eight to thirty characters long<br>
					2. Has at least one uppercase letter<br>
					3. Has at least one number
				</div>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>