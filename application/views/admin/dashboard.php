<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<title>Dashboard Admin</title>
</head>

<body>
	<?php $this->load->view('admin/_partials/preload.php'); ?>
	<div id="main-wrapper">
		<?php $this->load->view('admin/_partials/nav.php'); ?>
		<?php $this->load->view('admin/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<h3 class="page-title">Dashboard</h3>
						<div class="ml-auto text-right">
							<?php echo $test; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">

				<!-- Sales Cards  -->
				<!-- ============================================================== -->
				<div class="row">
					<!-- Column -->
					<div class="col-md-3 col-sm-3 col-lg-4 col-xlg-2">
						<a href="#">
							<div class="card card-hover">
								<div class="box bg-cyan text-center">
									<h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
									<h6 class="text-white">Dashboard</h6>
								</div>
							</div>
						</a>
					</div>
					<!-- Column -->
					<div class="col-md-3 col-sm-3 col-lg-4 col-xlg-2">
						<a href="<?= base_url('admin/subunit/index'); ?>">
							<div class="card card-hover">
								<div class="box bg-success text-center">
									<h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
									<h6 class="text-white">Jenis Pekerjaan</h6>
								</div>
							</div>
						</a>
					</div>
					<!-- Column -->
					<div class="col-md-3 col-sm-3 col-lg-4 col-xlg-2">
						<a href="<?= base_url('admin/pegawai/index'); ?>">
							<div class="card card-hover">
								<div class="box bg-danger text-center">
									<h1 class="font-light text-white"><i class="mdi mdi-face"></i></h1>
									<h6 class="text-white">Data Pegawai</h6>
								</div>
							</div>
						</a>
					</div>
					<!-- Column -->
					<div class="col-md-3 col-sm-3 col-lg-4 col-xlg-2">
						<div class="card card-hover bg-primary">
							<a class="text-light" href="<?= base_url('admin/form/index'); ?>">
								<div class="box text-center">
									<h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
									<h6 class="text-light">Ajuan Lembur</h6>
								</div>
							</a>
						</div>
					</div>

					<!-- Column -->
					<div class="col-md-3 col-sm-3 col-lg-4 col-xlg-2">
						<a href="<?= base_url('admin/absen/index'); ?>">
							<div class="card card-hover">
								<div class="box bg-warning text-center">
									<h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
									<h6 class="text-white">Absen Lembur</h6>
								</div>
							</div>
						</a>
					</div>
					<!-- Column -->
					<div class="col-md-3 col-sm-3 col-lg-4 col-xlg-2">
						<a href="<?= base_url('admin/honor/index');?>">
							<div class="card card-hover">
								<div class="box bg-info text-center">
									<h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
									<h6 class="text-white">Daftar Honor</h6>
								</div>
							</div>
						</a>
					</div>
					<!-- Column -->
				</div>
				<!-- ============================================================== -->
				<!-- Sales chart -->

			</div>
			<?php $this->load->view('admin/_partials/footer.php');?>
		</div>
	</div>
	<?php $this->load->view('admin/_partials/js.php'); ?>
	<script>


	</script>
</body>

</html>
