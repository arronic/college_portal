<?php include('header.php') ?>
<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Generate Form</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Generate Form</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="card card-primary" id="generate-form">
				<div class="card-header">
					<h3 class="card-title">Generate Admission Form</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form role="form">
					<div class="card-body">
						<div class="form-group">
							<label for="name">Student Code</label>
							<input type="text" class="form-control" id="code" placeholder="Enter unique code" required>
						</div>
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="button" id="generate_btn" class="btn btn-primary float-right">Generate Admission
							Form</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
<?php include('script.php')?>
<script type="text/javascript">
	var base_url = '<?= base_url(); ?>'
	$('#generate_btn').click(function () {
		unique_key = $('#code').val();
		$.ajax({
			type: "POST",
			url: base_url + "Admin/getformdetails",
			data: {
				key: unique_key
			},
			cache: false,
			success: function (data, status) {

				if (data == "TRUE") {
					$('#generate-form').after(`<div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Admission Form Details</h3>
                                </div>
                                <div class="card-body">
                                    <a target="_blank" href="` + base_url + "student/myform/" + unique_key + `" class="btn btn-primary float-right">Print Form</a>
                                </div>
                            </div>`);
				} else {
					$('#generate-form').before(
						`<div class="col-md-12">
									<div class="alert alert-danger">
										Have not submitted the form yet! 
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

</script>

<?php include('footer.php')?>
