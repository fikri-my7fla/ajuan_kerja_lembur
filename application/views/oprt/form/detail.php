<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('oprt/_partials/head.php') ?>
	<!-- <link rel="stylesheet" href="< ?= base_url('assets/jquery/sign/css/example.css');?>"> -->
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

<body onselectstart="return false">
	<?php $this->load->view('oprt/_partials/preload.php') ?>
	<div id="main-wrapper">
		<?php $this->load->view('oprt/_partials/nav.php') ?>
		<?php $this->load->view('oprt/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="">
					<div class="row">
						<div class="col-12 d-flex no-block align-items-center">
							<h3 class="page-title">Detail Pengajuan</h3>
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
										<div class="col-7 mb-1">
											:
											<?php 
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
								</div>
							</div>
							<!-- end detail -->
							<br>
							<!-- status -->
							<div class="row">
								<div class="form-group form-inline">
									<form action="<?= site_url('pimpinan/form/proses2') ?>" method="post">
										<div>
											<?php foreach ($ajuan->result() as $why) { ?>
											<input type="hidden" name="ajuan_id[]" value="<?= $why->id_ajuan_lembur ?>">
											<?php } ?>
											<input type="hidden" name="id_form_ajuan"
												value="<?= $hmm->id_form_ajuan;?>">
											<?php if ($hmm->status == "2") {
													echo '<button id="buttondss" class="btn btn-success btn-sm col" type="" disabled="disabled">
													<span class="mdi mdi-check"></span>
													Diterima</button>';
												} else {
													echo '<button id="buttondss" class="btn btn-success btn-sm col" type="submit">
													<span class="mdi mdi-check"></span>
													Diterima</button>';
												}
											?>
										</div>
									</form>
								</div>
								<div class="form-group form-inline">
									<form action="<?= site_url('pimpinan/form/proses3') ?>" method="post">
										<div>
											<input type="hidden" name="id_form_ajuan"
												value="<?= $hmm->id_form_ajuan;?>">
											<?php if ($hmm->status == "3") {
													echo '<button id="buttondss1" class="btn btn-danger btn-sm col" type="" disabled="disabled">
													<span class="mdi mdi-alert-outline"></span>
													Ditolak</button>';
												} else {
													echo '<button id="buttondss1" class="btn btn-danger btn-sm col" type="submit">
													<span class="mdi mdi-alert-outline"></span>
													Ditolak</button>';
												}
											?>

										</div>
									</form>
								</div>
								<div class="form-group form-inline">
									<form action="<?= site_url('pimpinan/form/proses4') ?>" method="post">
										<div>
											<input type="hidden" name="id_form_ajuan"
												value="<?= $hmm->id_form_ajuan;?>">
												<?php if ($hmm->status == "4") {
													echo '<button id="buttondss2" class="btn btn-info btn-sm col" type="" disabled="disabled">
													<span class="mdi mdi-sync"></span>
													Direvisi</button>';
												} else {
													echo '<button id="buttondss2" class="btn btn-info btn-sm col" type="submit">
													<span class="mdi mdi-sync"></span>
													Direvisi</button>';
												}
											?>
										</div>
									</form>
								</div>
							</div>
							<?php } ?>
							<!-- end stts -->
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
											<?php if($sign1 !== false && $sign1->num_rows() > 0){
												
											} else {
												echo "<button class='btn btn-secondary btn-sm signbtn' type='button'
												id='sbnt1'>signature</button>";
											}?>

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
											<?php if($sign2 !== false && $sign2->num_rows() > 0){
												
											} else {
												echo "<button class='btn btn-secondary btn-sm signbtn' type='button'
												id='sbnt2'>signature</button>";
											}?>
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

	<!-- modal 1 -->
	<div class="modal fade" id="sign-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="" method="post" id="signature-pad">
			<!-- modal dialog -->
			<div class="modal-dialog">
				<!-- modal contentp -->
				<div class="modal-content" id="signature-pad">

					<!-- modal header -->
					<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-pencil"></i> Add Signature</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<!-- end modal header -->

					<!-- modal body -->
					<div class="modal-body">
						<div id="signature-pad" class="signature-pad">
							<div class="signature-pad--body">
								<canvas width="570" height="318"></canvas>
							</div>
							<!--Signature Values-->
							<div class="form-group">
								<label for="">Nama :</label>
								<input type="text" class="form-control" name="signname" id="signname" value="" required>
							</div>
							<input type="hidden" id="rowno" name="rowno" value="<?php echo rand();?>">
							<?php foreach ($test->result()  as $frmmm) { ?>
							<input type="hidden" id="form_id" name="form_id" value="<?= $frmmm->id_form_ajuan?>">
							<?php } ?>
							<input type="hidden" id="append" name="append" value="">
						</div>
					</div>
					<!-- end body -->

					<!-- footerr modal -->
					<div class="modal-footer">
						<div class="signature-pad--footer">
							<div class="description">Sign above</div>
							<div class="signature-pad--actions">
								<div>
									<button type="button" id="save2" class="button" data-action="save">
										<!-- <i class="fa fa-check"></i> -->
										Save</button>
									<button type="button" class="button" data-action="clear">Clear</button>
									<button type="button" class="button" data-action="undo">Undo</button>
								</div>
							</div>
						</div>
					</div>
					<!-- end footer modal -->

				</div>
				<!-- end modal-content -->
			</div>
			<!-- end modal dialog -->
		</form>
	</div>
	<!-- end modal-dialog -->


	<?php $this->load->view('oprt/_partials/js.php'); ?>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature-pad.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature_pad.umd.js');?>"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("#sbnt1").on("click", function () {
				$('#sign-modal').modal('show');
				$('#append').val('sign1');
			});

			$("#sbnt2").on("click", function () {
				$('#sign-modal').modal('show');
				$('#append').val('sign2');
			});
		});

	</script>

	<script>
		var wrapper = document.getElementById("signature-pad");
		var clearButton = wrapper.querySelector("[data-action=clear]");
		var undoButton = wrapper.querySelector("[data-action=undo]");
		var saveButton = wrapper.querySelector("[data-action=save]");
		var signaturePad;
		var canvas = wrapper.querySelector("canvas");
		var signaturePad = new SignaturePad(canvas);

		function resizeCanvas() {
			var ratio = window.devicePixelRatio || 1;
			canvas.width = canvas.offsetWidth * ratio;
			canvas.height = canvas.offsetHeight * ratio;
			canvas.getContext("2d").scale(ratio, ratio);
			signaturePad.clear();
		}
		clearButton.addEventListener("click", function (event) {
			signaturePad.clear();
		});

		undoButton.addEventListener("click", function (event) {
			var data = signaturePad.toData();

			if (data) {
				data.pop(); // remove the last dot or line
				signaturePad.fromData(data);
			}
		});
		saveButton.addEventListener("click", function (event) {
			if (signaturePad.isEmpty()) {
				$('#sign-modal').modal('show');
			} else {
				var url = "<?php echo base_url();?>pimpinan/form/insert_signature";
				$('#sign-modal').modal('hide');
				$.ajax({
					type: 'POST',
					url: url,
					data: {
						'image': signaturePad.toDataURL(),
						'signname': $('#signname').val(),
						'rowno': $('#rowno').val(),
						'form_id': $('#form_id').val(),
						'append': $('#append').val(),
					},
					// dataType: 'JSON',
					success: function (data) {
						document.getElementById("signature-pad").submit();
						$('#previewsign').html(data);
					}
				});
				signaturePad.clear();
			}
		});

	</script>
	<!-- <script>
		$(document).ready(function () {
			var button = document.getElementById("buttondss");
			var button1 = document.getElementById("buttondss1");
			var button2 = document.getElementById("buttondss2");
			var status = $(this).data('status');
			if (typeof(status) =='2') {
				$(button).prop('disabled', true);
				$(button1).prop('disabled', true);
				$(button2).prop('disabled', true);
			} else {
				$(button).prop('disabled', false);
				$(button1).prop('disabled', false);
				$(button2).prop('disabled', false);
			}
		})

	</script> -->

</body>

</html>
