<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<title>Tambah Data</title>
</head>

<body>
	<?php $this->load->view('admin/_partials/preload.php') ?>
	<div id="main-wrapper">
		<?php $this->load->view('admin/_partials/nav.php') ?>
		<?php $this->load->view('admin/_partials/sidebar.php') ?>
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="card mb-3">

					<div class="card-header">
						<a href="<?= base_url('admin/pegawai') ?>">Back</a>
					</div>

					<div class="card-body">
						<div>
							<h3 align="center">Tambah Data</h3>
							<form action="<?= site_url('admin/pegawai/tambahAksi');?>" method="post">
								<div class="form-group">
									<label class="control-label" for="title">NIP :</label>
									<input type="text" name="nip" placeholder="NIP" class="form-control" data-error="Please enter nip."
										required />
									<div class="help-block with-errors"></div>
								</div>

								<div class="form-group">
									<label class="control-label" for="title">Nama pegawai:</label>
									<input name="nama_pegawai" class="form-control" placeholder="Name" data-error="Please enter Name."
										required>
									<div class="help-block with-errors"></div>
								</div>

								<div class="form-group">
									<label class="control-label" for="title">Jenis Pekerjaan:</label>
									<select name="jenis_id" class="form-control"
										data-error="Please enter your unit work." required>
										<option value="">- select -</option>
											<?php foreach($get_sub_unit as $key):?>
										<option value="<?= $key->id_jenis?>">
											<?= $key->sub_unit ?>
										</option>
											<?php endforeach;?>

									</select>
									<div class="help-block with-errors"></div>
								</div>

								<div class="form-group">
									<button type="submit" class="btn crud-submit btn-success">Submit</button>
								</div>

							</form>
						</div>
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
