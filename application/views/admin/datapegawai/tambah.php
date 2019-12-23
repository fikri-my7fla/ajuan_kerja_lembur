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

			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<h3 class="page-title">Tambah</h3>
						<div class="ml-auto text-right">
							<?php echo $tambah; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">

				<div class="">
					<div>
						<form action="<?= site_url('admin/pegawai/tambahAksi');?>" method="post">
							<div class="card">
								<div class="card-body">
									<u>
										<h5>Akun</h5>
									</u>
									<div class="row">
										<div class="form-group col-md-4 col-sm-6 col-lg-4">
											<label class="control-label" for="title">Username :</label>
											<input type="text" name="username" placeholder="username"
												class="form-control" data-error="Please enter username." required />
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-md-4 col-sm-6 col-lg-4">
											<label class="control-label" for="title">password :</label>
											<input type="text" name="password" placeholder="password"
												class="form-control" data-error="Please enter password." required />
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-md-4 col-sm-6 col-lg-4">
											<label class="control-label" for="title">Type :</label>
											<select name="type" class="form-control tambah_type" title="Pilih Type Akun"
												data-error="Please enter nip." required>
												<option selected></option>
												<option value="admin">Admin</option>
												<option value="member">Member</option>
												<option value="operator">Operator</option>
												<option value="pjbt_pk">Pejabat Pembuat Komitmen</option>
											</select>
											<div class="help-block with-errors"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<u>
										<h5>Data Pegawai</h5>
									</u>
									<div class="row">
										<div class="form-group col-md-6 col-sm-6 col-lg-6">
											<label class="control-label" for="title">NIP :</label>
											<input type="text" name="nip" min="9" maxlength="9" placeholder="NIP"
												class="form-control" data-error="Please enter nip." required />
											<div class="help-block with-errors"></div>
										</div>

										<div class="form-group col-md-6 col-sm-6 col-lg-6">
											<label class="control-label" for="title">Jenis Pekerjaan:</label>
											<select name="jenis_id" title="Pilih jenis Pekerjaan"
												class="form-control tambah_mdl"
												data-error="Please enter your unit work." data-live-search="true"
												required>
												<?php foreach($get_sub_unit as $key):?>
												<option value="<?= $key->id_jenis?>">
													<?= $key->sub_unit ?>
												</option>
												<?php endforeach;?>

											</select>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group col-12">
											<label class="control-label" for="title">Nama pegawai:</label>
											<input name="nama_pegawai" class="form-control" placeholder="Name"
												data-error="Please enter Name." required>
											<div class="help-block with-errors"></div>
										</div>
									</div>


								</div>

							</div>

							<div class="form-group">
								<a class="btn btn-secondary" href="<?= base_url('admin/pegawai/index'); ?>"><span
										class="fa fa-reply"></span></a>
								<button type="submit" class="btn crud-submit btn-success">Submit</button>
							</div>
						</form>

					</div>
				</div>

			</div>
			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</div>

	<?php $this->load->view('admin/_partials/js.php'); ?>
	<script>
		$(document).ready(function () {
			$('.tambah_mdl').selectpicker();
			$('.tambah_type').selectpicker();
		});

	</script>
</body>

</html>
