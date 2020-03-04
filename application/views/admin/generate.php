<?php include('header.php') ?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Generate Form</h1>
				</div>
				<div class="col-sm-6">
					<button class="btn btn-primary float-right" id="add-btn">
						Generate New
					</button>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="col-sm-6 offset-sm-3">
				<div class="col-md-12" id="error-alert" style="display:none;">
					<div class="alert alert-danger">
						Have not submitted the form yet! 
					</div>
				</div>
				<div class="card card-primary" id="generate-form">
					<div class="card-header">
						<h3 class="card-title">Generate Admission Form</h3>
					</div>
					<form role="form" id="form">
						<div class="card-body">
							<div class="form-group">
								<label for="name">Student Code</label>
								<input type="text" class="form-control" id="code" placeholder="Enter unique code"
									required>
							</div>
						</div>
						<div class="card-footer">
							<button type="button" id="generate_btn" class="btn btn-success float-right">Generate
								Admission
								Form</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-6 offset-sm-3" id="print_card" style="display: none;">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Admission Form Details</h3>
					</div>
					<div class="card-body">
					<p id="print_p">Admission Form is generated successfully. </p>
					<div id="print">
					</div>
					</div>
				</div>
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
					$('#error-alert').hide();
					$('#generate-form').hide();
					$('#print_card').show();
					$('#print').html('');
					$('#print').append(`<button class="btn btn-primary float-right" onclick="print_pdf(`+"'"+unique_key+"'"+`)">Print Form</button>`);
				} else {
					$('#error-alert').show();
				}
			},
			error: function error(data) {
				console.log(data);
			}
		});
	});
	$('#add-btn').click(function(){
		$('#generate-form').show();
		$('#form')[0].reset();
		$('#print_card').hide();
	});

</script>
<script>
function print_pdf(key){
	key = btoa_return(key);
    window.open(base_url+"Admin/student_form/"+key, "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=20,left=400,width=600,height=700");
}
</script>
<?php include('footer.php')?>
