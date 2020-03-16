<?php include('header.php') ?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Promote Student</h1>
				</div>
				<div class="col-sm-6" id="new-btn" style="display:none;">
					<button class="btn btn-primary float-right" id="new_btn">
						New
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
						Not Found
					</div>
				</div>
				<div class="card card-primary" id="promote-card">
					<div class="card-header">
						<h3 class="card-title">Promote Student Form</h3>
					</div>
					<form role="form" id="search-form">
						<div class="card-body">
							<div class="form-group">
								<label for="name">Student Code</label>
								<input type="text" class="form-control" id="code" placeholder="Enter unique code"
									required>
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" id="search_btn" class="btn btn-success float-right">Search</button>
						</div>
					</form>
				</div>
				<div class="card card-primary" id="receipt-card" style="display:none;">
					<div class="card-header">
						<h3 class="card-title">Receipt</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							Take printout of the receipt for promotion.
						</div>
					</div>
					<div class="card-footer" id="receipt-footer">
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="promotion-modal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Student Details</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form id="promote-form">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-6">
								<strong>Student Name:</strong> <span id="s_name"></span>
							</div>
							<div class="col-sm-6">
								<strong>Student Course:</strong> <span id="s_course"></span>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<strong>Current Semester:</strong> <span id="s_sem"></span>
							</div>
							<div class="col-sm-6" id="">
								<input type="hidden" name="key" id="key">
								<div class="form-group">
									<label>The student will be promoted to: </label>
									<span id="not-appl"></span>
									<div class="row" id="semester-div">
										<div class="col-sm-6">
											<input class="form-control text-center" type="text" name="semester"
												id="semester" readonly>
										</div>
										<div class="col-sm-6">Semester</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<strong>Total Fee Payable:</strong> <span id="payable"></span>
							</div>
							<div class="col-sm-6">
							<label for="">Amount Paid</label>
								<input class="form-control" type="text" name="paid_amt" id="paid_amt" required>
							</div>
						</div>
					</div>
				</form>
				<div class="modal-footer">
					<button type="button" id="promote-btn" class="btn btn-secondary"
						data-dismiss="modal">Promote</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="confirm-modal">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Confirm Promotion</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				Are you sure to promote the student?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-primary" id="confirm_btn" data-dismiss="modal">Yes</button>
			</div>
		</div>
	</div>
</div>
<?php include('script.php')?>
<script type="text/javascript">
	var base_url = '<?= base_url(); ?>'
	$('#search-form').on("submit", function (e) {
		e.preventDefault();
		unique_key = $('#code').val();
		$.ajax({
			type: "POST",
			url: base_url + "Admin/get_student",
			data: {
				key: unique_key
			},
			dataType: 'json',
			cache: false,
			success: function (data, status) {
				console.log(data);
				
				if (data == "FALSE") {
					$('#error-alert').show();
				} else {
					$('#error-alert').hide();
					$('#promotion-modal').modal('toggle');
					$('#s_name').text(data.name);
					$('#s_course').text(data.course);
					$('#s_sem').text(data.semester);
					$('#key').val(data.code);
					$('#payable').text(data.payable);
					$('#semester').val(data.upgrade_to);
					if (data.semester == "6th") {
						$('#semester-div').hide();
						$('#not-appl').text('Not Applicable! Already in the final semester')
						$('#promote-btn').prop('disabled',true);
					}
				}
			},
			error: function error(data) {
				console.log(data);
			}
		});
	});
	$('#promote-btn').click(function () {
		$('#confirm-modal').modal('toggle');
	});
	$('#confirm_btn').click(function () {
		spinnerOn();
		semester = $('#semester').val();
		key = $('#key').val();
		paid_amt = $('#paid_amt').val();
		$.ajax({
			type: "POST",
			url: base_url + "Admin/promote_student",
			data: {
				key: key,
				semester: semester,
				paid_amt: paid_amt
			},
			dataType: 'json',
			cache: false,
			success: function (data, status) {
				if (data.class == "success") {
					spinnerOff();
					feedback_msg(data, 5000);
					$('#promote-card').hide();
					$('#receipt-card').show();
					$('#receipt-footer').html(`
					<button type="button" onclick="print_pdf('` + key + `');" class="btn btn-success float-right">Print</button>
					`);
					$('#new-btn').show();
				} else {
					spinnerOff();
					feedback_msg(data, 5000);
				}
			},
			error: function error(data) {
				console.log(data);
			}
		});
	});
	$('#new_btn').click(function () {
		$('#promote-card').show();
		$("#code").val('');
		$('#receipt-card').hide();
	});

</script>
<script>
	function print_pdf(key) {
		key = btoa_return(key);
		window.open(base_url + "Admin/promotion_pdf/" + key, "_blank",
			"directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=20,left=400,width=600,height=700"
		);
	}

</script>
<?php include('footer.php')?>
