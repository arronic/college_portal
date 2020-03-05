<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= link_tag('/assets/css/bootstrap.css') ?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<title>College Portal</title>
	<style>
		body{
			background-image: url('<?= base_url('assets/images/bg-image.jpg')?>');
			background-size: cover;
			background-repeat: no-repeat;
		}
	</style>
</head>

<body>
	<div class="container mt-5 mb-5">
		<div class="card">
			<div class="card-header bg-success text-white">
				<h3 class="card-title">Admission Form<span class="float-right">Student Code:
						<?= $form_details->unique_code ?></span></h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
			<!-- <div class="card-body" style="background-image: url('<?= base_url('assets/images/bg-image.jpg')?>'); background-size: cover; "> -->
				<form role="form" method="POST" action="<?= base_url('Student/submit_form')?>"
					enctype="multipart/form-data">
					<input type="hidden" name="code" value="<?= $form_details->unique_code ?>">
					<div class="card">
						<div class="card-header bg-info text-white">
							<h3 class="card-title">Personal Information</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" name="name"
											value="<?= $form_details->student_name ?>" readonly=""
											style="cursor:not-allowed;">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Course</label>
										<input type="text" class="form-control" name="course"
											value="<?= $form_details->student_course ?>" readonly=""
											style="cursor:not-allowed;">
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
										<input type="text" class="form-control" name="g_village" required>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Guardian's P.O.</label>
										<input type="text" class="form-control" name="g_po" required>
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
						</div>
					</div>
					<div class="card mt-5">
						<div class="card-header bg-info text-white">
							<h3 class="card-title">Other Information</h3>
						</div>
						<div class="card-body">
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
										<select name="gender" id="" class="form-control" required>
											<option>Select gender</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
											<option value="transgender">Transgender</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card mt-5">
						<div class="card-header bg-info text-white">
							<h3 class="card-title">Educational Details</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Name of the institute last studied</label>
										<input type="text" class="form-control" name="last_institute" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Name of the last examination passed</label>
										<input type="text" class="form-control" name="last_exam" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination roll</label>
										<input type="text" class="form-control" name="last_exam_roll" required>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination no.</label>
										<input type="text" class="form-control" name="last_exam_no" required>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination year</label>
										<input type="number" class="form-control" name="last_exam_year" required>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Last examination center</label>
										<input type="text" class="form-control" name="last_exam_center" required>
									</div>
								</div>
							</div>
							<label for="">Last examination subjects</label>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Subjects</label>
										<input type="text" class="form-control" name="sub1" placeholder="subject 1"
											required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Max Marks</label>
										<input type="number" class="form-control" name="sub1_max"
											placeholder="max marks" required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Marks Obtained</label>
										<input type="number" class="form-control" name="sub1_obt"
											placeholder="marks obtained" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" name="sub2" placeholder="subject 2"
											required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

										<input type="number" class="form-control" name="sub2_max"
											placeholder="max marks" required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

										<input type="number" class="form-control" name="sub2_obt"
											placeholder="marks obtained" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">

										<input type="text" class="form-control" name="sub3" placeholder="subject 3"
											required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="number" class="form-control" name="sub3_max"
											placeholder="max marks" required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

										<input type="number" class="form-control" name="sub3_obt"
											placeholder="marks obtained" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub4" placeholder="subject 4"
											required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="number" class="form-control" name="sub4_max"
											placeholder="max marks" required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="number" class="form-control" name="sub4_obt"
											placeholder="marks obtained" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub5" placeholder="subject 5"
											required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="number" class="form-control" name="sub5_max"
											placeholder="max marks" required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="number" class="form-control" name="sub5_obt"
											placeholder="marks obtained" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="sub6" placeholder="subject 6"
											required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="number" class="form-control" name="sub6_max"
											placeholder="max marks" required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<input type="number" class="form-control" name="sub6_obt"
											placeholder="marks obtained" required>
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
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Last exam division (eg. 1st, 2nd etc.)</label>
										<input type="text" class="form-control" name="last_exam_div"
											placeholder="eg. 1st" required>
									</div>
								</div>
								<div class="col-sm-4">
									<label>Last exam total marks</label>
									<div class="form-group">
										<input type="number" class="form-control" name="last_exam_total" required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Last exam marks obained</label>
										<input type="number" class="form-control" name="last_exam_obtained" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>G.U./AHSEC Registration No.</label>
										<input type="text" class="form-control" name="gu_reg" required>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Year</label>
										<input type="number" class="form-control" name="gu_year" required>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card mt-5">
						<div class="card-header bg-info text-white">
							<h3 class="card-title">Miscellaneous Information</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4">
									<label>Where do you fall under?</label>
									<div class="form-group">
										<div class="custom-control custom-radio">
											<input class="custom-control-input" type="radio" id="customRadio1"
												name="apl_bpl" value="apl" required>
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
										<div class="custom-control custom-radio">
											<input class="custom-control-input" type="radio" id="cr1" name="study_break"
												value="yes" required>
											<label for="cr1" class="custom-control-label">Yes</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="custom-control-input" type="radio" id="cr2" name="study_break"
												value="no">
											<label for="cr2" class="custom-control-label">No</label>
										</div>
									</div>
									<div class="form-group" id="gap_reason" style="display: none;">
										<label>Please provide reason</label>
										<textarea name="break_reason" class="form-control" rows="3"
											placeholder="describe here" id="gap_reason_text"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card mt-5">
						<div class="card-header bg-info text-white">
							<h3 class="card-title">Image and Signature</h3>
						</div>
						<div class="card-body">
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
						</div>
					</div>
					<br>
					<button type="submit" id="save_btn" class="btn btn-success float-right">Save and Submit</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
			$('input[name="study_break"]').click(function () {
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
