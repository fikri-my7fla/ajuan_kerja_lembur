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
			<div class="container-fluid">
			<div class="">
					<div class="row">
						<div class="col-12 d-flex no-block align-items-center">
							<h3 class="page-title">Jenis Pekerjaan</h3>
							<div class="ml-auto text-right">
								<?php echo $brcm;; ?>
							</div>
						</div>
					</div>
				</div>
				<?php $data=$this->session->flashdata('sukses'); if($data!=""){ ?>
				<div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?><button
						type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php } ?>
				<div class="card mb-3">
					<div class="card-body">
						<div class="">
							<br>
							<h2 class="card-title text-center">Data Jenis Pekerjaan</h2>
							<!-- collapse -->
							<button class="btn btn-success mb-3" data-toggle="collapse"
								data-target="#tambahgan">Tambah</button>
							<br>
							<div id="tambahgan" class="collapse mb-3">
								<div class="card-header">
									<form action="<?= base_url('admin/subunit/tambah')?>" method="post">
										<input type="hidden" name="id_jenis">
										<p>Sub unit #</p>
										<div class="form-group form-inline">
											<input type="text" name="sub_unit" id="sub_unit" class="form-control"
												required placeholder="Masukkan Data">
											<button type="submit" value="submit"
												class="btn btn-outline-success">Simpan</button>
										</div>
									</form>
								</div>
							</div>
							<!-- end collps -->
							<!-- bungkus tabel nya gan -->
							<div class="table-responsive">
								<table class="table table-hover" id="table">
									<thead>
										<tr>
											<th>NO</th>
											<th>sub unit</th>
											<th style="text-align: right;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php if($jenis_pekerjaan->num_rows() > 0): ?>
										<?php $index = 1; ?>
										<?php foreach($jenis_pekerjaan->result() as $jp): ?>
										<tr>
											<td><?php echo $index++; ?></td>
											<td><?php echo $jp->sub_unit; ?></td>
											<td style="text-align: right;">
												<a data-toggle="modal" data-target="#modal-edit<?=$jp->id_jenis;?>"
													class="btn btn-warning btn-circle" data-popup="tooltip"
													data-placement="top" title="Edit Data"><i
														class="fa fa-pencil-alt"></i></a>
												<a href="<?= site_url(''); ?>admin/subunit/hapus/<?= $jp->id_jenis; ?>"
													class="btn btn-danger btn-circle"
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
							<!-- bungkus nya tabel -->
						</div>
						<!-- card -->
					</div>
					<!-- bodi -->
				</div>
				<!-- kartu yang mb -->
				<?php $this->load->view('admin/_partials/footer.php') ?>
			</div>
			<!-- kontener -->
		</div>
		<!-- page wrppr -->
	</div>
	<!-- terakhir main wrapper -->

	<?php $this->load->view('admin/_partials/js.php'); ?>

	<!-- datatable -->
	<script type="text/javascript">
		$(document).ready(function () {
			$('#table').DataTable()
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
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<h4 class="modal-title">Edit Jenis Pekerjaan</h4>
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
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
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
