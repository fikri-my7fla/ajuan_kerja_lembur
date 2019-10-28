<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<title>Absen Lembur</title>
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
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>#</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jam datang</th>
                                        <th>Jam Pulang</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</div>
	</div>

	<?php $this->load->view('admin/_partials/js.php'); ?>
</body>

</html>
