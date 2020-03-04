<?php include('header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Welcome</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">GP List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content" >
    	<div class="container-fluid">
		    <div class="row">
		        <!-- <div class="col"></div> -->
		        <div class= "col">
		            <div class="form-group">
		                <label>Select Year</label>
		                <select class="form-control" id="sel_year">
		                  <option value=''>Select Year</option>
		                      <option value="2020">2020</option>
		                      <option value="2021">2021</option>
		                      <option value="2022">2022</option>
		                      <option value="2023">2023</option>
		                      <option value="2024">2024</option>
		                      <option value="2025">2025</option>
		                      <option value="2026">2026</option>
		                      <option value="2027">2027</option>
		                      <option value="2028">2028</option>
		                </select>
		            </div>
		        </div>

		        
		        <div class="col"></div>
		    </div>
    
    		<div class="card p-3" style="display: none" id="payment_table">      
			    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
			      <thead>
			        <tr>
			          <th>Sl</th>
			          <th>Name of Student</th>
			          <th>Student Code</th>
			          <th>Course</th>
			          <th>Admission Date</th>
			          <th>Paid</th>
			          <th>Action</th>
			        </tr>
			      </thead>
			    </table>
			</div>
		</div>
	</section>
</div>

<?php include('script.php');?>
<?php include('footer.php');?>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>

<script>
  base_url = '<?= base_url() ?>';
  $('#sel_year').click(function(){
    year = $('#sel_year').val();
    console.log(year);
    if(year != ''){
      $('#payment_table').show(1000);
      var table_paid_list = $('#example').DataTable({
          'ajax' : base_url + 'Admin/fetch_paid_list/'+year,
          // 'order': [[1, 'asc']],
          'order': [],
          responsive : true,

          dom: "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>><'row'<'col-md-12'rt>><'row'<'col-md-6'i><'col-md-6'p>>",
          
          buttons: [
          	{extend: 'excel',
          		title: title('Paid List'),
          	   exportOptions: {columns: [ 0,1,2,3,5 ]},
          	   footer: true,

          	},
          	{extend: 'pdf',
          	   exportOptions: {columns: [ 0,1,2,3,5 ]}
          	}, 'copy','colvis'],
          // buttons.excel.exportOptions : {columns: [ 0, 1, 5 ]},
          
        });
      
    }
    function title(title){
        var d = new Date();
        var n = d.getDate()+'-'+d.getMonth()+'-'+d.getFullYear();
        return title+' '+ n;
    }
  });
</script>
<script>
	function print_pdf(id){
		window.open(base_url+"Admin/receiptPDF/"+id, "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=20,left=400,width=600,height=700");
	}
</script>