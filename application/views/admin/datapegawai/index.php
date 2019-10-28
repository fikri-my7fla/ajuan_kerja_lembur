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
			<div class="container-fluid">
				<?php $data=$this->session->flashdata('sukses'); if($data!=""){ ?>
				<div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?><button
						type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></div>
				<?php } ?>
				<div class="card mb-3">
					<br>
					<br>
					<h2 class="card-title text-center">Data Pegawai</h2>
					<div>
						<a href="<?= base_url('admin/pegawai/tambah')?>" class="btn btn-success" title="Tambah Data"><span
						class="mdi mdi-account-plus"></span> Tambah</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="pgwTable">
								<thead>
									<tr>
										<th>NIP</th>
										<th>Nama Pegawai</th>
										<th>Sub Unit</th>
										<th class="text-center">action</th>
									</tr>
								</thead>
								<tbody>
									<?php if($pgw->num_rows() > 0): ?>
									<?php foreach($pgw->result() as $key): ?>
									<tr>
										<td><?= $key->nip; ?></td>
										<td><?= $key->nama_pegawai; ?></td>
										<td><?= $key->sub_unit; ?></td>
										<td class="text-center">
											<a data-toggle="modal" data-target="#modal-edit2<?=$key->id_data_pegawai;?>"
												class="btn btn-warning btn-circle" data-popup="tooltip"
												data-placement="top" title="Edit Data"><i
													class="fa fa-pencil-alt"></i></a>
											<a href="<?= site_url(''); ?>admin/pegawai/hapusaksi/<?= $key->id_data_pegawai; ?>"
												class="btn btn-danger btn-circle" title="Hapus Data"
												onclick="return confirm('yakin?');"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
									<?php endforeach; ?>
									<?php else: ?>
									<tr>
										<td colspan="6" style="text-align: center;">Data tidak tersedia</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</div>
	</div>

	<?php $this->load->view('admin/_partials/js.php'); ?>
	<script>
		$(document).ready(function () {
			$('#pgwTable').DataTable()
		});

	</script>
	<!-- edit data pegawai -->
	<?php foreach($pgw->result() as $key){ ?>
	<div class="row">
		<div id="modal-edit2<?=$key->id_data_pegawai;?>" class="modal fade">
			<div class="modal-dialog">
				<form action="<?php echo base_url('admin/pegawai/editAksi'); ?>" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<h3 class="modal-title text-center">Edit Data</h3>
							<br />

							<input type="hidden" readonly value="<?= $key->id_data_pegawai; ?>" name="id_data_pegawai"
								class="form-control">

							<div class="form-group">
								<label class='col-md-6'>NIP : </label>
								<div class='col-md-9'><input type="text" name="nip" autocomplete="off"
										value="<?= $key->nip; ?>" required placeholder="   " class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label class='col-md-6'>Nama Pegawai: </label>
								<div class='col-md-9'><input type="text" name="nama_pegawai" autocomplete="off"
										value="<?= $key->nama_pegawai; ?>" required class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-6" for="title">Jenis Pekerjaan:</label>
								<select name="jenis_id" class="col-md-9 form-control"
									data-error="Please enter your unit work." required>
									<option value="<?= $key->jenis_id?>"><?= $key->sub_unit ?></option>
									<?php foreach($get_data_sub as $conn):?>
									<option value="<?= $conn->sub_unit?>"><?= $conn->sub_unit ?></option>
									<?php endforeach;?>

								</select>
								<div class="help-block with-errors"></div>
							</div>
							<br>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
						</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
</body>

</html>
