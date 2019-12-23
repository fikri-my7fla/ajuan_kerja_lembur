<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('oprt/_partials/head.php') ?>
	<title>Form Ajuan</title>
</head>

<body onselectstart="return false">
	<?php $this->load->view('oprt/_partials/preload.php') ?>
	<div id="main-wrapper">
		<?php $this->load->view('oprt/_partials/nav.php') ?>
		<?php $this->load->view('oprt/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-md-12 d-flex no-block align-items-center">
						<h3>Detail</h3>
						<div class="ml-auto">
							<?php echo $brcm; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid">
				<div class="card">
					<!-- head -->
					<div class="card-header bg-light mb-4">
						<div class="mb-3">
							<a href="<?= base_url('pimpinan/form/index');?>" class="text-secondary"><span
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
							<?php foreach ($test->result()  as $hmm) { ?>
							<div class="">
								<div class="container ml-4 mt-4">
									<div class="row">
										<div class="col-sm-6 col-md-5">
											<h5>Tanggal</h5>
										</div>
										<div class="col-sm-6 col-md-7 mb-1">: <?= $hmm->tanggal;?></div>

										<div class="col-sm-6 col-md-5">
											<h5>Unit Pekerjaan</h5>
										</div>
										<div class="col-sm-6 col-md-7 mb-1">: <?= $hmm->unit_kerja;?></div>

										<div class="col-sm-6 col-md-5 mb-1">
											<h5>Jenis Pekerjaan</h5>
										</div>
										<div class="col-sm-6 col-md-7 mb-1 mb-1">: <?= $hmm->sub_unit;?></div>

										<div class="col-sm-6 col-md-5 mb-1">
											<h5>Hasil Pekerjaan</h5>
										</div>
										<div class="col-sm-6 col-md-7 mb-1 mb-1">: <?= $hmm->hasil;?></div>

										<div class="col-sm-6 col-md-5 mb-1">
											<h5>Alasan Dilemburkan</h5>
										</div>
										<div class="col-sm-6 col-md-7 mb-1 mb-1">: <?= $hmm->alasan;?></div>

										<div class="col-sm-6 col-md-5 mb-1">
											<h5>Status Ajuan</h5>
										</div>
										<div class="col-sm-6 col-md-7 mb-1 mb-1">
											: <?php 
											if ($hmm->status == '1'){
												echo 'Proses';
											} elseif ($hmm->status == '2'){
												echo 'Diterima';
											} elseif ($hmm->status == '3'){
												echo 'Ditolak';
											} elseif ($hmm->status == '4'){
												echo 'Direvisi'; 
											}?>

											<div class="ml-auto">
												<h6 class="card-subtitle font-italic mt-2">Comment:
													<?= $hmm->description?>
												</h6>
											</div>
										</div>
										<?php if ($hmm->status != '2') { ?>
										<div class="col-sm-6 col-md-7 mb-1 mb-1">
											<div class="dropdown">
												<button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
													id="prosesStatus" data-toggle="dropdown" aria-haspopup="true"
													aria-expanded="false">
													Status
												</button>
												<div class="dropdown-menu" aria-labelledby="prosesStatus">
													<a class="dropdown-item sttsTerima" data-toggle="modal"
														href="">Diterima</a>
													<a class="dropdown-item statusFormtlk" data-toggle="modal"
														href="#">Ditolak</a>
													<a class="dropdown-item statusFormrev" data-toggle="modal"
														href="#">Direvisi</a>
												</div>
											</div>
										</div>
										<?php }?>
									</div>
								</div>
							</div>
							<!-- end detail -->
							<br>
							<!-- status -->
							<div class="row">


							</div>
							<?php } ?>
							<!-- end stts -->
							<br>
							<!-- pgw -->
							<div class="container">
								<div>
									<table class="table table-hover table-bordered">
										<thead>
											<tr>
												<th>
													<h6>#</h6>
												</th>
												<th>
													<h6>Nama Pegawai</h6>
												</th>
											</tr>
										</thead>
										<tbody>
											<?php 
										$index = 0; 
										foreach ($apa_yah->result() as $oh) : 
											$index++; ?>
											<tr>
												<td><?= $index; ?></td>
												<td>
													<?= $oh->nama_pegawai; ?>(<?= $oh->sub_unit; ?>)

												</td>
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
											<h6>Pejabat Pembuat Komitmen</h6>
											<div class="card">
												<div class="card-body">
													<!-- signature 1 -->
													<div>
														<?php foreach ($sign1->result() as $view) { ?>
														<div class="previewsign">
															<img src="<?= $view->sign; ?>" />
														</div>
														<div>
															<div class="typed"><?= $view->nama_pegawai;?></div>
														</div>
														<?php }?>
													</div>
													<!-- end sign1 -->
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
							<!-- end signature -->
						</div>
						<!-- end container -->
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

	<!-- modal status -->
	<?php foreach ($test->result() as $prss) { ?>
	<div class="modal fade" id="sttsTerima" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<form action="<?= base_url('pimpinan/form/proses2')?>" method="post">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Diterima</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php foreach ($signature->result() as $sign) { ?>
					<div class="text-center">
						<img src="<?= $sign->sign; ?>" />
						<input type="hidden" name="sign_id" id="sign_id" value="<?= $sign->id_sign?>">
						<input type="hidden" name="form_id" id="form_id" value="<?= $prss->id_form_ajuan;?>">
						<div>
							<div class="typed"><?= $sign->nama_pegawai;?></div>
						</div>
					</div>
					<?php }?>
					<div class="modal-footer">
						<div class="form-group">
							<?php foreach ($ajuan->result() as $stts) { ?>
							<input type="hidden" name="nip_pgwii[]" id="nip_pgwii" value="<?= $stts->nip_pegawai; ?>">
							<?php } ?>
							<input type="hidden" name="stts_id" id="stts_id" value="<?= $prss->id_form_ajuan;?>">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" id="btn_save" class="btn btn-primary">Terima</button>
						</div>
						<div class="form-group">
							<?php echo $this->recaptcha->getWidget(); ?>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php } ?>

	<!-- ditolak -->
	<?php foreach ($test->result() as $prss) { ?>
	<form action="<?= base_url('pimpinan/form/proses3')?>" method="post">
		<div class="modal fade" id="statusFormtlk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="tlk">Ditolak</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
							<label for="">Description</label>
							<input type="text" class="form-control" placeholder="Alasan Penolakan Ajuan"
								name="descr_tlk" id="descr_tlk" value="<?= $prss->description;?>">
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="stts_tlk" id="stts_tlk" value="<?= $prss->id_form_ajuan;?>">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
						<button type="submit" id="btn_savetlk" class="btn btn-primary">Y</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php } ?>

	<?php foreach ($test->result() as $prss) { ?>
	<form action="<?= base_url('pimpinan/form/proses4')?>" method="post">
		<div class="modal fade" id="statusFormrev" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="rev">Direvisi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
							<label for="">Description</label>
							<input type="text" class="form-control" placeholder="Alasan Direvisi" name="descr_rev"
								id="descr_rev" value="<?= $prss->description;?>">
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="stts_rev" id="stts_rev" value="<?= $prss->id_form_ajuan;?>">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
						<button type="submit" id="btn_saverev" class="btn btn-primary">Y</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php } ?>


	<?php $this->load->view('oprt/_partials/js.php'); ?>
	<?= $this->recaptcha->getScriptTag();?>

	<script type="text/javascript">
		$(document).ready(function () {
			// terima
			$('.sttsTerima').on('click', function () {
				$('#sttsTerima').modal('show');
			})
			$('#btn_save').on('click', function () {
				$('#statusForm').modal('hide');
			})
			// tolak
			$('.statusFormtlk').on('click', function () {
				$('#statusFormtlk').modal('show');
			})
			$('#btn_savetlk').on('click', function () {
				$('#statusFormtlk').modal('hide');
			})
			// revisi
			$('.statusFormrev').on('click', function () {
				$('#statusFormrev').modal('show');
			})
			$('#btn_saverev').on('click', function () {
				$('#statusFormrev').modal('hide');
			})
		})

	</script>

</body>

</html>
