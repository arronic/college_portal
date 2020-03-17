<?php include('header.php');?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
<style>
span.no-show{
    display: none;
}
span.show-ellipsis:after{
    content: "...";
}
</style>
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
						<li class="breadcrumb-item active">Enrolled List</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="card p-3">
				<table class="table table-hover table-responsive" id="my-table" width="100%">
					<thead>
						<tr>
							<th>Sl no.</th>
							<th>Name</th>
							<th>Father's Name</th>
							<th>Mother's Name</th>
							<th>DOB</th>
							<th>Gender <br> Cast</th>
							<th>Stream</th>
							<th>Course</th>
							<th>Category</th>
							<th>BPL document no.</th>
							<th>Address</th>
							<th>Mobile no.</th>
							<th>Paper Details</th>
							<th>Remarks</th>
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
<script type="text/javascript">
	base_url = '<?= base_url() ?>'
	$(document).ready(function () {
		var myTable = $('#my-table').DataTable({
			"ajax": base_url + "Admin/enrolled",
			'columnDefs': [
					{
						'targets': 10,
						'render': function(data, type, row){
							if (type === 'display' && data != null) {
								data = data.replace(/<(?:.|\\n)*?>/gm, '');
									if(data.length > 20) {
											return '<span class=\"show-ellipsis\">' + data.substr(0, 20) + '</span><span class=\"no-show\">' + data.substr(20) + '</span>';
									}else{
										return data;
									}
							}else{
								return data;
								}
							},
					}
				],
			'order': [],
			dom: "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>><'row'<'col-md-12'rt>><'row'<'col-md-6'i><'col-md-6'p>>",
			buttons: [
				{
					extend: 'excel',
					title: table_title('Enrolled List'),
					exportOptions: {columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]},
					footer: true,
				},
				{
					extend: 'pdf',
					title: table_title('Enrolled List'),
					exportOptions: {columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]}
				},
				'copy','colvis'
			],
			responsive : true,
		});
	});
</script>