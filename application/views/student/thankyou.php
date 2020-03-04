<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= link_tag('/assets/css/bootstrap.css') ?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<title>Thank you</title>
</head>

<body>
	<div class="container mt-3">
		<div class="card">
			<div class="card-header">
				Confirmation
			</div>
			<div class="card-body">
				<p class="text-center">
					Your form is submitted successfully. Kiindly print out a copy for future reference.
					Thank you.
				</p>
				<a href="<?= base_url()?>" class="btn btn-primary float-left">Home</a>
				<a target="_blank" href="<?= base_url('/student/myform/'.$code)?>" class="btn btn-primary float-right">print pdf</a>

			</div>
		</div>
	</div>
</body>

</html>
