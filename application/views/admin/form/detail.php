<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<title>Form Ajuan</title>
</head>

<body>
	<?php $this->load->view('admin/_partials/preload.php') ?>
	<div id="main-wrapper">
		<?php $this->load->view('admin/_partials/nav.php') ?>
		<?php $this->load->view('admin/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="card">
					<div class="card-body">
						<br />
						<div class="container">

							<div class="row">
								<div class="col-md-11">
									<h5 class="title">Detail Ajuan</h5>
								</div>
							</div>
							<div>
								<table class="table table-bordered">
									<tbody>
										<tr>
											<th>Tanggal :</th>
                                            <th>Unit Pekerjaan :</th>
                                            <th>Jenis Pekerjaan :</th>
                                            <th>Hasil :</th>
                                            <th>Alasan :</th>
										</tr>
										<tr>
											<th>
												test
											</th>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- end card body -->
				</div>
				<!-- end card -->
				<?php $this->load->view('admin/_partials/footer.php') ?>
			</div>
			<!-- end container fluid -->
		</div>
		<!-- end page wrapper -->
	</div>
	<!-- end main wrapper -->
	<?php $this->load->view('admin/_partials/js.php'); ?>
</body>

</html>
