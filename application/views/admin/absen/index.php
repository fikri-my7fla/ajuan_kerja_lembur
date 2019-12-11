<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<style>
		.previewsignx {
			height: 100px;
			width: 100px;
		}

		.previewsignx img {
			max-height: 100%;
		}

	</style>
	<title>Absen Lembur</title>
</head>

<body>
	<?php $this->load->view('admin/_partials/preload.php') ?>
	<div id="main-wrapper">
		<?php $this->load->view('admin/_partials/nav.php') ?>
		<?php $this->load->view('admin/_partials/sidebar.php') ?>
		<div class="page-wrapper">

			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<h3 class="page-title">Absen Lembur</h3>
						<div class="ml-auto text-right">
							<?php echo $brcm; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="flash_data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>

				<div class="card">
					<div class="card-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12 mb-4">
									<h5 class="card-title">Absen Lembur Anda</h5>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped" id="show">
									<thead>
										<tr class="table-light">
											<th>#</th>
											<th>Nama Pegawai</th>
											<th>Jam datang</th>
											<th>Jam Pulang</th>
											<th>Tanda Tangan</th>
										</tr>
									</thead>
									<tbody>
										<?php $index=0;
										foreach ($absen->result() as $ok) { 
											$index++;?>
										<tr>
											<td><?= $index?></td>
											<td>
												<?php echo $ok->nama_pegawai;?>
												<span class="badge text-dark float-right">
													<?= $ok->sub_unit; ?>
												</span>
											</td>
											<td><?php echo $ok->jam_datang; ?></td>
											<td><?php echo $ok->jam_pulang; ?></td>
											<?php if ($ok->id_sign == 0) { ?>
											<td>
												<?php if($ok->user_id == $this->session->userdata('id_user')){?>
												<a class="btn btn-secondary btn-rounded btn-sm text-light" type=""
													id="signabsen" data-absen_id="<?= $ok->id_absen?>"
													data-form_id="<?= $ok->form_id?>"><span
														class="fa fa-pencil-alt"></span></a>
												<?php }?>
											</td>
											<?php } else {?>
											<td class="previewsignx">
												<img src="<?= $ok->sign?>" alt="">
												<i class="font-10">datetime: <?= $ok->waktu_sign_absen?></i>
											</td>
											<?php }?>
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
								<input type="hidden" name="jenis_honor" id="jenis_honor" value="<?= $get->id_jenis?>">
								<input type="hidden" name="absen_id" id="absen_id" required>
								<input type="hidden" name="form_honor" id="form_honor" required>
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
	<?php $this->load->view('admin/_partials/js.php'); ?>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature-pad.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature_pad.umd.js');?>">
	</script>
	<script>
		$(document).ready(function () {
			$('#show').DataTable();
			$(function () {
				$('[data-toggle="popover"]').popover()
			})
		})

	</script>
	<script>
		$(document).ready(function () {
			$("#signabsen").on("click", function () {
				var absen_id = $(this).data('absen_id');
				var form_id = $(this).data('form_id');
				$('#sign-modal').modal('show');
				$('#absen_id').val(absen_id);
				$('#form_honor').val(form_id);
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
				var url = "<?php echo base_url();?>admin/absen/tambah";
				$('#sign-modal').modal('hide');

				$.ajax({
					type: 'POST',
					url: url,
					data: {
						'id_sign': $('#id_sign').val(),
						'sign': signaturePad.toDataURL('image/svg+xml'),
						'nip_pgw': $('#nip_pgw').val(),
						'absen_id': $('#absen_id').val(),
						'form_honor': $('#form_honor').val(),
						'jenis_honor': $('#jenis_honor').val()
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
