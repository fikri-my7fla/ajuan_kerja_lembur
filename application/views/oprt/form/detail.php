<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('oprt/_partials/head.php') ?>
	<!-- <link rel="stylesheet" href="< ?= base_url('assets/jquery/sign/css/example.css');?>"> -->
	<style type="text/css">
		.previewsign {
			border: 1px dashed #ccc;
			border-radius: 5px;
			color: #bbbabb;
			height: 129px;
		}

		.previewsign img {
			max-height: 100%;
		}

		.preview {
			border: 1px dashed #ccc;
			border-radius: 5px;
			height: 172px;
		}

		.typed {
			height: 55px;
			margin: 0;
			padding: 0 5px;
			position: absolute;
			z-index: 90;
			cursor: default;

			color: #145394;
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
				<h3 class="mb-3">Detail Pengajuan</h3>
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
									</div>
									<?php } ?>
								</div>
							</div>
							<!-- end detail -->
							<br>
							<br>
							<!-- pgw -->
							<div class="container">
								<table class="table table-bordered">
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
											<td class="col-11"><?= $oh->nama_pegawai ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
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
														<div class="previewsign"></div>
														<div class="col">
															<div class="typed">John Doe</div>
														</div>
													</div>
													<!-- end sign1 -->
												</div>
											</div>
											<button class="btn btn-secondary btn-sm signbtn" type="button"
												id="sbnt1">signature</button>

										</div>
									</div>
									<div class="col">
										<div class="text-center">
											<h6>Pejabat Pembuat Komitmen</h6>
											<div class="card">
												<div class="card-body">
													<!-- signature2 -->
													<div>
														<div class="previewsign"></div>
														<div class="col">
															<div class="typed">Lorem Ipsum</div>
														</div>
													</div>
													<!-- end sign2 -->
												</div>
											</div>
											<button class="btn btn-secondary btn-sm signbtn" type="button"
												id="sbnt1">signature</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end signature -->


					</div>
				</div>
			</div>
			<!-- end card -->

			<?php $this->load->view('oprt/_partials/footer.php') ?>
		</div>
		<!-- end container fluid -->
	</div>
	<!-- end page wrapper -->
	</div>
	<!-- end main wrapper -->

	<!-- modal -->
	<div class="modal fade" id="sign-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" id="signature-pad">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-pencil"></i> Add Signature</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div id="signature-pad" class="signature-pad">
						<div class="signature-pad--body">
							<canvas width="570" height="318"></canvas>
						</div>
						<!--Signature Values-->
						<input type="hidden" id="rowno" name="rowno" value="<?php echo rand();?>">

					</div>

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

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>


	<?php $this->load->view('oprt/_partials/js.php'); ?>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature-pad.js');?>"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("#sbnt1").on("click", function () {
				$('#sign-modal').modal('show');
			});
		});

	</script>

	<script>
		var wrapper = document.getElementById("signature-pad"),
			clearButton = wrapper.querySelector("[data-action=clear]"),
			undoButton = wrapper.querySelector("[data-action=undo]"),
			canvas = wrapper.querySelector("canvas"),
			signaturePad;
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

	</script>

</body>

</html>
