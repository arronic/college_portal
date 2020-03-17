<?php include('header.php');?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Paid List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Paid List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content" >
    	<div class="container-fluid">
		    <div class="row">
		        <div class= "col-md-3">
		            <div class="form-group">
		                <label>Select Year</label>
		                <select class="form-control" id="sel_year">
		                  <option value=''>Select Session</option>
		                      <option value="2020-2021">2020-21</option>
		                      <option value="2021-2022">2021-22</option>
		                      <option value="2022-2023">2022-23</option>
		                      <option value="2023-2024">2023-24</option>
		                      <option value="2024-2025">2024-25</option>
		                      <option value="2025-2026">2025-26</option>
		                      <option value="2026-2027">2026-27</option>
		                      <option value="2027-2028">2027-28</option>
		                      <option value="2028-2029">2028-29</option>
		                </select>
		            </div>
		        </div>
		    </div>
    		<div class="card p-3" style="display: none" id="payment_table">      
			    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
			      <thead>
			        <tr>
			          <th>Sl</th>
			          <th>Name of Student</th>
			          <th>Student Code</th>
			          <th>Course</th>
					  <th>Course Details</th>
					  <th>Category</th>
			          <th>Admission Date</th>
			          <th>Amount Paid</th>
					  <th>Donation Paid</th>
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
  $('#sel_year').change(function(){
    session = $('#sel_year').val();
    if(session != ''){
		if(typeof table_paid === 'undefined'){
			$('#payment_table').show(1000);
			table_paid = $('#example').DataTable({
				'ajax' : base_url + 'Admin/fetch_paid_list/'+session,
				'responsive' : true,
				dom: "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>><'row'<'col-md-12'rt>><'row'<'col-md-6'i><'col-md-6'p>>",
          		buttons: [
					{
						extend: 'excel',
						title: table_title('Paid List'),
						exportOptions: {columns: [ 0,1,2,3,5 ]},
						footer: true,
					},
					{
						extend: 'pdf',
						title: table_title('Paid List'),
						exportOptions: {columns: [ 0,1,2,3,5 ]}
					},
					'copy','colvis'
				],
			});
		}
		else{
			table_paid.ajax.url(base_url + 'Admin/fetch_paid_list/'+session).load();
		}
    }
  });
</script>
<script>
	function print_pdf(code){
		code = btoa_return(code);
		window.open(base_url+"Admin/receiptPDF/"+code, "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=20,left=400,width=600,height=700");
	}
</script>