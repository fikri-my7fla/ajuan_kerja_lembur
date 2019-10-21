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
						<br>
						<h2 class="card-title text-center">Form Ajuan Lembur Pegawai</h2>
						<br>
						<br>
						<br>
						<div align="center">
							<a href="<?= base_url('admin/form/tambah');?>" class="btn btn-success">Tambah</a>
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
