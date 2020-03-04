<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= link_tag('/assets/css/bootstrap.css') ?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<title>Document</title>
</head>

<body>
	<div class="container mt-5">
		<div class="card card-warning">
			<div class="card-header">
				<h3 class="card-title">Admission Form<span class="float-right">Student Code:
						<?= $form_details->unique_code ?></span></h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form role="form" method="POST" action="<?= base_url('student/submit_form')?>"
					enctype="multipart/form-data">
					<input type="hidden" class="form-control" name="student_code"
						value="<?= $form_details->unique_code ?>">
					<input type="hidden" class="form-control" name="student_name"
						value="<?= $form_details->student_name ?>">
					<input type="hidden" class="form-control" name="student_course"
						value="<?= $form_details->student_course ?>">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="student_name"
									value="<?= $form_details->student_name ?>" disabled>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Course</label>
								<input type="text" class="form-control" name="student_course"
									value="<?= $form_details->student_course ?>" disabled>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Father's Name</label>
								<input type="text" class="form-control" name="father" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Mother's Name</label>
								<input type="text" class="form-control" name="mother" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Guardian's Name</label>
								<input type="text" class="form-control" name="g_name" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Guardian's Occupation</label>
								<input type="text" class="form-control" name="g_occupation" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Guardian's Relation</label>
								<input type="text" class="form-control" name="g_relation" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Guardian's Village</label>
								<input type="text" class="form-control" name="g_vill" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Guardian's P.O.</label>
								<input type="text" class="form-control" name="g_PO" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Guardian's District</label>
								<input type="text" class="form-control" name="g_district" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Guardian's Pin</label>
								<input type="number" class="form-control" name="g_pin" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Guardian's Phone</label>
								<input type="number" class="form-control" name="g_phone" required>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nationality</label>
								<input type="text" class="form-control" name="nationality" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Religion</label>
								<input type="text" class="form-control" name="religion" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Cast</label>
								<input type="text" class="form-control" name="cast" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>DOB</label>
								<input type="date" class="form-control" name="dob" required>
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
								<input type="text" class="form-control" name="l_institute" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Name of the last examination passed</label>
								<input type="text" class="form-control" name="l_exam" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label>Last examination roll</label>
								<input type="text" class="form-control" name="e_roll" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Last examination no.</label>
								<input type="text" class="form-control" name="e_no" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Last examination year</label>
								<input type="number" class="form-control" name="e_year" required>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Last examination center</label>
								<input type="text" class="form-control" name="e_center" required>
							</div>
						</div>
					</div>
					<hr>
					<label for="">Last examination subjects</label>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="">Subjects</label>
								<input type="text" class="form-control" name="sub1" placeholder="subject 1" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="">Max Marks</label>
								<input type="number" class="form-control" name="sub1_max" placeholder="max marks"
									required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="">Marks Obtained</label>
								<input type="number" class="form-control" name="sub1_obt" placeholder="marks obtained"
									required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">

								<input type="text" class="form-control" name="sub2" placeholder="subject 2" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">

								<input type="number" class="form-control" name="sub2_max" placeholder="max marks"
									required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">

								<input type="number" class="form-control" name="sub2_obt" placeholder="marks obtained"
									required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">

								<input type="text" class="form-control" name="sub3" placeholder="subject 3" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="number" class="form-control" name="sub3_max" placeholder="max marks"
									required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">

								<input type="number" class="form-control" name="sub3_obt" placeholder="marks obtained"
									required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" name="sub4" placeholder="subject 4" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="number" class="form-control" name="sub4_max" placeholder="max marks"
									required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="number" class="form-control" name="sub4_obt" placeholder="marks obtained"
									required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" name="sub5" placeholder="subject 5" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="number" class="form-control" name="sub5_max" placeholder="max marks"
									required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="number" class="form-control" name="sub5_obt" placeholder="marks obtained"
									required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" name="sub6" placeholder="subject 6" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="number" class="form-control" name="sub6_max" placeholder="max marks"
									required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="number" class="form-control" name="sub6_obt" placeholder="marks obtained"
									required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Other, if any (use comma(,) between subjects)</label>
							<div class="form-group">
								<input type="text" class="form-control" name="o_sub">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Last exam division</label>
								<input type="text" class="form-control" name="division" required>
							</div>
						</div>
						<div class="col-sm-4">
							<label>Last exam total marks</label>
							<div class="form-group">
								<input type="number" class="form-control" name="total" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Last exam marks obained</label>
								<input type="number" class="form-control" name="obtained" required>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>G.U./AHSEC Registration No.</label>
								<input type="text" class="form-control" name="gu_reg_no" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Year</label>
								<input type="number" class="form-control" name="gu_year" required>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-4">
							<label>Where do you fall under?</label>
							<div class="form-group">
								<div class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" id="customRadio1" name="apl"
										value="apl" required>
									<label for="customRadio1" class="custom-control-label">APL</label>
								</div>
								<div class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" id="customRadio2" name="apl"
										value="bpl">
									<label for="customRadio2" class="custom-control-label">BPL</label>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<label>Is there any break of your studies?</label>
							<div class="form-group">
								<div class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" id="cr1" name="gap" value="yes"
										required>
									<label for="cr1" class="custom-control-label">Yes</label>
								</div>
								<div class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" id="cr2" name="gap" value="no">
									<label for="cr2" class="custom-control-label">No</label>
								</div>
							</div>
							<div class="form-group" id="gap_reason" style="display: none;">
								<label>Please provide reason</label>
								<textarea name="gap_reason" class="form-control" rows="3" placeholder="describe here"
									id="gap_reason_text"></textarea>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Upload Image</label>
								<input type="file" class="form-control" id="image_file" name="file[]" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Upload Signature</label>
								<input type="file" class="form-control" id="sign_file" name="file[]" required>
							</div>
						</div>
					</div>
					<hr>
					<button type="submit" id="save_btn" class="btn btn-primary float-right">Save and Submit</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
			$('input[name="gap"]').click(function () {
				if ($(this).attr('id') == 'cr1') {
					$('#gap_reason').show();
					$('#gap_reason_text').required = true;
				} else {
					$('#gap_reason').hide();
					$('#gap_reason_text').required = false;
				}
			});
		});

	</script>
</body>

</html>
