<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<?= link_tag('/assets/css/style.css') ?>
	<title>Document</title>
</head>

<body>
	<!------ Include the above in your HEAD tag ---------->
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="wrapper fadeInDown">
					<div class="formContent" id="admin">
						<!-- Tabs Titles -->

						<!-- Icon -->

						<h2>Admin Login</h2>
						<!-- Login Form -->
						<form class="form-group m-3">
							<input type="text" id="username" class="mb-3 form-control fadeIn second" name="username"
								placeholder="username">
							<input type="password" id="password" class="mb-3 form-control fadeIn third" name="password"
								placeholder="password">
							<button type="button" class="btn btn-primary fadeIn fourth mb-3" id="admin_login"
								value="Log In">Log In</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="wrapper fadeInDown">
					<div class="formContent" id="student">
						<h2>Student</h2>
						<!-- Login Form -->
						<form class="m-3">
							<input type="text" id="unique" class="form-control mb-3 fadeIn second" name="uniq" placeholder="Unique ID">
							<button type="button" id="get_form" class="btn btn-primary float-right mr-3 mb-3"> Get Form</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
			var base_url = '<?= base_url();?>'
			$('#admin_login').click(function () {
				username = $('#username').val();
				password = $('#password').val();
				$.ajax({
					type: "POST",
					url: base_url + "login/login_check",
					data: {
						username: username,
						password: password
					},
					cache: false,
					success: function (data, status) {
                        
						if (data == "TRUE") {
							window.location = base_url + "admin";
						} else {
							$('.container').before(
								`<div class="col-md-12">
                                        <div class="alert alert-danger">
                                            Invalid Credentials! 
                                        </div>
                                    </div>`
							)
						}
					},
					error: function error(data) {
						console.log(data);
					}
				});
			});
            $('#get_form').click(function(){
                unique_key = $('#unique').val();
                $.ajax({
					type: "POST",
					url: base_url + "student/getform",
					data: {
						key: unique_key
					},
					cache: false,
					success: function (data, status) {
						if (data == "TRUE") {
							window.location = base_url + "student/fillform/"+unique_key;
						} else {
							$('#student').before(
								`<div class="col-md-12">
									<div class="alert alert-danger">
										Invalid UniqueID! 
									</div>
								</div>`
							)
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
