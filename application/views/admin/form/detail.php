<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<style type="text/css">
		.previewsign {
			height: 129px;
		}

		.previewsign img {
			max-height: 100%;
		}

		.typed {
			height: 55px;
			margin: 0;
			padding: 0 3px;
			z-index: 90;
			cursor: default;

			font: 1.875em/50px "Journal", Georgia, Times, serif;
			font-size: 15px;
		}

	</style>
	<title>Form Ajuan</title>
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
							<h3 class="page-title">Detail data Pengajuan</h3>
							<div class="ml-auto text-right">
								<?php echo $brcm; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<!-- head -->
					<div class="card-header bg-light mb-4">
						<div class="mb-3">
							<a href="<?= base_url('admin/form/index');?>" class="text-secondary"><span
									class="fa fa-times" style="font-size: 20px"></span></a>
						</div>
						<div class="container mb-4">
							<div class="row">
								<img src="<?= base_url('assets/Logo.png') ?>" alt="Logo Lipi" width="106px"
									height="106px">
								<div>
									<h2>Pengajuan Kerja Lembur</h2>
									<h4>Kebun Raya Bogor</h4>
									<h3>Lembaga Ilmu Pengatahuan Indonesia</h3>
								</div>
							</div>
						</div>
					</div>
					<!-- end head -->
					<div class="card-body">
						<div class="container">
							<!-- detail ajuan -->
							<div class="preview">
								<div class="container ml-4 mt-4">
									<?php foreach ($test->result()  as $hmm) { ?>
									<div class="row">
										<div class="col-5">
											<h5>Tanggal</h5>
										</div>
										<div class="col-7 mb-1">: <?= $hmm->tanggal;?></div>

										<div class="col-5">
											<h5>Unit Pekerjaan</h5>
										</div>
										<div class="col-7 mb-1">: <?= $hmm->unit_kerja;?></div>

										<div class="col-5">
											<h5>Jenis Pekerjaan</h5>
										</div>
										<div class="col-7 mb-1">: <?= $hmm->sub_unit;?></div>

										<div class="col-5">
											<h5>Hasil Pekerjaan</h5>
										</div>
										<div class="col-7 mb-1">: <?= $hmm->hasil;?></div>

										<div class="col-5">
											<h5>Alasan Dilemburkan</h5>
										</div>
										<div class="col-7 mb-1">: <?= $hmm->alasan;?></div>

										<div class="col-5">
											<h5>Status Ajuan</h5>
										</div>
										<div class="col-7 mb-1">: <?php 
											if ($hmm->status == '1'){
												echo 'Proses';
											} elseif ($hmm->status == '2'){
												echo 'Diterima';
											} elseif ($hmm->status == '3'){
												echo 'Ditolak';
											} elseif ($hmm->status == '4'){
												echo 'Direvisi';
												}?>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							<!-- end detail -->
							<br>
							<br>
							<!-- pgw -->
							<div class="container">
								<div class="row">
									<table class="table">
										<thead>
											<tr class="row">
												<th class="col-1">
													<h6>#</h6>
												</th>
												<th class="col-11">
													<h6>Nama Pegawai</h6>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php 
										$index = 0; 
										foreach ($apa_yah->result() as $oh) : 
											$index++; ?>
											<tr class="row">
												<td class="col-1"><?= $index; ?></td>
												<td class="col-11">
													<?= $oh->nama_pegawai; ?>
													<div class="text-right">
														(<?= $oh->sub_unit; ?>)
													</div>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- end pgw -->
							<hr>
							<br />
							<!-- signature -->
							<div>
								<div class="row">

									<div class="col">
										<div class="text-center">
											<h6>Kepala Sub.Keuangan</h6>
											<div class="card">
												<div class="card-body">
													<!-- signature 1 -->
													<div>
														<?php foreach ($sign1->result() as $view) { ?>
														<div class="previewsign">
															<img src="<?= base_url();?><?= $view->img; ?>" alt="">
														</div>
														<div>
															<div class="typed"><?= $view->signname;?></div>
														</div>
														<?php }?>
													</div>
													<!-- end sign1 -->
												</div>
											</div>
										</div>
									</div>

									<div class="col">
										<div class="text-center">
											<h6>Pejabat Pembuat Komitmen</h6>
											<div class="card">
												<div class="card-body">
													<!-- signature2 -->
													<div>
														<?php foreach ($sign2->result() as $pre) { ?>
														<div class="previewsign">
															<img src="<?= base_url();?><?= $pre->img; ?>" alt="">
														</div>
														<div>
															<div class="typed"><?= $pre->signname;?></div>
														</div>
														<?php }?>
													</div>
													<!-- end sign2 -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end signature -->

					</div>
					<!-- card body -->
				</div>
				<!-- end card -->
				<?php $this->load->view('oprt/_partials/footer.php') ?>
			</div>
			<!-- end container fluid -->
		</div>
		<!-- end page wrapper -->
	</div>
	<!-- end main wrapper -->
	<?php $this->load->view('admin/_partials/js.php'); ?>
</body>

</html>
