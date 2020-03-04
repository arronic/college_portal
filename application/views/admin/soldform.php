<?php include('header.php') ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Sold Form</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Sold Form</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="card p-3">
				<table class="table table-hover" id="my-table" width="100%">
					<thead>
						<tr>
							<th>Sl no.</th>
							<th>Date of issue</th>
							<th>Name</th>
							<th>Course</th>
                            <th>Code</th>
                            <th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</section>

	<div class="modal fade" id="modalConfirm">
	  <div class="modal-dialog modal-s">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Confirmation</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Are you sure to delete ?</p>
	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
	        <button type="button" class="btn btn-danger" id="yes_del">Yes</button>
	      </div>
	    </div>
	    <!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->


</div>
<?php include('script.php') ?>
<?php include('footer.php') ?>

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
    $(document).ready(function(){
		
		myTable = $("#my-table").DataTable({
		      "ajax": base_url + "Admin/getSoldForms",
		      
		      
		      'order': [],
		      responsive : true,
		      dom: "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>><'row'<'col-md-12'rt>><'row'<'col-md-6'i><'col-md-6'p>>",
		      
		      buttons: ['copy', 'excel', 'pdf','colvis'],
		      
		    });
    });
</script>

<script>
	function print_pdf(key){
		window.open(base_url+"Admin/print_pdf/"+key, "_blank", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=20,left=400,width=600,height=700");
	}
	function delete_id(key){
		$('#modalConfirm').modal('toggle');
		$('#yes_del').unbind().click(function(){
			spinnerOn();
			$.ajax({
			        type: "POST",
			        url: base_url + "Admin/del_sold_form", 
			        data: {key: key},
			        dataType: 'json',
			        // cache:false,
			        success: function(data){ 
			            // console.log(data); return false;                       
			                if (data.class == "success") {
			                    spinnerOff();
			                    feedback_msg(data, 5000);
			                    $('#modalConfirm').modal('toggle');
			                    myTable.ajax.reload();
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
		// return false;
	}
</script>
