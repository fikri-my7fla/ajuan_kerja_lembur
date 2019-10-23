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
							<h1>Ajuan Lembur Pegawai</h1>

							<button type="button" class="btn btn-success btn-sm" data-toggle="modal"
								data-target="#addNewModal">Add New
							</button><br />
							<br>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Tanggal</th>
										<th>Unit Kerja</th>
										<th>Sub Unit</th>
										<th>Status</th>
										<th>Pegawai</th>
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
										<td><?php echo $row->unit_kerja;?></td>
										<td><?php echo $row->sub_unit;?></td>
										<td><?php if ($row->status == 1){
													echo '<h4><span class="badge badge-warning font-medium">Penyetujuan</span></h4>';
												} elseif ($row->status == 2){
													echo '<h4><span class="badge badge-success font-medium text-light">Diterima</span></h4>';
												} elseif ($row->status == 1){
													echo '<h4><span class="badge badge-warning font-medium text-light">Ditolak</span></h4>';
												}?>
										</td>
										<td><?php echo $row->item_pegawai.' Pegawai';?></td>
										<td>
											<a href="#" class="btn btn-info btn-sm update-record"
												data-id_form_ajuan="<?php echo $row->id_form_ajuan;?>"
												data-alasan="<?php echo $row->alasan;?>">Edit</a>
											<a href="#" class="btn btn-danger btn-sm delete-record"
												data-id_form_ajuan="<?php echo $row->id_form_ajuan;?>">Delete</a>
										</td>
									</tr>
									<?php endforeach;?>

								</tbody>

							</table>
						</div>
					</div>
				</div>
				<?php $this->load->view('admin/_partials/footer.php') ?>
			</div>
		</div>
	</div>

	<?php $this->load->view('admin/_partials/js.php'); ?>
</body>

</html>
