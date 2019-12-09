<!DOCTYPE Html>
<html lang="en">

<head>
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
											<?php if ($hnr->tarif_id == null) {?>
											<td>
												<form action="<?= site_url('admin/honor/tarif_pertama')?>"
													method="post">
													<select name="tarif_id" id="tarif_id" title="Pilih Sebagai"
														class="tarif_id" data-size="2" data-live-search="true">
														<?php foreach ($tarif->result() as $trf) {?>
														<option value="<?= $trf->id_tarif?>"><?= $trf->tarif_sebagai?>
														</option>
														<?php }?>
													</select>
													<input type="hidden" name="id_honor" value="<?=$hnr->id_honor?>">
													<button type="submit" class="btn btn-success btn-sm">Submit</button>
												</form>
											</td>
											<td></td>
											<?php } else { ?>
											<?php foreach ($tarif_hnr->result() as $thr) {?>
											<td><?= $thr->tarif_sebagai?> <span class="float-right">|| <a href="#"
														data-id_honor="<?= $thr->id_honor?>"
														data-tarif_sebagai="<?= $thr->tarif_id?>"
														class="text-dark tarif_btn">Edit</a></span></td>
											<td><?= label(); echo currency($thr->tarif_jumlah);?></td>
											<?php }?>
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
					<div class="modal-body">
					<div class="text-center">
						<select name="tarif_edit" id="tarif_edit" class="form_tarif" width="100%">
							<?php foreach ($tarif->result() as $trf) {?>
							<option value="<?= $trf->id_tarif?>"><?= $trf->tarif_sebagai?>
							</option>
							<?php }?>
						</select>
						<input type="hidden" name="edit_honor" id="edit_honor">
						<button type="submit" class="btn btn-success btn-sm">Submit</button>
					</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php }?>

	<?php $this->load->view('admin/_partials/js.php'); ?>
	<script>
		$(document).ready(function () {
			$('#mytable').dataTable();

			$('.tarif_id').selectpicker();
			$('.tarif_btn').on('click', function () {
				var id_honor = $(this).data('id_honor');
				var tarif_sebagai = $(this).data('tarif_sebagai');
				$('#edit_honor').val(id_honor);
				$('#tarif_edit').val(tarif_sebagai);
				$('.form_tarif').selectpicker();
				$('#tarif').modal('show');
			})
		})

	</script>
</body>

</html>
