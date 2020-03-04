<?php include('header.php');?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Notice List</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<button class="btn btn-primary" onclick="add_notice()"><i class="fas fa-pen"> New
								Notice</i></button>
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
							<th>Notice</th>
							<th>Date Time</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</section>
	<div div class="modal fade" id="notice-modal" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="admitModalLabel">Add New Noice</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="" id="notice-form">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Notice</label>
								<textarea name="notice" id="notice" class="form-control" rows="3"
									placeholder="Add Notice Text ..."></textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-primary float-right">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div div class="modal fade" id="edit-modal" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="admitModalLabel">Add New Noice</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="" id="edit-form">
						<div class="col-sm-12">
							<input type="hidden" name="id" id="id">
							<div class="form-group">
								<label>Notice</label>
								<textarea name="notice" id="edit_notice" class="form-control" rows="3"
									placeholder="Add Notice Text ..."></textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-primary float-right">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
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
		</div>
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
		console.log(base_url);
		$(document).ready(function () {
			myTable = $("#my-table").DataTable({
				"ajax": base_url + "Admin/get_notice_list",
				'order': [],
				responsive: true,
				dom: "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>><'row'<'col-md-12'rt>><'row'<'col-md-6'i><'col-md-6'p>>",
				buttons: ['copy', 'excel', 'pdf', 'colvis'],
			});
		});
		$('#notice-form').on('submit', function (e) {
			e.preventDefault();
			notice = $('#notice').val();
			spinnerOn();
			$.ajax({
				url: base_url + "Admin/add_notice",
				type: "POST",
				data: new FormData(this),
				dataType: 'json',
				contentType: false,
				cache: false,
				processData: false,
				processData: false,
				success: function (result) {
					if (result.class == "success") {
						$('#notice-modal').modal('toggle');
						spinnerOff();
                        feedback_msg(result, 5000);
						myTable.ajax.reload();
					}
				},
				error: function (error) {
					console.log(error);
				}
			});
		});
		$('#edit-form').on('submit', function (e) {
			e.preventDefault();
			id = $('#id').val()
			notice = $('#notice').val();
			spinnerOn();
			$.ajax({
				url: base_url + "Admin/update_notice",
				type: "POST",
				data: new FormData(this),
				dataType: 'json',
				contentType: false,
				cache: false,
				processData: false,
				processData: false,
				success: function (result) {
					if (result.class == "success") {
						$('#edit-modal').modal('toggle');
						spinnerOff();
                        feedback_msg(result, 5000);
						myTable.ajax.reload();
					}
				},
				error: function (error) {
					console.log(error);
				}
			});
		});

	</script>
	<script>
		function add_notice() {
			$('#notice-modal').modal('toggle');
			$('#notice').val('');
		}

		function edit_notice(id) {
			$('#edit-modal').modal('toggle');
			$.ajax({
				type: "GET",
				url: base_url + "Admin/get_notice_detail/" + id,
				dataType: 'json',
				cache: false,
				success: function (data) {
					$('#edit_notice').val(data.notice);
					$('#id').val(id);
				},
				error: function (error) {
					console.error(error);
				}
			});
		}

		function delete_notice(id) {
			$('#modalConfirm').modal('toggle');
			$('#yes_del').unbind().click(function () {
				spinnerOn();
				$.ajax({
					type: "POST",
					url: base_url + "Admin/delete_notice",
					data: {
						id: id
					},
					dataType: 'json',
					success: function (data) {                     
						if (data.class == "success") {
							spinnerOff();
							feedback_msg(data, 5000);
							$('#modalConfirm').modal('toggle');
							myTable.ajax.reload();
						} else {}
					},
					error: function error(data) {
						console.log(data);
					}
				});
			});
		}
        function change_status(id){
            $.ajax({
					type: "POST",
					url: base_url + "Admin/change_status",
					data: {
						id: id
					},
					dataType: 'json',
					success: function (data) { 
						if (data.class == "success") {
							spinnerOff();
							feedback_msg(data, 5000);
							myTable.ajax.reload();
						} else {}
					},
					error: function error(data) {
						console.log(data);
					}
				});
			}

	</script>
