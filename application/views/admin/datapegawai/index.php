<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<title>Data Pegawai</title>
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
						<h3 class="page-title">Data Pegawai</h3>
						<div class="ml-auto text-right">
							<?php echo $test1; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="flash_data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>

				<div class="card">
					<div class="container-fluid">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-12 d-flex no-block align-items-center">
									<h5 class="card-title">Data Pegawai LIPI KRB</h5>
									<div class="ml-auto text-right">
										<a href="<?= base_url('admin/pegawai/tambah')?>" class="btn btn-success btn-sm"
											title="Tambah Data"><span class="mdi mdi-account-plus"></span>
											Tambah</a>
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table table-hover table-striped table-bordered" id="pgwTable">
									<thead>
										<tr>
											<th>#</th>
											<th>NIP</th>
											<th>Nama Pegawai</th>
											<th>Sub Unit</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $index=0; ?>
										<?php foreach($pgw->result() as $key): 
											$index++;?>
										<tr>
											<td width="5%" class="text-center"><?= $index;?></td>
											<td><?= $key->nip; ?></td>
											<td><?= $key->nama_pegawai; ?></td>
											<td><?= $key->sub_unit; ?></td>
											<td width="10%" class="text-center clearfix">
												<div class="float-left">

													<a data-toggle="modal"
														data-target="#modal-edit2<?=$key->nip;?>"
														class="btn btn-warning btn-circle btn-sm text-dark"
														rel="tooltip" data-tool="tooltip" title="Edit Data">
														<i class="fa fa-pencil-alt"></i>
													</a>
													
												</div>
												<div class="float-left">
													<form action="<?php echo site_url('admin/pegawai/hapusAksi');?>"
														method="POST">
														<input type="hidden" name="nip_delete" id="nip_delete"
															value="<?php echo $key->nip;?>">
														<button class="btn btn-danger btn-circle btn-sm" rel="tooltip"
															data-toggle="tooltip" title="Hapus Data" name="archive"
															type="submit" onclick="archiveFunction()">
															<i class="fa fa-trash"></i>
														</button>
													</form>
												</div>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
								<!-- table resposive -->
							</div>
							<!-- end card body -->
						</div>
					</div>
				</div>
				<!-- end card -->
			</div>
			<!-- container fluid -->
			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
		<!-- page wrappr -->
	</div>
	<!-- id= wrapper -->

	<?php $this->load->view('admin/_partials/js.php'); ?>
	<script>
		$(document).ready(function () {
			$('#pgwTable').DataTable()
		});
		$(document).ready(function () {
			$('.edit_modl').selectpicker()
		});
		$('[data-tool="tooltip"]').tooltip({});

	</script>

	<!-- edit data pegawai -->
	<?php foreach($pgw->result() as $key){ ?>
	<div class="row">
		<div id="modal-edit2<?=$key->nip;?>" class="modal fade">
			<div class="modal-dialog">
				<form action="<?php echo base_url('admin/pegawai/editAksi'); ?>" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title text-center">Edit Data</h3>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>

						<div class="modal-body">

							<div class="form-group">
								<label class=''>NIP : </label>
								<div class=''><input type="text" name="nip" min="9" maxlength="9" autocomplete="off"
										value="<?= $key->nip; ?>" required placeholder="   " class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label class=''>Nama Pegawai: </label>
								<div class=''><input type="text" name="nama_pegawai" autocomplete="off"
										value="<?= $key->nama_pegawai; ?>" required class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="" for="title">Jenis Pekerjaan:</label>
								<select name="jenis_id" value="" class="form-control edit_modl"
									data-error="Please enter your unit work." required>
									<option value="<?= $key->jenis_id?>"><?= $key->sub_unit ?></option>
									<?php foreach($get_data_sub as $conn):?>
									<option value="<?= $conn->id_jenis?>"><?= $conn->sub_unit ?></option>
									<?php endforeach;?>

								</select>
								<div class="help-block with-errors"></div>
							</div>
							<br>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="edit_nip" value="<?= $key->nip?>">
							<button type="button" class="btn btn-secondary" data-dismiss="modal"><span
									class="fa fa-reply"></span></button>
							<button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
						</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
</body>

</html>
