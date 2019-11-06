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

							<div class="row mb-3">
								<div class="col-11">
									<h3 class="title">Detail Ajuan</h3>
								</div>
								<div class="col-1">
									<a href="<?= base_url('admin/form/index');?>" class="text-secondary"><span
											class="fa fa-times" style="font-size: 20px"></span></a>
								</div>
							</div>
							<div>
								<table class="table table-bordered table-hover">
									<thead>
										<?php foreach ($test->result()  as $hmm) { ?>
										<tr>
											<th>
												<div class="row">
													<div class="col-5">
														<h6 class="card-title">Tanggal</h6>
													</div>
													<div class="col-7 mb-1">: <?= $hmm->tanggal;?></div>

													<div class="col-5">
														<h6 class="card-title">Unit Pekerjaan</h6>
													</div>
													<div class="col-7 mb-1">: <?= $hmm->unit_kerja;?></div>

													<div class="col-5">
														<h6 class="card-title">Jenis Pekerjaan</h6>
													</div>
													<div class="col-7 mb-1">: <?= $hmm->sub_unit;?></div>

													<div class="col-5">
														<h6 class="card-title">Hasil Pekerjaan</h6>
													</div>
													<div class="col-7 mb-1">: <?= $hmm->hasil;?></div>

													<div class="col-5">
														<h6 class="card-title">Alasan Dilemburkan</h6>
													</div>
													<div class="col-7 mb-1">: <?= $hmm->alasan;?></div>
												</div>
											</th>
										</tr>
										<?php } ?>
									</thead>
									<tbody>
										<?php foreach ($apa_yah->result() as $oh) { ?>
										<tr>
											<td>
												<?= $oh->nama_pegawai ?>
											</td>
										</tr>
										<?php } ?>
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
