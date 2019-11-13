<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('oprt/_partials/head.php') ?>
	<title>Ajuan Lembur</title>
</head>

<body>
	<?php $this->load->view('oprt/_partials/preload.php') ?>
	<div id="main-wrapper">
		<?php $this->load->view('oprt/_partials/nav.php') ?>
		<?php $this->load->view('oprt/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="">
					<div class="row">
						<div class="col-12 d-flex no-block align-items-center">
							<h3 class="page-title">Ajuan Lembur</h3>
							<div class="ml-auto text-right">
								<?php echo $brcm; ?>
							</div>
						</div>
					</div>
				</div>
				<?php $data=$this->session->flashdata('sukses'); if($data!=""){ ?>
				<div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?><button
						type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></div>
				<?php } ?>
				<div class="card mb-3">

					<div class="card-body">
						<div class="container">

							<div class="mb-4">
								<h2 class="card-title">Ajuan Lembur</h2>
							</div>

							<div class="table-responsive">
								<table class="table table-hover" id="formAjuan">
									<thead>
										<tr>
											<th>#</th>
											<th>Tanggal</th>
											<th>Sub Unit</th>
											<th>Hasil</th>
											<th>Pegawai</th>
											<th>Status</th>
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
											<td><?php echo $count;?></td>
											<td><?php echo $row->tanggal;?></td>
											<td><?php echo $row->sub_unit;?></td>
											<td><?php echo $row->hasil;?></td>
											<td><?php echo $row->item_pegawai.' Pegawai';?></td>
											<td><?php 
											if ($row->status == '1'){
												echo '<h4><span class="badge badge-secondary col-12 font-medium text-light"><i class="mdi mdi-file-document"></i> Proses</span></h4>';
											} elseif ($row->status == '2'){
												echo '<h4><span class="badge badge-success col-12 font-medium text-light"><i class="mdi mdi-check"></i> Diterima</span></h4>';
											} elseif ($row->status == '3'){
												echo '<h4><span class="badge badge-danger col-12 font-medium text-light"><i class="mdi mdi-alert-outline"></i> Ditolak</span></h4>';
											} elseif ($row->status == '4'){
												echo '<h4><span class="badge badge-info col-12 font-medium text-light"><i class="mdi mdi-sync"></i> Direvisi</span></h4>';
												}?>
											</td>
											<td>
												<div class="text-center">
													<a href="<?= base_url('pimpinan/form/detail/') ?><?php echo $row->id_form_ajuan;?>"
														class="btn btn-info btn-sm">Detail <span
															class="fa fa-book"></span>
													</a>
												</div>
											</td>
										</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							</div>

						</div>
					</div>

				</div>
			</div>
			<?php $this->load->view('oprt/_partials/footer.php') ?>
		</div>
	</div>

	<?php $this->load->view('oprt/_partials/js.php'); ?>
	<script>
		$(document).ready(function () {
			$('#formAjuan').DataTable();


		});

	</script>
</body>

</html>
