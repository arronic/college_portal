<?php include('header.php');?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Filled Forms</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Filled Form</li>
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
							<th>Student Code</th>
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
								<span aria-hidden="true"></span>
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
							<span aria-hidden="true"></span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?= base_url('Admin') ?>" enctype="multipart/form-data" id="editForm" method="POST">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input type="hidden" name="id">
										<label>Name</label>
										<input type="text" class="form-control" name="student_name" value="" disabled>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Course</label>
										<input type="text" class="form-control" name="student_course" value="" disabled>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Father's Name</label>
										<input type="text" class="form-control" name="father">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Mother's Name</label>
										<input type="text" class="form-control" name="mother">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Name</label>
										<input type="text" class="form-control" name="g_name">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Occupation</label>
										<input type="text" class="form-control" name="g_occupation">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Relation</label>
										<input type="text" class="form-control" name="g_relation">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Guardian's Village</label>
										<input type="text" class="form-control" name="g_village">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Guardian's P.O.</label>
										<input type="text" class="form-control" name="g_po">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's District</label>
										<input type="text" class="form-control" name="g_district">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Pin</label>
										<input type="text" class="form-control" name="g_pin">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Guardian's Phone</label>
										<input type="text" class="form-control" name="g_phone">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Nationality</label>
										<input type="text" class="form-control" name="nationality">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Religion</label>
										<input type="text" class="form-control" name="religion">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Cast</label>
										<input type="text" class="form-control" name="cast">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>DOB</label>
										<input type="date" class="form-control" name="dob">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Gender</label>
										<select name="gender" id="" class="form-control">
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
										<input type="text" class="form-control" name="last_institute">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Name of the last examination passed</label>
										<input type="text" class="form-control" name="last_exam">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination roll</label>
										<input type="text" class="form-control" name="last_exam_roll">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination no.</label>
										<input type="text" class="form-control" name="last_exam_no">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination year</label>
										<input type="text" class="form-control" name="last_exam_year">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination center</label>
										<input type="text" class="form-control" name="last_exam_center">
									</div>
								</div>
							</div>
							<hr>
							<label for="">Last examination subjects</label>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Subjects</label>
										<input type="text" class="form-control" name="sub1">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Max Marks</label>
										<input type="text" class="form-control" name="sub1_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Marks Obtained</label>
										<input type="text" class="form-control" name="sub1_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" name="sub2">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" name="sub2_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" name="sub2_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" name="sub3">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub3_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" name="sub3_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub4">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub4_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub4_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub5">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub5_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub5_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub6">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub6_max">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub6_obt">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label>Other, if any (use comma(,) between subjects)</label>
									<div class="form-group">
										<input type="text" class="form-control" name="other_sub">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Last exam division</label>
										<input type="text" class="form-control" name="last_exam_div">
									</div>
								</div>
								<div class="col-sm-4">
									<label>Last exam total marks</label>
									<div class="form-group">
										<input type="text" class="form-control" name="last_exam_total">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Last exam marks obained</label>
										<input type="text" class="form-control" name="last_exam_obtained">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>G.U./AHSEC Registration No.</label>
										<input type="text" class="form-control" name="gu_reg">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Year</label>
										<input type="text" class="form-control" name="gu_year">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<label>Where do you fall under?</label>
									<div class="form-group">
										<div class="custom-control custom-radio">
											<input class="custom-control-input" type="radio" id="customRadio1"
												name="apl_bpl" value="apl">
											<label for="customRadio1" class="custom-control-label">APL</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="custom-control-input" type="radio" id="customRadio2"
												name="apl_bpl" value="bpl">
											<label for="customRadio2" class="custom-control-label">BPL</label>
										</div>
									</div>
								</div>
								<div class="col-sm-8">
									<label>Is there any break of your studies?</label>
									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input" type="checkbox" name="study_break"
												id="gap_checkbox" value="1" onchange="valueChanged()">
											<label for="gap_checkbox" class="custom-control-label">Yes</label>
										</div>
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
<script type="text/javascript">
	base_url = '<?= base_url() ?>'

	function valueChanged() {
		if ($('#gap_checkbox').is(":checked")) {
			$("#gap_reason").show();
			$('#gap_reason_text').required = true;
		} else
			$("#gap_reason").hide();
	}
	$(document).ready(function () {
		var myTable = $('#my-table').DataTable({
			"ajax": base_url + "Admin/admitted",
			// "table": "#my-table",
			
		});
		$('#edit-modal').on('show.bs.modal', function (e) {
			$('#image_file').val('');
			$('#sign_file').val('');
			var studentID = $(e.relatedTarget).data('student-id');
			$.ajax({
				type: "GET",
				url: base_url + "student/getdetails/" + studentID,
				cache: false,
				success: function (data, status) {
					data = JSON.parse(data);
					if (data.study_break == 1) {
						$(e.currentTarget).find('#gap_checkbox').prop('checked', true);
						$('#gap_reason_text').val(data.break_reason);
					} else {
						$(e.currentTarget).find('#gap_checkbox').prop('checked', false);
					}
					if ($(e.currentTarget).find('#gap_checkbox').is(":checked")) {
						$(e.currentTarget).find("#gap_reason").show();
						$(e.currentTarget).find('#gap_reason_text').required = true;
					} else {
						$(e.currentTarget).find("#gap_reason").hide();
					}
					$(e.currentTarget).find('[name="id"]').val(data.id);
					$(e.currentTarget).find('[name="student_name"]').val(data.name);
					$(e.currentTarget).find('[name="student_course"]').val(data.course);
					$(e.currentTarget).find('[name="father"]').val(data.father);
					$(e.currentTarget).find('[name="mother"]').val(data.mother);
					$(e.currentTarget).find('[name="g_name"]').val(data.g_name);
					$(e.currentTarget).find('[name="g_occupation"]').val(data.g_occupation);
					$(e.currentTarget).find('[name="g_relation"]').val(data.g_relation);
					$(e.currentTarget).find('[name="g_village"]').val(data.g_village);
					$(e.currentTarget).find('[name="g_po"]').val(data.g_po);
					$(e.currentTarget).find('[name="g_district"]').val(data.g_district);
					$(e.currentTarget).find('[name="g_pin"]').val(data.g_pin);
					$(e.currentTarget).find('[name="g_phone"]').val(data.g_phone);
					$(e.currentTarget).find('[name="nationality"]').val(data.nationality);
					$(e.currentTarget).find('[name="religion"]').val(data.religion);
					$(e.currentTarget).find('[name="cast"]').val(data.cast);
					$(e.currentTarget).find('[name="dob"]').val(data.dob);
					$(e.currentTarget).find('[name="gender"]').val(data.gender);
					$(e.currentTarget).find('[name="last_institute"]').val(data.last_institute);
					$(e.currentTarget).find('[name="last_exam"]').val(data.last_exam);
					$(e.currentTarget).find('[name="last_exam_roll"]').val(data.last_exam_roll);
					$(e.currentTarget).find('[name="last_exam_no"]').val(data.last_exam_no);
					$(e.currentTarget).find('[name="last_exam_year"]').val(data.last_exam_year);
					$(e.currentTarget).find('[name="last_exam_center"]').val(data.last_exam_center);
					$(e.currentTarget).find('[name="sub1"]').val(data.sub1);
					$(e.currentTarget).find('[name="sub2"]').val(data.sub2);
					$(e.currentTarget).find('[name="sub3"]').val(data.sub3);
					$(e.currentTarget).find('[name="sub4"]').val(data.sub4);
					$(e.currentTarget).find('[name="sub5"]').val(data.sub5);
					$(e.currentTarget).find('[name="sub6"]').val(data.sub6);
					$(e.currentTarget).find('[name="sub1_max"]').val(data.sub1_max);
					$(e.currentTarget).find('[name="sub2_max"]').val(data.sub2_max);
					$(e.currentTarget).find('[name="sub3_max"]').val(data.sub3_max);
					$(e.currentTarget).find('[name="sub4_max"]').val(data.sub4_max);
					$(e.currentTarget).find('[name="sub5_max"]').val(data.sub5_max);
					$(e.currentTarget).find('[name="sub6_max"]').val(data.sub6_max);
					$(e.currentTarget).find('[name="sub1_obt"]').val(data.sub1_obt);
					$(e.currentTarget).find('[name="sub2_obt"]').val(data.sub2_obt);
					$(e.currentTarget).find('[name="sub3_obt"]').val(data.sub3_obt);
					$(e.currentTarget).find('[name="sub4_obt"]').val(data.sub4_obt);
					$(e.currentTarget).find('[name="sub5_obt"]').val(data.sub5_obt);
					$(e.currentTarget).find('[name="sub6_obt"]').val(data.sub6_obt);
					$(e.currentTarget).find('[name="other_sub"]').val(data.other_sub);
					$(e.currentTarget).find('[name="last_exam_div"]').val(data.last_exam_div);
					$(e.currentTarget).find('[name="last_exam_total"]').val(data.last_exam_total);
					$(e.currentTarget).find('[name="last_exam_obtained"]').val(data.last_exam_obtained);
					$(e.currentTarget).find('[name="gu_reg"]').val(data.gu_reg);
					$(e.currentTarget).find('[name="gu_year"]').val(data.gu_year);
					$(e.currentTarget).find("input[name=apl_bpl][value=" + data.apl_bpl + "]")
						.prop('checked', true);
					$('#image').attr('src', base_url + 'upload/' + data.image_path);
					$('#signature').attr('src', base_url + 'upload/' + data.sign_path);
				},
				error: function (error) {
					console.error(error);
				}
			});
		});
		$('#editForm').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				url: base_url + "Admin/update_student",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				processData: false,
				contentType: false,
				success: function (data, status) {
					if (data == "TRUE") {
						$('#edit-modal').modal('hide');
						myTable.ajax.reload();
					} else {
						$('.container').before(
							`<div class="col-md-6 offset-md-3">
									<div class="alert alert-danger">
										Could Not Update!!!
									</div>
								</div>`
						)
					}
				},
				error: function (error) {
					console.log(error);
				}
			});
		});
	});

</script>
<?php include('footer.php');?>
