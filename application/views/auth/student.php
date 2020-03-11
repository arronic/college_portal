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
					<div class="formContent">
						<h2>Student</h2>
						<div class="col-md-12" id="error-submitted" style="display:none;">
							<div class="alert alert-success">
								Form Already submitted!
							</div>
						</div>
						<div class="col-md-12" id="error-invalid" style="display:none;">
							<div class="alert alert-danger">
								Invalid UniqueID!
							</div>
						</div>
						<form class="m-3" id="student">
							<input type="text" id="unique" class="form-control mb-3 fadeIn second" name="uniq"
								placeholder="Unique ID">
							<button type="submit" class="btn btn-primary float-right mr-3 mb-3"> Get
								Form</button>
						</form>
						<div id="print"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	var base_url = '<?= base_url();?>'
	$('#student').on('submit', function(e) {
		e.preventDefault();
		unique_key = btoa_return($('#unique').val());
		
		$.ajax({
			type: "POST",
			url: base_url + "Student/getform",
			data: {
				key: unique_key
			},
			cache: false,
			success: function (data, status) {
				if (data == "TRUE") {
					window.location = base_url + "student/fillform/" + window.unique_key;
				} else if (data == "NONE") {
					$('#error-invalid').hide();
					$('#error-submitted').show();
					$('#print').html('');
					$('#print').append(
						`<button class="btn btn-success float-left" style="margin-left:20px;" onclick="print_pdf('` +
						unique_key + `')"><i class="fas fa-print"></i> Print Form</button>`);
				} else {
					$('#error-submitted').hide();
					$('#error-invalid').show();
				}
			},
			error: function error(data) {
				console.log(data);
			}
		});
	});
</script>
<script>
	function btoa_return(string) {
		return window.btoa(string);
	}
	function print_pdf(code) {
		window.open(base_url + "student/myform/" + code, "_blank",
			"directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=20,left=400,width=600,height=700"
		);
	}
</script>
</html>
