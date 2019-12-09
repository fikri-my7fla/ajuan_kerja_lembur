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
						<h3 class="page-title title-doang">Tambah</h3>
						<div class="ml-auto text-right">
							<?php echo $brcm; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">

				<div class="card">
					<div class="card-body">
						<form action="<?php echo site_url('admin/form/create');?>" method="post">
							<h2 class="card-title">Form Ajuan Lembur</h2>
							<div class="row">
								<div class="col">
									<br>
									<div class="form-group">
										<label for="">Tanggal #</label>
										<input class="form-control bg-light" type="date" name="tanggal" required>
									</div>
									<div class="form-group">
										<label for="">Unit Kerja #</label>
										<input class="form-control bg-light" type="text" name="unit_kerja"
											placeholder="Masukkan Unit Kerja" required>
									</div>
									<div class="form-group">
										<label for="">Sub Unit #</label>
										<select class="selectpicker" data-live-search="true" data-width="100%"
											data-width="100%" name="jenis_id" title="Pilih Jenis Pekerjaan" required>
											<?php foreach ($subunit->result() as $sub) { ?>
											<option value="<?= $sub->id_jenis;?>"><?= $sub->sub_unit ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="">Hasil #</label>
										<input class="form-control bg-light" type="text" name="hasil"
											placeholder="Masukkan Hasil Pekerjaan" required>
									</div>
									<div class="form-group">
										<label for="">Alasan #</label>
										<textarea class="form-control bg-light" type="" name="alasan"
											placeholder="Masukkan Alasan Lembur" required></textarea>
									</div>
								</div>
								<div class="col">
								<br>
									<div class="form-group">
										<label for="">Pengusul</label>
										<?php foreach ($cape->result() as $banget) { ?>
										<input type="text" class="form-control bg-light" name="pengusul" id="pengusul"
											value="<?= $banget->nama_pegawai?>" required>
										<?php } ?>
									</div>
									<div class="form-group">
										<label for="">Pegawai yang akan Lembur #</label>
										<select class="strings" name="pegawai[]" data-width="100%"
											data-live-search="true" multiple required>
											<?php foreach ($pegawai->result() as $row) :?>
											<option data-subtext="<?= $row->sub_unit ?>"
												value="<?php echo $row->nip?>">
												<?php echo $row->nama_pegawai;?>
											</option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<a href="<?= base_url('admin/form'); ?>" class="btn btn-secondary">
											<i class="mdi mdi-arrow-left"></i>
											Back
										</a>
										<button class="btn btn-success" type="submit">Submit</button>
									</div>
								</div>
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
			$('.strings').selectpicker();

			$('.test').selectpicker();
		});

	</script>
</body>

</html>
