<?php include('header.php');?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Admission List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Admission List</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="card p-3">
				<table class="table table-hover" id="my-table" width="100%">
					<thead>
						<tr>
							<th>Sl no.</th>
							<th>Name</th>
							<th>Course</th>
							<th>Student Code</th>
							<th>Admission Date</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<div class="modal fade" id="admit-modal" tabindex="-1" role="dialog" aria-labelledby="admitModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="admit_form">
						<div class="modal-header">
							<h5 class="modal-title" id="admitModalLabel">Admission</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">x</span>
							</button>
						</div>
						<div class="modal-body">
							Everything is good. Admit the student?
							<input type="hidden" id="admit_student_id" name="admit_id" value="">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" id="admit-btn" class="btn btn-primary">Admit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="delete_form">
						<div class="modal-header">
							<h5 class="modal-title" id="deleteModalLabel">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"></span>
							</button>
						</div>
						<div class="modal-body">
							This student will be deleted permanently. Perform delete?
							<input type="hidden" id="delete_student_id" name="delete_id" value="">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
							<button type="button" id="delete-btn" class="btn btn-primary">Yes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="payment_form">
						<div class="modal-header">
							<h5 class="modal-title" id="paymentModalLabel">Payment</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"></span>
							</button>
						</div>
						<div class="modal-body">
							Admission Fee for the Student is : <span id="fee"></span>
							<input type="hidden" id="payment_student_id" name="payment_id" value="">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" id="payment-btn" class="btn btn-primary">Paid</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editModalLabel">Edit</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">x</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('Admin') ?>" enctype="multipart/form-data" id="editForm"
							method="POST">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input type="hidden" name="id" id="id">
										<label>Name</label>
										<input type="text" class="form-control" id="name" name="name" value="" disabled>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Course</label>
										<input type="text" class="form-control" id="course" name="course" value=""
											disabled>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Father's Name</label>
										<input type="text" class="form-control" id="father" name="father">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Mother's Name</label>
										<input type="text" class="form-control" id="mother" name="mother">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Name</label>
										<input type="text" class="form-control" id="g_name" name="g_name">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Occupation</label>
										<input type="text" class="form-control" id="g_occupation" name="g_occupation">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Relation</label>
										<input type="text" class="form-control" id="g_relation" name="g_relation">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Guardian's Village</label>
										<input type="text" class="form-control" id="g_village" name="g_village">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Guardian's P.O.</label>
										<input type="text" class="form-control" id="g_po" name="g_po">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's District</label>
										<input type="text" class="form-control" id="g_district" name="g_district">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Pin</label>
										<input type="text" class="form-control" id="g_pin" name="g_pin">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Phone</label>
										<input type="text" class="form-control" id="g_phone" name="g_phone">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Nationality</label>
										<input type="text" class="form-control" id="nationality" name="nationality">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Religion</label>
										<input type="text" class="form-control" id="religion" name="religion">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Cast</label>
										<input type="text" class="form-control" id="cast" name="cast">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>DOB</label>
										<input type="date" class="form-control" id="dob" name="dob">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Gender</label>
										<select name="gender" id="gender" class="form-control">
											<option value="male">Male</option>
											<option value="female">Female</option>
											<option value="transgender">Transgender</option>
										</select>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Name of the institute last studied</label>
										<input type="text" class="form-control" id="last_institute"
											name="last_institute">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Name of the last examination passed</label>
										<input type="text" class="form-control" id="last_exam" name="last_exam">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination roll</label>
										<input type="text" class="form-control" id="last_exam_roll"
											name="last_exam_roll">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination no.</label>
										<input type="text" class="form-control" id="last_exam_no" name="last_exam_no">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination year</label>
										<input type="text" class="form-control" id="last_exam_year"
											name="last_exam_year">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination center</label>
										<input type="text" class="form-control" id="last_exam_center"
											name="last_exam_center">
									</div>
								</div>
							</div>
							<hr>
							<label for="">Last examination subjects</label>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Subjects</label>
										<input type="text" class="form-control" id="sub1" name="sub1">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Max Marks</label>
										<input type="text" class="form-control" id="sub1_max" name="sub1_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Marks Obtained</label>
										<input type="text" class="form-control" id="sub1_obt" name="sub1_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" id="sub2" name="sub2">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" id="sub2_max" name="sub2_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" id="sub2_obt" name="sub2_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" id="sub3" name="sub3">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub3_max" name="sub3_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" id="sub3_obt" name="sub3_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub4" name="sub4">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub4_max" name="sub4_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub4_obt" name="sub4_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub5" name="sub5">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub5_max" name="sub5_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub5_obt" name="sub5_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub6" name="sub6">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub6_max" name="sub6_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" id="sub6_obt" name="sub6_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label>Other, if any (use comma(,) between subjects)</label>
									<div class="form-group">
										<input type="text" class="form-control" id="other_sub" name="other_sub">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Last exam division</label>
										<input type="text" class="form-control" id="last_exam_div" name="last_exam_div">
									</div>
								</div>
								<div class="col-sm-4">
									<label>Last exam total marks</label>
									<div class="form-group">
										<input type="text" class="form-control" id="last_exam_total"
											name="last_exam_total">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Last exam marks obained</label>
										<input type="text" class="form-control" id="last_exam_obtained"
											name="last_exam_obtained">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>G.U./AHSEC Registration No.</label>
										<input type="text" class="form-control" id="gu_reg" name="gu_reg">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Year</label>
										<input type="text" class="form-control" id="gu_year" name="gu_year">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label> Name of Subject taken as Honours (Earlier known as
										Major) in the following subject -</label>
									<div class="form-group">
										<select class="form-control" name="major" id="major">
											<option value="">Select one</option>
											<option value="English">English</option>
											<option value="MIL (Assamese)">MIL (Assamese)</option>
											<option value="History">History</option>
											<option value="Political Science">Political Science</option>
											<option value="Economics">Economics</option>
											<option value="Philosophy">Philosophy</option>
											<option value="Arabic">Arabic</option>
											<option value="Mathematics">Mathematics</option>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<label>Subject available in the college for Regular
										Course.</label>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox1" name="regular[]" value="History">
													<label for="customCheckbox1"
														class="custom-control-label">History</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox2" name="regular[]" value="Political Science">
													<label for="customCheckbox2" class="custom-control-label">Political
														Science</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox3" name="regular[]" value="Economics">
													<label for="customCheckbox3"
														class="custom-control-label">Economics</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox4" name="regular[]" value="Education">
													<label for="customCheckbox4"
														class="custom-control-label">Education</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox5" name="regular[]" value="Philosophy">
													<label for="customCheckbox5"
														class="custom-control-label">Philosophy</label>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox6" name="regular[]" value="Elective Assamese">
													<label for="customCheckbox6" class="custom-control-label">Elective
														Assamese</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox7" name="regular[]" value="Elective Hindi">
													<label for="customCheckbox7" class="custom-control-label">Elective
														Hindi</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox8" name="regular[]" value="Arabic">
													<label for="customCheckbox8"
														class="custom-control-label">Arabic</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox9" name="regular[]" value="Mathematics">
													<label for="customCheckbox9"
														class="custom-control-label">Mathematics</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox"
														id="customCheckbox10" name="regular[]" value="Linguistics">
													<label for="customCheckbox10"
														class="custom-control-label">Linguistics</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Where do you fall under?</label>
									<div class="form-group">
										<select class="form-control select2" name="apl_bpl" id="apl_bpl"
											style="width: 100%;">
											<option value="apl">APL</option>
											<option value="bpl">BPL</option>
										</select>
									</div>
									<div class="form-group" id="bpl_no_group" style="display:none;">
										<label>BPL Card No.</label>
										<input type="text" class="form-control" name="bpl_no" id="bpl_no">
									</div>
								</div>
								<div class="col-sm-8">
									<label>Is there any break of your studies?</label>
									<div class="form-group col-sm-4">
										<select class="form-control select2" name="study_break" id="study_break"
											style="width: 100%;" onchange="valueChanged()">
											<option value="yes">YES</option>
											<option value="no">NO</option>
										</select>
									</div>
									<div class="form-group" id="gap_reason" style="display: none;">
										<label>Please provide reason</label>
										<textarea name="break_reason" class="form-control" rows="3"
											placeholder="describe here" id="gap_reason_text"></textarea>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6 text-center">
									<img src="" alt="" srcset="" id="image">
								</div>
								<div class="col-sm-6 text-center">
									<img src="" alt="" srcset="" id="signature">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Upload Image</label>
										<input type="file" id="image_file" class="form-control" name="file[]">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Upload Signature</label>
										<input type="file" id="sign_file" class="form-control" name="file[]">
									</div>
								</div>
							</div>
							<hr>
					</div>
					<input type="hidden" name="paid_amt" id="paid_amt">
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" id="update-btn" class="btn btn-primary">Update</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include('script.php');?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
	base_url = '<?= base_url() ?>'
	var limit = 2;

	function valueChanged() {
		if ($('#study_break').val() == "yes") {
			$("#gap_reason").show();
			$('#gap_reason_text').required = true;
		} else
			$("#gap_reason").hide();
	}
	$(document).ready(function () {
		mySelect = $('#regular').select2({
			placeholder: 'Select any two from the options',
			maximumSelectionLength: 2
		});
		var myTable = $('#my-table').DataTable({
			"ajax": base_url + "Admin/admitted",
			dom: "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>><'row'<'col-md-12'rt>><'row'<'col-md-6'i><'col-md-6'p>>",
			buttons: [{
					extend: 'excel',
					title: table_title('Admission List'),
					exportOptions: {
						columns: [0, 1, 2, 3, 4]
					},
					footer: true,
				},
				{
					extend: 'pdf',
					title: table_title('Admission List'),
					exportOptions: {
						columns: [0, 1, 2, 3, 4]
					}
				},
				'copy', 'colvis'
			],
		});
		$('#edit-modal').on('show.bs.modal', function (e) {
			$('#image_file').val('');
			$('#sign_file').val('');
			var studentID = $(e.relatedTarget).data('student-id');
			spinnerOn();
			$.ajax({
				type: "GET",
				url: base_url + "student/getdetails/" + studentID,
				cache: false,
				dataType: 'json',
				success: function (data) {
					spinnerOff();
					$('#id').val(data.id);
					data.regular.split(",", 2).forEach(element => {
						$('input[name="regular[]"][value="' + element + '"]').prop(
							'checked', true);
					});
					var x;
					if (data.study_break == "yes") {
						$("#gap_reason").show();
						$('#gap_reason_text').val(data.break_reason);
					} else {
						$("#gap_reason").hide();
					}
					for (x in data) {
						$('#' + x).val(data[x]);
					}
					$('#image').attr('src', base_url + 'upload/' + data.image_path);
					$('#signature').attr('src', base_url + 'upload/' + data.sign_path);
					if ($('#apl_bpl').val() == "bpl") {
						$('#bpl_no_group').show();
					}
					$('#paid_amt').val(data.paid_amt);
				},
				error: function (error) {
					console.error(error);
				}
			});
		});
		$('#apl_bpl').change(function () {
			if ($('#apl_bpl').val() == 'bpl') {
				$('#bpl_no_group').show();
				$('#bpl_no').prop('required', true);
			} else {
				$('#bpl_no_group').hide();
				$('#bpl_no').prop('required', false);
			}
		});
		$('#editForm').on('submit', function (e) {
			e.preventDefault();
			if ($("input[name='regular[]']:checked").length != limit) {
				e.preventDefault();
				$("input[name='regular[]']").focus();
				toastr.warning('Select two subjects from regular course');
			} else {
				spinnerOn();
				$.ajax({
					url: base_url + "Admin/update_student",
					type: "POST",
					data: new FormData(this),
					dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,
					processData: false,
					contentType: false,
					success: function (data) {
						spinnerOff();
						if (data.class == "success") {
							$('#edit-modal').modal('hide');
							feedback_msg(data, 10000);
							myTable.ajax.reload();
						} else {
							toastr.error('Could not update');
						}
					},
					error: function (error) {
						console.log(error);
					}
				});
			}
		});
		$('input.custom-control-input').on('change', function (evt) {
			if ($("input[name='regular[]']:checked").length > limit) {
				this.checked = false;
			}
		});
	});

</script>
<?php include('footer.php');?>
