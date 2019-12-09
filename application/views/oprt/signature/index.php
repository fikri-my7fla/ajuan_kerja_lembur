<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('oprt/_partials/head.php') ?>
	<style type="text/css">
		.previewsign {
			height: 250px;
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
	<title>Tanda Tangan</title>
</head>

<body>
	<?php $this->load->view('oprt/_partials/preload.php') ?>
	<div id="main-wrapper">
		<?php $this->load->view('oprt/_partials/nav.php') ?>
		<?php $this->load->view('oprt/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<h3 class="page-title">Tanda tangan</h3>
						<div class="ml-auto text-right">
							<?php echo $brcm; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<?php if($signature->num_rows()>0){ 
                    foreach ($signature->result() as $sign) : ?>
				<div class="row">
					<div class="col">
						<div class="text-center">
							<div class="">
								<div class="">
									<div class="previewsign">
										<img src="<?= $sign->sign; ?>" />
									</div>
									<div>
										<div class="typed"><?= $sign->nama_pegawai;?></div>
									</div>
                                </div>
                                <button class="btn-success signbtn" type="button" id="signppk">Ubah Tanda Tangan</button>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; 
                    } else { ?>
				<div class="jumbotron">
					<div class="text-center">
						<h1 class="text-danger">Not Found!</h1>
						<h6 style="font-family:Courier New;" class="text-danger mb-3 font-italic">Anda Belum Punya Tanda
							Tangan</h6>
						<button class="btn-success signbtn" type="button" id="signppk">Buat Tanda Tangan!</button>
					</div>
				</div>
				<?php }?>
			</div>
			<?php $this->load->view('oprt/_partials/footer.php') ?>
		</div>
	</div>


	<div class="modal fade" id="sign-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="" method="post" id="signature-pad">
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
							<div class="form-group">
								<?php foreach ($user->result() as $get) { ?>
								<input type="hidden" name="nip_pgw" id="nip_pgw" value="<?= $get->nip?>">
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="signature-pad--footer">
							<div class="description">Sign above</div>
							<div class="signature-pad--actions">
								<div>
									<input type="hidden" name="id_sign" id="id_sign" value="">
									<button type="button" id="save2" class="button" data-action="save"
										id="save_upd">Save</button>
									<button type="button" class="button" data-action="clear">Clear</button>
									<button type="button" class="button" data-action="undo">Undo</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php $this->load->view('oprt/_partials/js.php'); ?>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature-pad.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature_pad.umd.js');?>">
	</script>
	<script>
		$(document).ready(function () {
			$("#signppk").on("click", function () {
				$('#sign-modal').modal('show');
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
				var url = "<?php echo base_url();?>pimpinan/signature/insert_signature";
				$('#sign-modal').modal('hide');
				$.ajax({
					type: 'POST',
					url: url,
					data: {
						'id_sign': $('#id_sign').val(),
						'sign': signaturePad.toDataURL('image/svg+xml'),
						'nip_pgw': $('#nip_pgw').val()
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
</body>

</html>
