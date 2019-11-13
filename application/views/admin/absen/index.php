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
			<div class="">
					<div class="row">
						<div class="col-12 d-flex no-block align-items-center">
							<h3 class="page-title">Absen Lembur</h3>
							<div class="ml-auto text-right">
								<?php echo $brcm; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="container">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Pegawai</th>
											<th>Jam datang</th>
											<th>Jam Pulang</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$index=0; 
										foreach ($absen->result() as $ok) { 
											$index++;
											?>
										<tr>
											<td><?php echo $index; ?></td>
											<td><?php echo $ok->nama_pegawai;?></td>
											<td><?php echo $ok->jam_datang; ?></td>
											<td><?php echo $ok->jam_pulang; ?></td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
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
