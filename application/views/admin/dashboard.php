<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<style>
		#tengah-gan {
			position: relative;
			height: 204px;
			margin: 6rem auto 8.1rem auto;
			width: 100%;
		}

	</style>
	<title>Dashboard Admin</title>
</head>

<body>
	<!-- < ?php $this->load->view('admin/_partials/preload.php') ?> -->
	<div id="main-wrapper">
		<?php $this->load->view('admin/_partials/nav.php') ?>
		<?php $this->load->view('admin/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="">
					<div class="row">
						<div class="col-12 d-flex no-block align-items-center">
							<h3 class="page-title">Dashboard</h3>
							<div class="ml-auto text-right">
								<?php echo $test; ?>
							</div>
						</div>
					</div>
				</div>

				<div class="card mb-auto">
					<div class="card-body">
						<div id="tengah-gan" class="text-center">
							<h2 class="card-title">SELAMAT DATANG</h2>
							<div>
								<h2 class="card-subtitle">anda berhasil login sebagai <h2 class="font-italic">Admin</h2>
								</h2>
							</div>
							<br>
							<h6 class="card-text">Username Anda Adalah
								<?php echo $this->session->userdata('username'); ?></h6 class="card-text">
							<br /><br />
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('admin/_partials/footer.php');?>
			<?php $this->load->view('admin/_partials/js.php'); ?>
		</div>
	</div>
</body>

</html>
