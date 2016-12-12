<?php

require 'database.php';
$warning = false;

if (isset($_POST['login']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
	$user = getUser($_POST['user']);

	if ($user === NULL) {
		$warning = true;
	} else {
		if ($user->Password === $_POST['pass']) {
			$_SESSION['user'] = $_POST['user'];
			header('Location: index.php');
			die();
		} else {
			$warning = true;
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php require 'header.php'; ?>
	<title>Log In</title>
</head>
<body>
	<?php require 'navbar.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-1 col-lg-6 col-md-8 col-sm-10">
				<h1 style="margin-top: 0">Log In</h1>
				<div class="well">
					<form method="post">
						<div class="form-group">
							<div class="input-group">
								<input name="user" type="text" class="form-control text-center" placeholder="Username" required>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-envelope"></span>
								</span>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input name="pass" type="password" class="form-control text-center" placeholder="Password" required>
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</span>
							</div>
						</div>
						<button name="login" type="submit" class="btn btn-primary">
							Log In <span class="glyphicon glyphicon-triangle-right"></span>
						</button>
						<span style="float: right; margin: 8px 0px; font-size: small">
							Don't have an account yet? <a href="register.php">Register</a>
						</span>
					</form>
				</div>
				<?php if ($warning === true) { ?>
					<div class="alert alert-danger" role="alert">
						<span><b>Warning!</b> Invalid username or password.</span>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
</body>
</html>