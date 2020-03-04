<?php include('header.php')?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Enrollment Form</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Enrollment Form</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="card card-primary">
				<div id="generate">
					<div class="card card-primary" id="generate-form">
						<div class="card-header">
							<h3 class="card-title">Fill-up Admission Form</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form">
							<div class="card-body">
								<div class="form-group">
									<label for="name">Student Code</label>
									<input type="text" class="form-control" id="code" placeholder="Enter unique code"
										required>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="button" id="fill-btn" class="btn btn-primary float-right">Fill Admission
									Form</button>
							</div>
						</form>
					</div>
				</div>
				<div id="form" class="card card-primary" style="display:none;">
					<div class="card-header">
						<h3 class="card-title">Admission Form<span class="float-right">Student Code:
							</span></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form action="<?= base_url('Admin') ?>" enctype="multipart/form-data" id="storeForm"
							method="POST">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="hidden" name="id">
										<label>Name</label>
										<input type="text" class="form-control" id="s_name" name="name">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Course</label>
										<input type="text" class="form-control" id="s_course" name="course">
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group">
										<label>Course</label>
										<input type="text" class="form-control" id="s_code" name="code">
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
						<button type="submit" id="update-btn" class="btn btn-primary">Save</button>
					</div>
					</form>
				</div>
			</div>
		</div>
</div>
</section>
</div>
<?php include('script.php')?>
<script type="text/javascript">
$(document).ready(function(){
    var base_url = '<?= base_url(); ?>'
    $('#fill-btn').click(function(){
        var code = $('#code').val();
        $.ajax({
                type: "POST",
                url: base_url + "admin/formdetails", 
                data: {code: code},
                cache:false,
                success: 
                    function(data,status){   
                                     
                        if (data == "FALSE") {
                            
                        }else if(data=="NONE"){

                        }
                        else{
                            $('#form').show();
                            data=JSON.parse(data);
                            $('#s_name').val(data.student_name);
                            $('#s_course').val(data.student_course);
                            $('#s_code').val(data.unique_code);
                        }
                    },
                error: 
                    function error(data) {
                        console.log(data);
                    }
                });
        
    });
    $('#storeForm').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				url: base_url + "Admin/store_student",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				processData: false,
				contentType: false,
				success: function (data, status) {
					if (data == "TRUE") {
                        $('#storeForm').hide();
                        $('#generate-form').after(
                            `<div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Enrollment Details</h3>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-center">Student Unique Id: `+uniquekey+`</h4>
                                    <a href="`+base_url+"admin/print_pdf/"+uniquekey+`" class="btn btn-primary float-right">Print Form</a>
                                </div>
                            </div>`
                        );
                        $('.content').before(
							`<div class="col-md-6 offset-md-3">
									<div class="alert alert-success">
										Form Submitted!!!
									</div>
								</div>`
						)
					} else {
						$('.content').before(
							`<div class="col-md-6 offset-md-3">
									<div class="alert alert-danger">
										Could Not Submit!!!
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
<?php include('footer.php')?>
