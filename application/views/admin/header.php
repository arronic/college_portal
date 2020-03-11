<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DigiCollege</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Font Awesome -->
	<?= link_tag('/assets/plugins/fontawesome-free/css/all.min.css') ?>
	<!-- Tempusdominus Bbootstrap 4 -->
	<?= link_tag('/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>
	<!-- iCheck -->
	<?= link_tag('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>
	<!-- JQVMap -->
	<?= link_tag('/assets/plugins/jqvmap/jqvmap.min.css') ?>
	<!-- Theme style -->
	<?= link_tag('/assets/dist/css/adminlte.min.css') ?>
	<!-- overlayScrollbars -->
	<?= link_tag('/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>
	<!-- Daterange picker -->
	<?= link_tag('/assets/plugins/daterangepicker/daterangepicker.css') ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<!-- summernote -->
	<?= link_tag('/assets/plugins/summernote/summernote-bs4.css') ?>
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/spinner.css">
  	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/spinner2.css">

  	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">

  	
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url().'admin' ?>" class="brand-link">
				<img src="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
				<span class="brand-text font-weight-light">College Portal</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<li class="nav-item">
							<a href="<?= base_url().'Admin/'?>" class="nav-link">
                                <i class="nav-icon fab fa-wpforms"></i>
								<p>
									Sell Form
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url().'Admin/sold_form'?>" class="nav-link">
                                <i class="nav-icon fab fa-wpforms"></i>
								<p>
									Sold Form List
								</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="<?= base_url().'Admin/filled_form'?>" class="nav-link">
								<i class="nav-icon fab fa-wpforms"></i>
								<p>
									Filled Form
								</p>
							</a>
                        </li>
						<!-- <li class="nav-item">
							<a href="<?= base_url().'Admin/fill_form'?>" class="nav-link">
								<i class="nav-icon fas fa-list"></i>
								<p>
									Fill Form
								</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="<?= base_url().'Admin/generate_form'?>" class="nav-link">
								<i class="nav-icon fas fa-key"></i>
								<p>
									Generate Form
								</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="<?= base_url().'Admin/admission_list'?>" class="nav-link">
								<i class="nav-icon fas fa-list"></i>
								<p>
									Admission List
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url().'Admin/enrolled_list'?>" class="nav-link">
								<i class="nav-icon far fa-list-alt"></i>
								<p>
									Enrolled List
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url().'Admin/paid_list'?>" class="nav-link">
								<i class="nav-icon fas fa-check-circle"></i>
								<p>
									Paid List
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url().'Admin/fee_structure'?>" class="nav-link">
								<i class="nav-icon fas fa-dollar-sign"></i>
								<p>
									Fee Structure
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url().'Admin/notice'?>" class="nav-link">
								<i class="nav-icon far fa-flag"></i>
								<p>
									Notice
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url()."login/logout"?>" class="nav-link">
								<!-- <i class="nav-icon fas fa-sign-out"></i> -->
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
