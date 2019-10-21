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
				<div class="card col-md-6">
					<div class="card-body">
						<div>
                            <h3>Form Ajuan Lembur</h3>
                            <br />
							<div>
								<form action="<?=site_url('admin/form/aksitambah')?>" method="post">
									<div class="form-group">
										<label for="">Tanggal *</label>
										<input class="form-control" type="date" name="tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Unit Kerja *</label>
                                        <input class="form-control" type="text" name="unit_kerja" placeholder="Masukkan Unit Kerja" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sub Unit *</label>
                                        <select class="form-control" name="jenis_id" required>
                                            <option value="">- Select -</option>
                                            <?php foreach ($pal as $su) { ?>
                                                <option value="<?= $su->id_jenis; ?>"><?= $su->sub_unit;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hasil *</label>
                                        <input class="form-control" type="text" name="hasil" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alasan</label>
                                        <input class="form-control" type="" name="alasan" required>
                                    </div>
                                    <div class="form-group">
                                        <a href="<?= base_url('admin/form');?>" class="btn btn-secondary">Back</a>
                                        <button class="btn crud-submit btn-success" type="submit">Submit</button>
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
