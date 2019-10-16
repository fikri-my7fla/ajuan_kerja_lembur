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
			<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				<div class="card mb-3">
					<div class="card-header">
						<a class="btn text-success" data-toggle="collapse" data-target="#collapseSubUnit"
							aria-expanded="false" aria-controls="collapseSubUnit">
							<span class="hide-menu">
								Add New
							</span>
						</a>
					</div>
					<div class="collapse" id="collapseSubUnit">
						<div class="card card-body">
						<form action="<?php base_url('admin/subunit/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="Sub_unit">Sub Unit</label>
								<input class="form-control <?php echo form_error('sub_unit') ? 'is-invalid':'' ?>"
								type="text" name="sub_unit" placeholder="Sub Unit" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
						</div>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Jenis Pekerjaan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($jenis_pekerjaan as $jp): ?>
									<tr>
										<td width="150">
											<?php echo $jp->id_jenis ?>
										</td>
										<td>
											<?php echo $jp->sub_unit ?>
										</td>
										<td>
											<a href="<?php echo site_url('admin/subunit/edit/'.$jp->id_jenis) ?>"
												class="btn btn-outline-warning">
												<i class="fa fa-edit"></i>
												Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/subunit/delete/'.$jp->id_jenis) ?>')"
												href="#!" class="btn btn-outline-danger">
												<i class="fa fa-trash"></i>
												Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('admin/_partials/js.php'); ?>
</body>

</html>
