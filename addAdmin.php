<html>
	<head>
		<title>Rasik Jewellers</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	</head>
	<body>
		<?php
			include'header.php';
			include'database_connection.php';
		?>
		<div class="container">
			<form action="addAdmin1.php" method="post">
				<div class="row">
					<div class="col-md-12">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6">
							<button type="submit" class="btn btn-primary btn-block btn-lg" style="background-color:#393939;">Add</button>
						</div>
						<div class="col-md-6">
							<button type="reset" class="btn btn-primary btn-block btn-lg" style="background-color:#393939;">Reset</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
