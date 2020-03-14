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
		<div class="card mt-3 mb-3 student-card">
			<div class="card-header" style="background-image: linear-gradient(to right, #dffbf2 , #bbffff);">
				<div class="row">
					<div class="col-md-3">
						<img class="m-3" src="<?= base_url('assets/images/logo.png')?>" alt="LOGO" width="100px">
					</div>
					<div class="col-md-9 mt-5 mb-3 pr-5">
						<div class="text-right">
							<h3 class="font-weight-bold">Jaleswar College Tapoban</h3>
						</div>
						<div class="text-right">
							<h5 class="font-weight-bold">ESTD:1981</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="card-content mt-3">
				<div class="row">
					<div class="col-md-6 pr-5 pl-5">
						<h4 class="font-weight-bold">Welcome to Jaleswar College Portal</h4>
						<div class="wrapper">
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
						<div class="text-center">
							<a target="_blank" class="btn btn-outline-primary"
								href="<?= base_url('assets/pdf/dummy.pdf') ?>">Click here to download prospectus</a>
						</div>
					</div>
					<div class="col-md-6 pr-5">
						<div style="max">
							<h5 class="font-weight-bold">Notice:</h5>
							<marquee behavior="scroll" direction="up" scrollamount="3" onmouseover="this.stop();"
								onmouseout="this.start();" style="max-height: 280px;min-height: 280px;">
								<ul>
									<?php
									foreach ($notice as $key => $value) {?>
									<li class="marquee-text mt-3" style="list-style-type: none;">
										<?php if ($value->tag) {?>
										<img src="<?=base_url('assets/images/new.gif')?>" height="30px" width="50px"
											alt="" srcset="">
										<?php
								}
								?>
										<?= $value->notice ?></li>
									<?php }
								?>
								</ul>

							</marquee>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="row pl-5 pr-5">
					<div class="col-md-6">
						<h5 class="font-weight-bold" style="color:red;"><u>Important note before filling up the
								form:</u>
						</h5>
						<div>
							<ol>
								<li>Keep your unique id with you</li>
								<li>Scanned copy of your passport size photograph</li>
								<li>Scanned copy of your signature</li>
								<li>If BPL, BPL document number</li>
								<li>Previous education records</li>
							</ol>
						</div>
					</div>
					<div class="col-md-6">
						<h5 class="font-weight-bold" style="color:red;"><u>NB:</u></h5>
						<div>
							<ol>
								<li>Enroll in the college administration office before 10-June-2020</li>
								<li>The admission is open till 30-June-2020</li>
								<li>Submit all the required documents in the administration office during the time of
									admission</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>
<script>
	var base_url = '<?= base_url();?>'
	$('#student').on('submit', function (e) {
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
					window.location = base_url + "Student/fillform/" + window.unique_key;
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
		window.open(base_url + "Student/myform/" + code, "_blank",
			"directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=20,left=400,width=600,height=700"
		);
	}

</script>

</html>
