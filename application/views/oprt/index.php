<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('oprt/_partials/head.php') ?>
	<title>Ajuan Lembur</title>
</head>

<body>
	<?php $this->load->view('oprt/_partials/preload.php') ?>
	<div id="main-wrapper">
		<?php $this->load->view('oprt/_partials/nav.php') ?>
		<?php $this->load->view('oprt/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="">
					<div class="row">
						<div class="col-12 d-flex no-block align-items-center">
							<h3 class="page-title">Dashboard</h3>
							<div class="ml-auto text-right">
								<?php echo $brcm; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="card mb-3">
					<div class="card-body">
						<h1 class="card-title">Selamat Datang</h1>
						<h3 class="card-subtitle"><?php echo $this->session->userdata('username'); ?></h3>
					</div>
				</div>
			</div>
			<?php $this->load->view('oprt/_partials/footer.php') ?>
		</div>
	</div>
	</div>

	<?php $this->load->view('oprt/_partials/js.php'); ?>
</body>

</html>
