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
			<div class="container-fluid">
				<?php $data=$this->session->flashdata('sukses'); if($data!=""){ ?>
				<div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?><button
						type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></div>
				<?php } ?>
				<div class="card">
					<div class="card-body">
						<br />
						<div class="container">

							<div class="row">
								<div class="col-md-11">
									<h1>Ajuan Lembur Pegawai</h1>
								</div>
								<div class="">
									<a href="<?= base_url('admin/form/tambah'); ?>" class="btn btn-success btn-sm"><span
											class="fa fa-paper-plane"></span>
										Tambah</a>
								</div>
							</div>


							<br>

							<div class="table-responsive">
								<table class="table table-hover" id="formAjuan">

									<thead>
										<tr>
											<th>#</th>
											<th>Tanggal</th>
											<th>Sub Unit</th>
											<th>Hasil</th>
											<th>Pegawai</th>
											<th class="text-center">Status</th>
											<th class="text-right">Actions</th>
										</tr>
									</thead>

									<tbody>
										<?php 
										$count=0;
										foreach ($form_ajuan->result() as $row) :
											$count++;
										?>
										<tr>
											<td><?php echo $count;?></td>
											<td><?php echo $row->tanggal;?></td>
											<td><?php echo $row->sub_unit;?></td>
											<td><?php echo $row->hasil;?></td>
											<td><?php echo $row->item_pegawai.' Pegawai';?></td>
											<td><?php if ($row->status == '1'){
												echo '<h4><span class="badge badge-secondary col-12 font-medium text-light"><i class="mdi mdi-file-document"></i> Proses</span></h4>';
											} elseif ($row->status == '2'){
												echo '<h4><span class="badge badge-success col-12 font-medium text-light"><i class="mdi mdi-check"></i> Diterima</span></h4>';
											} elseif ($row->status == '3'){
												echo '<h4><span class="badge badge-danger col-12 font-medium text-light"><i class="mdi mdi-alert-outline"></i> Ditolak</span></h4>';
											} elseif ($row->status == '4'){
												echo '<h4><span class="badge badge-info col-12 font-medium text-light"><i class="mdi mdi-sync"></i> Direvisi</span></h4>';
												}?>
											</td>
											<td class="text-right">
												<!-- edit -->
												<a href="#" class="btn btn-info btn-sm update-record"
													data-id_form_ajuan="<?php echo $row->id_form_ajuan;?>"
													data-tanggal="<?php echo $row->tanggal; ?>"
													data-unit_kerja="<?php echo $row->unit_kerja; ?>"
													data-jenis_id="<?php echo $row->jenis_id; ?>"
													data-hasil="<?php echo $row->hasil; ?>"
													data-alasan="<?php echo $row->alasan; ?>"
													data-status="<?php echo $row->status; ?>">
													<span class='fas fa-pencil-alt'></span>
													Ubah</a>
												<!-- delete -->
												<a href="#" class="btn btn-danger btn-sm delete-record"
													data-id_form_ajuan="<?php echo $row->id_form_ajuan;?>">
													<span class="fa fa-trash"></span>
													Hapus</a>
												<!-- detail -->
												<a href="<?= base_url('admin/form/detail/') ?><?= $row->id_form_ajuan;?>"
													class="btn btn-info btn-sm">
													Detail
												</a>
											</td>
										</tr>
										<?php endforeach;?>
									</tbody>

								</table>
							</div>

						</div>
					</div>
					<!-- end card body -->
				</div>
				<!-- end card -->
				<?php $this->load->view('admin/_partials/footer.php') ?>
			</div>
			<!-- end container fluid -->
		</div>
		<!-- end page wrapper -->
	</div>
	<!-- end main wrapper -->

	<!-- EDIT MODAL -->
	<form action="<?= site_url('admin/form/edit');?>" method="post">
		<div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<label for="">Unit Kerja #</label>
								<input class="form-control" type="text" name="unit_kerja" id="unit_kerja"
									placeholder="Masukkan Unit Kerja" required>
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
								<label for="">Hasil #</label>
								<input class="form-control" id="hasil" type="text" name="hasil"
									placeholder="Masukkan Hasil Pekerjaan" required>
							</div>
							<div class="form-group col-md-6">
								<label for="">Alasan #</label>
								<textarea class="form-control" id="alasan" type="" name="alasan"
									placeholder="Masukkan Alasan Lembur" required></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="">Pegawai #</label>
								<select class="bs-select strings" data-size="5" name="pegawai_edit[]" data-width="100%"
									data-live-search="true" multiple required>
									<?php foreach ($pegawai->result() as $row) :?>
									<option data-subtext="<?= $row->sub_unit ?>" value="<?php echo $row->id_data_pegawai;?>"><?php echo $row->nama_pegawai;?>
									</option>
									<?php endforeach;?>
								</select>
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

	<!-- DELETE MODAL -->

	<form action="<?php echo site_url('admin/form/delete');?>" method="post">
		<div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="text-center">
							<div class="mb-5">
								<br>
								<span style="font-size: 115px" class='far fa-times-circle text-danger'></span>
								<br />
								<br>
								<h3>Apakah Kamu Yakin</h3>
								<h4 class="text-secondary">Ingin Menghapus ini?</h4>
							</div>
							<input type="hidden" name="delete_id" required>
							<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">No</button>
							<button type="submit" class="btn btn-success col-md-3">Yes</button>
						</div>
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
				$(".strings").val('');
				$('#UpdateModal').modal('show');
				$('#edit_id').val(id_form_ajuan);
				$('#tanggal').val(tanggal);
				$('#unit_kerja').val(unit_kerja);
				$('#sub_unit').val(sub_unit);
				$('#hasil').val(hasil);
				$('#alasan').val(alasan);
				$('#status').val(status);
				//AJAX REQUEST TO GET SELECTED Pegawai
				$.ajax({
					url: "<?php echo site_url('admin/form/get_pegawai_by_form');?>",
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
							$(".strings").selectpicker('refresh');

						});
					}

				});
				return false;
			});
			//GET CONFIRM DELETE
			$('.delete-record').on('click', function () {
				var id_form_ajuan = $(this).data('id_form_ajuan');
				$('#DeleteModal').modal('show');
				$('[name="delete_id"]').val(id_form_ajuan);
			});
		});

	</script>
</body>

</html>
