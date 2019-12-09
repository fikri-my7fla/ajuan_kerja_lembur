<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('oprt/_partials/head.php') ?>
	<style>
		.signature-pad--body canvas {
			position: relative;
			background-color: white;
			border-radius: 4px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;

		}

	</style>
	<title>Ajuan Lembur</title>
</head>

<body>
	<?php $this->load->view('oprt/_partials/preload.php') ?>
	<div id="main-wrapper">
		<?php $this->load->view('oprt/_partials/nav.php') ?>
		<?php $this->load->view('oprt/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-md-12 d-flex no-block align-items-center float-left">
						<h3 class="page-title"></h3>
						<div class="ml-auto text-right">
							<?php echo $brcm; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				

			</div>
			<?php $this->load->view('oprt/_partials/footer.php') ?>
		</div>
	</div>

	<?php $this->load->view('oprt/_partials/js.php'); ?>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature-pad.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature_pad.umd.js');?>">
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
						'id_sign': $('#id_sign').val(),
						'image': signaturePad.toDataURL(),
						'pgw_id': $('#pgw_id').val()
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
