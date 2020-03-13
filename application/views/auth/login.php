<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<?= link_tag('/assets/css/style.css') ?>
	<title>College Portal</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="wrapper fadeInDown">
					<div class="formContent" id="admin">
						<h2>Admin Login</h2>
						<div class="col-md-12" id="error-credential" style="display:none;">
							<div class="alert alert-danger">
								Invalid Credentials! 
							</div>
						</div>
						<form class="form-group m-3" id="admin_form">
							<input type="text" id="username" class="mb-3 form-control fadeIn second" name="username"
								placeholder="username">
							<input type="password" id="password" class="mb-3 form-control fadeIn third" name="password"
								placeholder="password">
							<button type="submit" class="btn btn-primary fadeIn fourth mb-3" id="admin_login"
								value="Log In">Log In</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	var base_url = '<?= base_url();?>'
		$(document).ready(function () {
			$('#admin_form').on('submit', function (e) {
				e.preventDefault();
				username = $('#username').val();
				password = window.btoa($('#password').val());
				$.ajax({
					type: "POST",
					url: base_url + "Login/login_check",
					data: {
						username: username,
						password: password
					},
					cache: false,
					success: function (data, status) {

						if (data == "TRUE") {
							window.location = base_url + "Admin";
						} else {
							$('#error-credential').show();
						}
					},
					error: function error(data) {
						console.log(data);
					}
				});
			});
		});
	</script>
</body>

</html>
