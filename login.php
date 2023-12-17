<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="res/css/style.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-2"></div>
			<div class="col-lg-6 col-md-8 login-box">
				<div class="login-key">
					<i class="fa fa-key" aria-hidden="true"></i>
				</div>
				<div class="login-title">
					ADMIN PANEL
				</div>
				<div class="login-form">
					<form action="proses_login.php" method="post">
						<div class="form-group">
							<label class="form-control-label">USERNAME</label>
							<input type="text" class="form-control" name="username" placeholder="username" autofocus="">
						</div>
						<div class="form-group">
							<label class="form-control-label">PASSWORD</label>
							<input type="password" class="form-control" name="password" placeholder="password">
						</div>
						<div class="loginbttm">
							<div class="login-btm login-text">
								<!-- Pesan Kesalahan -->
							</div>
							<div class="login-btm login-button">
								<button type="submit" class="btn btn-outline-primary">LOGIN</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-3 col-md-2"></div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(".btn-default").click(function() {
			$("#container").removeClass("bungloon-square bungloon-underline bungloon-outline");
		});
		$(".btn-square").click(function() {
			$("#container").removeClass("bungloon-underline bungloon-outline").addClass('bungloon-square');
		});
		$(".btn-underline").click(function() {
			$("#container").removeClass("bungloon-square bungloon-outline").addClass('bungloon-underline');
		});

		$(".btn-outline").click(function() {
			$("#container").removeClass("bungloon-square bungloon-underline").addClass('bungloon-outline');
		});
	</script>
</body>

</html>