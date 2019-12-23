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

			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<h3 class="page-title">Ajuan Lembur</h3>
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
								<div class="col-12 d-flex no-block align-items-center">
									<h5 class="card-title">Ajuan Lembur</h5>
									<div class="ml-auto text-right">
										<a href="<?= base_url('admin/form/tambah'); ?>"
											class="btn btn-success btn-sm"><span class="fa fa-paper-plane"></span>
											Tambah</a>
									</div>
								</div>
							</div>


							<br>

							<div class="table-responsive-md table-responsive-sm">
								<table class="display" style="width:100%" id="formAjuan">

									<thead>
										<tr>
											<th>#</th>
											<th>Tanggal</th>
											<th>Sub Unit</th>
											<th>Pengusul</th>
											<th>Pegawai</th>
											<th>Status</th>
											<!-- <th>Detail</th> -->
											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
										<?php 
										$count=0;
										foreach ($form_ajuan->result() as $row) :
											$count++;
										?>
										<tr>
											<th width="5%" class="text-center"><?php echo $count;?></th>
											<td><?php echo $row->tanggal;?></td>
											<td><?php echo $row->sub_unit;?></td>
											<td><?php echo $row->pengusul;?></td>
											<td><?php echo $row->item_pegawai.' Pegawai';?></td>
											<td><?php if ($row->status == '1'){
												echo '<h5 class="text-dark"><span class="badge badge-secondary col-12">DiProses <i class="mdi mdi-file-document"></i></span></h5>';
											} elseif ($row->status == '2'){
												echo '<h5 class="text-light"><span class="badge badge-success col-12">DiTerima <i class="mdi mdi-check"></i></span></h5>';
											} elseif ($row->status == '3'){
												echo '<h5 class="text-light"><span class="badge badge-danger col-12">DiTolak <i class="mdi mdi-alert-outline"></i></span></h5>';
											} elseif ($row->status == '4'){
												echo '<h5 class="text-light"><span class="badge badge-info col-12">DiRevisi <i class="mdi mdi-sync"></i></span></h5>';
												}?>
											</td>
											<td class="clearfix" width="13%">
												<!-- detail -->
												<div class="float-left">
													<a href="<?= base_url('admin/form/detail/') ?><?= $row->id_form_ajuan;?>"
														class="btn btn-info btn-sm text-light">
														<span class="fa fa-book"></span>
													</a>
												</div>

												<!-- edit -->
												<?php if ($row->status !='2') { ?>
												<div class="float-left">
													<a href="#"
														class=" btn btn-warning btn-sm text-dark update-record"
														data-id_form_ajuan="<?php echo $row->id_form_ajuan;?>"
														data-tanggal="<?php echo $row->tanggal; ?>"
														data-unit_kerja="<?php echo $row->unit_kerja; ?>"
														data-jenis_id="<?php echo $row->jenis_id; ?>"
														data-hasil="<?php echo $row->hasil; ?>"
														data-alasan="<?php echo $row->alasan; ?>"
														data-status="<?php echo $row->status; ?>"
														data-pengusul="<?php echo $row->pengusul; ?>">
														<span class='fas fa-pencil-alt'></span>
													</a>
												</div>
												<?php } ?>
												<!-- hapus -->
												<div class="float-left">
													<form action="<?php echo site_url('admin/form/delete');?>"
														method="POST">
														<input type="hidden" name="delete_id" id="delete_id"
															value="<?php echo $row->id_form_ajuan;?>">
														<button class="btn btn-danger btn-sm" name="archive"
															type="submit" onclick="archiveFunction()">
															<i class="fa fa-trash"></i>
														</button>
													</form>
												</div>
											</td>
										</tr>
										<?php endforeach;?>
									</tbody>

								</table>
							</div>

						</div>
						<!-- end card body -->
					</div>
				</div>
				<!-- end card -->
			</div>
			<!-- end container fluid -->
			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
		<!-- end page wrapper -->
	</div>
	<!-- end main wrapper -->

	<!-- EDIT MODAL -->
	<form action="<?= site_url('admin/form/edit');?>" method="post">
		<div class="modal fade" tabindex="-1" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<div class="form-group col-md-6">
								<label for="">Tanggal #</label>
								<input class="form-control" type="date" name="tanggal" id="tanggal" required>
							</div>
							<div class="form-group col-md-6">
								<label for="">Sub Unit #</label>
								<select class="form-control" id="sub_unit" data-width="100%" name="jenis_id" required>
									<option value="0">- Select Sub Unit -</option>
									<?php foreach ($subunit->result() as $sub) { ?>
									<option value="<?= $sub->id_jenis;?>"><?= $sub->sub_unit ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="">Unit Kerja #</label>
								<input class="form-control" type="text" name="unit_kerja" id="unit_kerja"
									placeholder="Masukkan Unit Kerja" required>
							</div>
							<div class="form-group col-md-6">
								<label for="">Pengusul</label>
								<input type="text" id="pengusul" name="pengusul" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label for="">Hasil #</label>
								<input class="form-control" id="hasil" type="text" name="hasil"
									placeholder="Masukkan Hasil Pekerjaan" required>
							</div>
							<div class="form-group col-md-6">
								<label for="">Pegawai #</label>
								<select class="bs-select strings" data-size="5" name="pegawai_edit[]" data-width="100%"
									data-live-search="true" multiple required>
									<?php foreach ($pegawai->result() as $row) :?>
									<option data-subtext="<?= $row->sub_unit ?>" value="<?php echo $row->nip;?>">
										<?php echo $row->nama_pegawai;?>
									</option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group col-md-12">
								<label for="">Alasan #</label>
								<textarea class="form-control" id="alasan" type="" name="alasan"
									placeholder="Masukkan Alasan Lembur" required></textarea>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<input type="hidden" name="edit_id" id="edit_id" required>
						<input type="hidden" name="status" id="status" required>
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success btn-sm">Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<?php $this->load->view('admin/_partials/js.php'); ?>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#formAjuan').DataTable();
			//GET UPDATE
			$('.bs-select').selectpicker();
			$('.update-record').on('click', function () {
				var id_form_ajuan = $(this).data('id_form_ajuan');
				var tanggal = $(this).data('tanggal');
				var unit_kerja = $(this).data('unit_kerja');
				var sub_unit = $(this).data('jenis_id');
				var hasil = $(this).data('hasil');
				var alasan = $(this).data('alasan');
				var status = $(this).data('status');
				var pengusul = $(this).data('pengusul');
				$(".strings").val('');
				$('#UpdateModal').modal('show');
				$('#edit_id').val(id_form_ajuan);
				$('#tanggal').val(tanggal);
				$('#unit_kerja').val(unit_kerja);
				$('#sub_unit').val(sub_unit);
				$('#hasil').val(hasil);
				$('#alasan').val(alasan);
				$('#status').val(status);
				$('#pengusul').val(pengusul);
				//AJAX REQUEST TO GET SELECTED Pegawai
				var url = "<?php echo site_url('admin/form/get_pegawai_by_');?>"
				$.ajax({
					url: url,
					method: "POST",
					data: {
						id_form_ajuan: id_form_ajuan
					},
					cache: false,
					success: function (data) {
						var item = data;
						var val1 = item.replace("[", "");
						var val2 = val1.replace("]", "");
						var values = val2;
						$.each(values.split(","), function (i, e) {
							$(".strings option[value='" + e + "']").prop("selected", true)
								.trigger('change');
							$(".strings").selectpicker("refresh");
						});
					}

				});
				return false;
			});

		});

	</script>
</body>

</html>
