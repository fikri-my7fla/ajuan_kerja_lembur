<!DOCTYPE Html>
<html lang="en">

<head>
	<style>
		.dropdown-item.active,
		.dropdown-item:active {
			color: #fff;
			text-decoration: none;
			background-color: #AEB6BF !important;
		}

		.bootstrap-select .bs-ok-default:after {
			color: #fff !important;
		}

		.previewsignx {
			height: 100px;
			width: 100px;
		}

		.previewsignx img {
			max-height: 100%;
		}

	</style>
	<?php $this->load->view('admin/_partials/head.php'); ?>
	<title>Daftar Honor</title>
</head>

<body>
	<?php $this->load->view('admin/_partials/preload.php'); ?>
	<div id="main-wrapper">
		<?php $this->load->view('admin/_partials/nav.php'); ?>
		<?php $this->load->view('admin/_partials/sidebar.php'); ?>
		<div class="page-wrapper">
			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<h3 class="page-title">Daftar Honor</h3>
						<div class="ml-auto text-right">
							<?php echo $brcm; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">

				<div class="flash_data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>

				<div class="card">
					<div class="container-fluid">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 mb-4">
									<h5 class="card-title">Daftar Honor</h5>
								</div>
							</div>
							<div class="table-responsive">
								<table id="mytable" class="table table-hover table-striped table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Pegawai</th>
											<th>Sub Unit</th>
											<th>Sebagai</th>
											<th>Jumlah Honor</th>
											<th>Ttd</th>
										</tr>
									</thead>
									<tbody>
										<?php $index=0;?>
										<?php foreach ($honor->result() as $hnr) { 
											$index++; ?>
										<tr>
											<td><?= $index;?></td>
											<td><?= $hnr->nama_pegawai; ?></td>
											<td><?= $hnr->sub_unit; ?></td>
											<?php if ($hnr->tarif_id != null) {?>
											<td>
												<?= $hnr->tarif_sebagai?>
												<span class="float-right">|| <a href="#"
														data-id_honor="<?= $hnr->id_honor?>"
														data-tarif_sebagai="<?= $hnr->tarif_id?>"
														class="text-info tarif_btn">Edit</a></span>
											</td>
											<td><?= label(); echo currency($hnr->tarif_jumlah);?></td>
											<?php if($hnr->id_sign == 0){?>
											<td>
												<?php if($hnr->user_id == $this->session->userdata('id_user')){?>
												<button type="button" href="" id="signhonor"
													data-id_honor="<?= $hnr->id_honor?>">test</button>
												<?php }?>
											</td>
											<?php } else {?>
											<td class="previewsignx">
												<img src="<?= $hnr->sign?>" alt="">
												<i class="font-10">datetime: <?= $hnr->waktu_sign_honor?></i>
											</td>
											<?php }?>
											<?php } else if($hnr->tarif_id == null) { ?>

											<td>
												<i>Belum Ditentukan</i>
												<span class="float-right">|| <a href="#"
														data-id_honor="<?= $hnr->id_honor?>"
														class="text-danger honor_btn">Pilih</a></span>
											</td>
											<td></td>
											<td></td>

											<?php }?>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('admin/_partials/footer.php');?>
		</div>
	</div>
	<?php foreach ($tarif_hnr->result() as $thr) {?>
	<form action="<?php echo base_url('admin/honor/sebagai_edit'); ?>" method="post">
		<div id="tarif" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Pilih Sebagai</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="">#</label>
							<select name="tarif_edit" id="tarif_edit" data-show-subtext="true"
								class="form_tarif form-control show-tick" required>
								<?php foreach ($tarif->result() as $trf) {?>
								<option class="bg-light" data-subtext="<?= label(); echo currency($trf->tarif_jumlah)?>"
									value="<?= $trf->id_tarif?>">
									<?= $trf->tarif_sebagai?>
								</option>
								<?php }?>
							</select>
							<input type="hidden" name="edit_honor" id="edit_honor">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success btn-sm">Submit</button>
						<button type="button" class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Back</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php }?>

	<form action="<?= site_url('admin/honor/tarif_pertama')?>" method="post">
		<div id="tarif_bfr" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Pilih Sebagai</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="">#</label>
							<select name="tarif_id" id="tarif_id" data-show-subtext="true"
								class="form_honor form-control show-tick" title="Pilih Sebagai" width="100%">
								<?php foreach ($tarif->result() as $trf) {?>
								<option data-subtext="<?= label(); echo currency($trf->tarif_jumlah)?>"
									value="<?= $trf->id_tarif?>"><?= $trf->tarif_sebagai?>
								</option>
								<?php }?>
							</select>
							<input type="hidden" name="id_honor" id="id_honor">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success btn-sm">Submit</button>
						<button type="button" class="btn btn-sm" data-dismiss="modal" aria-hidden="true">Back</button>
					</div>
				</div>
			</div>
		</div>
	</form>

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
								<input type="hidden" name="honor_id" id="honor_id" required>
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
	<script>
		$(document).ready(function () {
			$('#mytable').dataTable();

			$('.honor_btn').on('click', function () {
				var id_honor = $(this).data('id_honor');
				$('#id_honor').val(id_honor);
				$('.form_honor').selectpicker();
				$('#tarif_bfr').modal('show');
			})

			$('.tarif_btn').on('click', function () {
				var id_honor = $(this).data('id_honor');
				var tarif_sebagai = $(this).data('tarif_sebagai');
				$('#edit_honor').val(id_honor);
				$('#tarif_edit').val(tarif_sebagai);
				$('.form_tarif').selectpicker();
				$('#tarif').modal('show');
			})
			$("#signhonor").on("click", function () {
				var id_honor = $(this).data('id_honor');
				$('#sign-modal').modal('show');
				$('#honor_id').val(id_honor);
			});
		})

	</script>
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
				var url = "<?php echo base_url();?>admin/honor/tambah";
				$('#sign-modal').modal('hide');

				$.ajax({
					type: 'POST',
					url: url,
					data: {
						'id_sign': $('#id_sign').val(),
						'sign': signaturePad.toDataURL('image/svg+xml'),
						'nip_pgw': $('#nip_pgw').val(),
						'honor_id': $('#honor_id').val(),
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
