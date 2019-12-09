<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<title>Jenis Pekerjaan</title>
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
						<h3 class="page-title">Jenis Pekerjaan</h3>
						<div class="ml-auto text-right">
							<?php echo $brcm;; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="flash_data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>
				<div class="card">
					<div class="container-fluid">
						<div class="card-body">

							<div class="mb-3">
								<div class="row">
									<div class="col-12 d-flex no-block align-items-center">
										<h5 class="card-title">Data Jenis Pekerjaan</h5>
										<div class="ml-auto text-right">
											<!-- collapse -->
											<button class="btn btn-success btn-sm" data-toggle="collapse"
												data-target="#tambahgan"><span class="fa fa-paper-plane"></span>
												Tambah</button>
										</div>
										<!-- end collps -->
									</div>
								</div>
							</div>
							<div class="collapse" id="tambahgan">
								<div class="card">
									<div class="card-header">
										<form action="<?= base_url('admin/subunit/tambah')?>" method="post">
											<div class="form-group mb-2">
												<h6>Tambah Jenis Pekerjaan#</h6>
												<div class="row">
													<div class="col-12 d-flex no-block align-items-center">
														<input type="text" name="sub_unit" id="sub_unit"
															class="form-control mr-2" required
															placeholder="Masukkan Data">
														<div class="ml-auto text-right">
															<input type="hidden" name="id_jenis">
															<button type="submit" value="submit"
																class="btn btn-outline-success">Simpan</button>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- bungkus tabel nya gan -->
							<div class="table-responsive">
								<table class="table table-hover table-striped table-bordered" id="table">
									<thead>
										<tr>
											<th width="10%">NO</th>
											<th>sub unit</th>
											<th style="text-align: right;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if($jenis_pekerjaan->num_rows() > 0): ?>
										<?php $index = 1; ?>
										<?php foreach($jenis_pekerjaan->result() as $jp): ?>
										<tr>
											<td width="5%"><?php echo $index++; ?></td>
											<td><?php echo $jp->sub_unit; ?></td>
											<td class="clearfix" width="10%">
												<div class="float-left">
													<a data-toggle="modal" data-target="#modal-edit<?=$jp->id_jenis;?>"
														class="btn btn-warning btn-circle btn-sm text-dark"
														rel="tooltip" data-tool="tooltip" title="Edit Data"><i
															class="fa fa-pencil-alt"></i></a>
												</div>
												<div class="float-left">
													<form action="<?php echo site_url('admin/subunit/hapus');?>"
														method="POST">
														<input type="hidden" name="delete_id" id="delete_id"
															value="<?php echo $jp->id_jenis;?>">
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
										<?php else: ?>
										<tr>
											<td colspan="6" style="text-align: center;">Data tidak tersedia</td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
							<!-- card -->
						</div>
						<!-- bungkus nya tabel -->
					</div>
					<!-- bodi -->
				</div>
				<!-- kartu yang mb -->
			</div>
			<!-- kontener -->
			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
		<!-- page wrppr -->
	</div>
	<!-- terakhir main wrapper -->

	<?php $this->load->view('admin/_partials/js.php'); ?>

	<!-- datatable -->
	<script type="text/javascript">
		$(document).ready(function () {
			$('#table').DataTable()
			$('[data-tool="tooltip"]').tooltip({});
		});

	</script>
	<!-- akhirnyaa -->

	<!-- modal edit -->
	<?php foreach($jenis_pekerjaan->result() as $jp): ?>
	<div class="row">
		<div id="modal-edit<?=$jp->id_jenis;?>" class="modal fade">
			<div class="modal-dialog">
				<form action="<?php echo base_url('admin/subunit/edit'); ?>" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Jenis Pekerjaan</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<br />
							<input type="hidden" readonly value="<?=$jp->id_jenis?>" name="id_jenis"
								class="form-control">

							<div class="form-group">
								<label class='col-md-3'>Jenis Pekerjaan</label>
								<div class='col-md-9'><input type="text" name="sub_unit" autocomplete="off"
										value="<?=$jp->sub_unit?>" required placeholder="Masukkan Sub Unit"
										class="form-control"></div>
							</div>
							<br>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal"><i
									class="fa fa-reply"></i></button>
							<button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<!-- end edit -->
</body>

</html>
