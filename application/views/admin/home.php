<link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css') ?>">
<?php include('header.php') ?>


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
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Enrollment Form</li> -->

                    <button class="btn btn-primary" onclick="enrol_new()">Enroll New</button>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-8">
                <section class="content">
                    <div class="container-fluid">
                        <div id="success_info"></div>
                        <div class="card card-primary" id="enrollment-form">
                            <div class="card-header">
                                <h3 class="card-title float-left">New Enrollment Form</h3>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <!-- <form role="form"> -->
                            <?= form_open('Admin/store_enrollment', ['id'=>'genKey_form'] ) ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" required> 
                                    </div>
                                    <div class="form-group">
                                        <label>Course</label>
                                        <select class="form-control select2" id="course" name="course" required>
                                            <option value="">Select a Course </option>
                                            <?php foreach ($courses as $course) { ?>
                                                <option value="<?=$course->course_name?>"><?=$course->course_name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="year">Year</label>
                                        <input type="text" class="form-control" name="date" id="today" value="<?= date('Y/m/d') ?>" disabled>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        <div class="input-append date" id="dp1" data-date="<?= date('d-m-Y') ?>" data-datepicker-format="dd-mm-yyyy">
                                            <input class="span2 form-control" size="16" type="text" name="date" id="today" value="<?= date('d-m-Y') ?>">
                                            <span class="add-on"><i class="icon-th"></i></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" id="generate_btn" class="btn btn-primary float-right">Generate Admission Form</button>
                                    <button type="reset" class="btn btn-warning float-right" style="margin-right: 10px">Reset</button>
                                </div>
                            <?= form_close() ?>
                        </div>
                        
                    </div>
                </section> 
        </div>
        <div class="col"></div>
    </div>
    <!-- modal starts -->
    <style>
        .borderless td, .borderless th {
            border: none;
        }
    </style>
    <div class="modal fade" id="modalConfirm">
      <div class="modal-dialog modal-s">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Are you sure to generate the form ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Form Details</h5>
            <table class="table table-hover borderless">
                <tr>
                    <th>Name</th>
                    <td id="st_name"> gdsf  gdsgf</td>
                </tr>
                <tr>
                    <th>Course</th>
                    <td id="st_course">dsfg dsfg </td>
                </tr>
            </table>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-success" id="yes_submit">Yes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
	
</div>



<?php include('script.php')?>
<?php include('footer.php') ?>

<script src=" <?= base_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src=" <?= base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>


<script>
    $(function () {
      $('.select2').select2();

      $('#dp1').datepicker({
              format: 'dd-mm-yyyy',
              autoHide: false
          });
  })
</script>

<script>
    function enrol_new(){
        $('#success_info').empty();
        $('#genKey_form')[0].reset();
        $('#enrollment-form').show('slow');
    }
</script>

<script>
    $('#genKey_form').validate({
      rules: {
        name: {
          required: true,
        },
        course: {
          required: true,
        },
        date: {
          required: true,
        },
        
      },

      messages: {
        name: "Please enter a Name",
        course: "Plese Select a Course Name",
        date: "Please Select a Valid Date"
        
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
    var base_url = '<?= base_url(); ?>'

    $('#genKey_form').submit(function(e){
        e.preventDefault();
        var student_name = $('#name').val();
        var student_course = $('#course').val();
        var date = $('#today').val();

        if(student_name != '' && student_course != '' && date != ''){
            $('#modalConfirm').modal('toggle');
            $('#st_name').html(student_name);
            $('#st_course').html(student_course);
            $('#yes_submit').unbind().click(function(){
                // console.log('hello')
                spinnerOn();
                var uniquekey = makeid(student_name,8);
                $.ajax({
                        type: "POST",
                        url: base_url + "Admin/store_enrollment", 
                        data: {student_name: student_name, student_course: student_course, unique_code: uniquekey, date: date},
                        dataType: 'json',
                        cache:false,
                        success: function(data){ 
                            // console.log(data); return false;                       
                                if (data.class == "success") {
                                    spinnerOff();
                                    feedback_msg(data, 10000);
                                    $('#modalConfirm').modal('toggle');
                                    $('#enrollment-form').hide();
                                    $('#success_info').append(`<div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Enrollment Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>Student form ohas been successfully created</P>
                                            <h4 class="text-center">Student Unique Id: `+uniquekey+`</h4>
                                            <a href="`+base_url+"admin/print_pdf/"+uniquekey+`" class="btn btn-primary float-right" target="_bank">Print Form</a>
                                        </div>
                                        </div>`).slideDown();
                                // $('#generate_btn').preventDefaultop('disabled', true);
                                
                                }else{
                                }
                            },
                        error: 
                            function error(data) {
                                console.log(data);
                            }
                        });          




            }); 
        }
        else{
            console.log('fill it first')
        }
        return false;
        
        
        
    });
});
function makeid(characters,length) {
   var result = '';
   var d = new Date();
   characters=characters+"ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"+d.getTime();
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result.replace(/ /g,'');
   // return result;
}
</script>

