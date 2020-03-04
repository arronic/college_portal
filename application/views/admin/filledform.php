<?php include('header.php');?>
<!-- Include SmartWizard CSS -->
<link href="<?= base_url() ?>assets/wizerd/css/smart_wizard.css" rel="stylesheet" type="text/css" />

<!-- Optional SmartWizard theme -->
<link href="<?= base_url() ?>assets/wizerd/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />

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
							<th>Course</th>
							<th>Category</th>
							<th>Fee</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>

		<!-- test Model starts -->
		<div div class="modal fade" id="admit-modal" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
					
						<div class="modal-header">
							<h5 class="modal-title" id="admitModalLabel">Admission</h5>

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<!-- SmartWizard html -->
							<?= form_open_multipart('Admin/update_student', ['id'=>'updateForm', 'data-toggle'=>'validator']) ?>
							<div id="smartwizard">
							    <ul>
							        <li><a href="#step-1">Step 1<br /><small>View Application Form</small></a></li>
							        <li><a href="#step-2">Step 2<br /><small>Pay Admission Fee</small></a></li>
							        <li><a href="#step-3">Step 3<br /><small>Admit The Student</small></a></li>
							        <li><a href="#step-4">Step 4<br /><small>Finish Admission Precess</small></a></li>
							    </ul>

							    <div>
							        <div id="step-1" class="">
							            <h3 class="border-bottom border-gray pb-2">View Application Form</h3>
												<div id="form-step-0" role="form" data-toggle="validator">
							            		<div class="row">
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<input type="hidden" name="id" id="id">
							            					<label>Name</label>
							            					<input type="text" class="form-control" name="name" id="name" value="">
							            				</div>
							            			</div>
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<label>Course</label>
															<select class="form-control select2" style="width: 100%;" id="course">
																<?php
																	foreach ($courses as $course) {?>
																		<option value="<?=$course->course_name?>"><?=$course->course_name?></option>
																	<?php }
																?>
															</select>
							            					<!-- <input type="text" class="form-control" name="course" id="course" value=""> -->
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<label>Father's Name</label>
							            					<input type="text" class="form-control" name="father"id="father" >
							            				</div>
							            			</div>
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<label>Mother's Name</label>
							            					<input type="text" class="form-control" name="mother"id="mother">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>Guardian's Name</label>
							            					<input type="text" class="form-control" name="g_name" id="g_name">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>Guardian's Occupation</label>
							            					<input type="text" class="form-control" name="g_occupation" id="g_occupation">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>Guardian's Relation</label>
							            					<input type="text" class="form-control" name="g_relation" id="g_relation">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<label>Guardian's Village</label>
							            					<input type="text" class="form-control" name="g_village" id="g_village">
							            				</div>
							            			</div>
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<label>Guardian's P.O.</label>
							            					<input type="text" class="form-control" name="g_po"  id="g_po">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>Guardian's District</label>
							            					<input type="text" class="form-control" name="g_district" id="g_district">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>Guardian's Pin</label>
							            					<input type="text" class="form-control" name="g_pin" id="g_pin">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>Guardian's Phone</label>
							            					<input type="text" class="form-control" name="g_phone" id="g_phone">
							            				</div>
							            			</div>
							            		</div>
							            		<hr>
							            		<div class="row">
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<label>Nationality</label>
							            					<input type="text" class="form-control" name="nationality" id="nationality">
							            				</div>
							            			</div>
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<label>Religion</label>
							            					<input type="text" class="form-control" name="religion" id="religion">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>Cast</label>
							            					<input type="text" class="form-control" name="cast" id="cast">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>DOB</label>
							            					<input type="date" class="form-control" name="dob" id="dob">
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
							            					<input type="text" class="form-control" name="last_institute" id="last_institute">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-12">
							            				<div class="form-group">
							            					<label>Name of the last examination passed</label>
							            					<input type="text" class="form-control" name="last_exam" id="last_exam">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-3">
							            				<div class="form-group">
							            					<label>Last examination roll</label>
							            					<input type="text" class="form-control" name="last_exam_roll" id="last_exam_roll">
							            				</div>
							            			</div>
							            			<div class="col-sm-3">
							            				<div class="form-group">
							            					<label>Last examination no.</label>
							            					<input type="text" class="form-control" name="last_exam_no" id="last_exam_no">
							            				</div>
							            			</div>
							            			<div class="col-sm-3">
							            				<div class="form-group">
							            					<label>Last examination year</label>
							            					<input type="text" class="form-control" name="last_exam_year" id="last_exam_year">
							            				</div>
							            			</div>
							            			<div class="col-sm-3">
							            				<div class="form-group">
							            					<label>Last examination center</label>
							            					<input type="text" class="form-control" name="last_exam_center" id="last_exam_center">
							            				</div>
							            			</div>
							            		</div>
							            		<hr>
							            		<label for="">Last examination subjects</label>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label for="">Subjects</label>
							            					<input type="text" class="form-control" name="sub1" id="sub1" >
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label for="">Max Marks</label>
							            					<input type="text" class="form-control" name="sub1_max" id="sub1_max">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label for="">Marks Obtained</label>
							            					<input type="text" class="form-control" name="sub1_obt" id="sub1_obt">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">

							            					<input type="text" class="form-control" name="sub2" id="sub2">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">

							            					<input type="text" class="form-control" name="sub2_max" id="sub2_max">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">

							            					<input type="text" class="form-control" name="sub2_obt" id="sub2_obt">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">

							            					<input type="text" class="form-control" name="sub3" id="sub3">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub3_max" id="sub3_max">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">

							            					<input type="text" class="form-control" name="sub3_obt" id="sub3_obt">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub4" id="sub4">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub4_max"  id="sub4_max">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub4_obt"  id="sub4_obt">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub5"  id="sub5">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub5_max"  id="sub5_max">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub5_obt"  id="sub5_obt">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub6"  id="sub6">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub6_max"  id="sub6_max">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="sub6_obt"  id="sub6_obt">
							            				</div>
							            			</div>
							            		</div>
							            		<div class="row">
							            			<div class="col-sm-6">
							            				<label>Other, if any (use comma(,) between subjects)</label>
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="other_sub"  id="other_sub">
							            				</div>
							            			</div>
							            		</div>
							            		<hr>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>Last exam division</label>
							            					<input type="text" class="form-control" name="last_exam_div" id="last_exam_div">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<label>Last exam total marks</label>
							            				<div class="form-group">
							            					<input type="text" class="form-control" name="last_exam_total"  id="last_exam_total">
							            				</div>
							            			</div>
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            					<label>Last exam marks obained</label>
							            					<input type="text" class="form-control" name="last_exam_obtained" id="last_exam_obtained">
							            				</div>
							            			</div>
							            		</div>
							            		<hr>
							            		<div class="row">
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<label>G.U./AHSEC Registration No.</label>
							            					<input type="text" class="form-control" name="gu_reg" id="gu_reg">
							            				</div>
							            			</div>
							            			<div class="col-sm-6">
							            				<div class="form-group">
							            					<label>Year</label>
							            					<input type="text" class="form-control" name="gu_year"  id="gu_year">
							            				</div>
							            			</div>
							            		</div>
							            		<hr>
							            		<div class="row">
							            			<div class="col-sm-4">
							            				<div class="form-group">
							            				    
							            					<label>Where do you fall under?</label>
							            				    <select class="form-control" id="apl_bpl">
							            				      <option>Select</option>
															  <option value="apl">APL</option>
															  <option value="bpl">BPL</option>							            				      
							            				    </select>
							            				  </div>
							            			</div>
							            			<div class="col-sm-8">
							            				<label>Is there any break of your studies?</label>
							            				<div class="col-sm-4">
							            					<div class="form-group">
							            				    
								            				    <select class="form-control" name="study_break" id="study_break" onchange="valueChanged()">
								            				      <option>Select</option>
																  <option value="yes">Yes</option>
																  <option value="no">No</option>							            				      
								            				    </select>
							            				  	</div>
							            				</div>
							            				<div class="form-group" id="gap_reason" style="display: none;">
							            					<label>Please provide reason</label>
							            					<textarea name="break_reason" class="form-control" rows="3"
							            						placeholder="describe here" id="break_reason"></textarea>
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
											
							            
							            <!-- <button class="btn btn-primary float-right" type="submit">Save & Next</button> -->
							            <!-- <div class="clearfix"></div> -->
							            
							            </div>
							        
							        </div>



							        <div id="step-2" class="">
							            <h3 class="border-bottom border-gray pb-2">Pay Admission Fee</h3>
							            
								            <div id="form-step-1" role="form" data-toggle="validator">
								            	<div class="form-group">
								            		<label>Total Admission Fee: Rs. 3750</label>
								            		<input type="text" class="form-control" name="paid_amt"  id="paid_amt" required="">
								            		
								            	</div>
								            </div>
								        
							        </div>
							        <div id="step-3" class="">
							        	<h3 class="border-bottom border-gray pb-2">Admit The Student</h3>
							        	<div class="row" style="margin-top: 50px;" >
							        		<div class="col"></div>
							            	<div class="col">
							            	  <div class="card card-success">
							            	    <div class="card-header">
							            	      <h3 class="card-title">Are you Sure to Admit the student ?</h3>
							            	    </div>
							            	    <div class="card-body">
							            	      <button class="btn btn-success float-right" type="submit">Yes, Admit</button>
							            	      <div class="btn btn-warning float-right" style="margin-right: 10px">No, Cancel</div>
							            	    </div>
							            	  </div>
							            	</div>
							            	<div class="col"></div>
							        		
							        	</div>
							            
							        </div>
							        <div id="step-4" class="">
							            <div class="row" style="margin-top: 20px; display: none;" id="adm_succ">
							            	<div class="col-md-3"></div>
							            	<div class="col-md-6">
							            	  <div class="position-relative p-3 bg-gray" style="height: 180px">
							            	    <div class="ribbon-wrapper ribbon-xl">
							            	      <div class="ribbon bg-success text-xl">
							            	        Admitted
							            	      </div>
							            	    </div>
							            	    Admission for <span id="s_name">STUDENT NAME</span> <br /> has successfully Completed <br />
							            	    <small>Course Name: <span id="s_course">Course</span> <br> Payment: Rs. <span id="pay_amt">xxxx</span> </small>
							            	    <br>
							            	    <a href="" target="_blank" class="btn btn-primary btn-sm" id="pay_receipt">Print Receipt</a>
							            	  </div>
							            	</div>

							            </div>
							        </div>
							    </div>
							    <?= form_close() ?>
							</div>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							
						</div>
					<!-- </form> -->
				</div>
			</div>
		</div>

		<!-- test mode ends-->


		<!-- DeleteModel Start -->
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
		<!-- Delete Model Ends -->






	
	</section>
</div>

<?php include('script.php');?>


<script>
	function admit(key){
		$('#admit-modal').modal('toggle');
		$.ajax({
			type: "GET",
			url: base_url + "Admin/getDetails/" + key,
			dataType: 'json',
			cache: false,
			success: function (data) {
				// console.log(data);
				
				var x;
				$('#course').val(data.course);
				if(data.study_break == "yes")
					$('#gap_reason').show();
				for (x in data) {
					$('#'+x).val(data[x]);
				}
				$('#image').attr('src', base_url+'upload/'+data.image_path);
				$('#signature').attr('src', base_url+'upload/'+data.sign_path);
				
				// return false;
				
			},
			error: function (error) {
				console.error(error);
			}
		});

	}
	function valueChanged() {
		if ($('#study_break').val() == "yes") {
			$("#gap_reason").show();
			$('#gap_reason_text').required = true;
		} else
			$("#gap_reason").hide();
	}
</script>





<script type="text/javascript">
	base_url = '<?= base_url() ?>'
	$(document).ready(function () {
		var myTable = $('#my-table').DataTable({
			"ajax": base_url + "Admin/notAdmitted",
			"table": "#my-table",
			
		});


		$('#delete-modal').on('show.bs.modal', function (e) {
			var studentID = $(e.relatedTarget).data('student-id');
			$(e.currentTarget).find('#delete_student_id').val(studentID);
		});


		$('#updateForm').on('submit', function (e) {
			e.preventDefault();
			// console.log('hello'); return false;
			id 		= $('#id').val();
			name 	= $('#name').val();
			course 	= $('#course').val();
			paid_amt =$('#paid_amt').val();


			spinnerOn();
			$.ajax({
				url: base_url + "Admin/update_student",
				type: "POST",
				data:  new FormData(this),
				dataType: 'json',
				contentType: false,
				cache: false,
				processData:false,
				processData: false,
				contentType: false,
				success: function (result) {
					console.log(result);
					if (result.class == "success") {
						spinnerOff();
						// feedback_msg(result, 1500);
						$('#smartwizard').smartWizard("next");
						$('#adm_succ').show();
						$('#s_name').text(name);
						$('#s_course').text(course);
						$('#pay_amt').text(paid_amt);
						$('#pay_receipt').attr('href', base_url+'Admin/receiptPDF/'+id);
						myTable.ajax.reload();

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

    <!-- Include SmartWizard JavaScript source -->
    <script type="text/javascript" src="<?= base_url() ?>assets/wizerd/js/jquery.smartWizard.min.js"></script>
    <script src=" <?= base_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script> 

    <script type="text/javascript">
        $(document).ready(function(){
        	// Toolbar extra buttons
        	var btnFinish = $('<button></button>').text('Finish')
        	                                 .addClass('btn btn-info')
        	                                 .on('click', function(){ alert('Finish Clicked'); });
        	var btnCancel = $('<button></button>').text('Cancel')
        	                                 .addClass('btn btn-danger')
        	                                 .on('click', function(){ $('#smartwizard').smartWizard("reset"); });

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
                   $("#prev-btn").addClass('disabled');
               }else if(stepPosition === 'final'){
                   // $("#prev-btn").addClass('disabled');	
                   $("#next-btn").addClass('disabled');
               }else{
                   $("#prev-btn").removeClass('disabled');
                   $("#next-btn").removeClass('disabled');
               }
               

            });


            $("#smartwizard").on("endReset", function() {
              $("#next-btn").removeClass('disabled');
            });

            


            // Smart Wizard
            setting =$('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect:'fade',
                    showStepURLhash: false,
                    toolbarSettings: {toolbarPosition: 'bottom',
                                      toolbarButtonPosition: 'end',
                                      // toolbarExtraButtons: [btnFinish, btnCancel]
                                    },

            });

            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                $("#next-btn").removeClass('disabled');
                return true;
            });

            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });

            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });
            
        });
    </script>