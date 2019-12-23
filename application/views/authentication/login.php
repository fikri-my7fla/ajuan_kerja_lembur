<html>

<head>
	<title>Log in</title>
	<?php $this->load->view("authentication/_partials/head.php") ?>
	<link rel="stylesheet" href="<?= base_url('assets/package/dist/sweetalert2.min.css'); ?>" />
</head>

<body>
	<div class="main-wrapper">
		<div class="flash_data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>
		<div class="flash_error" data-flasherr="<?= $this->session->flashdata('error');?>"></div>
		<div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-lg-6 col-xlg-2">
						<div class="auth-box bg-dark border-top border-secondary">
							<div class="card text-center">
								<div class="card-body bg-light">
									<span class="db"><img src="<?= base_url('assets/Logo.png') ?>" width="20%"
											alt="logo" /></span>
									<h2>Aplikasi Web</h2>
									<h3>Pengajuan Kerja Lembur</h3>
									<a href="<?= base_url('authentication/direct_form/tambah')?>"><u>
											<code class="text-info">Direct Form Ajuan</code></u></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xlg-2">
						<div class="auth-box bg-dark border-top border-secondary">
							<div id="loginform">
								<form class="form-horizontal" method="post"
									action="<?php echo site_url('authentication/auth/login'); ?>" role="login"
									class="form">
									<?php if(isset($error)){ echo '<script>alert("'.$error.'");</script>'; } ?>
									<div class="row">
										<div class="col-12">
											<label for="username">Username</label>
											<div class="input-group mb-1">
												<div class="input-group-prepend">
													<span class="input-group-text bg-success text-white"
														id="basic-addon1"><i class="ti-user"></i></span>
												</div>
												<input type="text" class="form-control " name="username"
													placeholder="Username" aria-label="Username"
													aria-describedby="basic-addon1" required />
											</div>
											<label for="password">Password</label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-warning text-white"
														id="basic-addon2"><i class="ti-pencil"></i></span>
												</div>
												<input type="password" class="form-control " name="password"
													placeholder="Password" autocomplete="on" aria-label="Password"
													aria-describedby="basic-addon1" required />
											</div>
											<?php echo $this->recaptcha->getWidget(); ?><br>
										</div>
									</div>
									<div class="border-top border-secondary">
										<div class="">
											<div class="form-group">
												<button id="submit-btn" type="submit" name="submit"
													class="btn btn-success float-right" value="login"
													disabled>Masuk</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view("authentication/_partials/js.php") ?>
	<?= $this->recaptcha->getScriptTag();?>
	<script src="<?= base_url('assets/package/dist/sweetalert2.all.min.js'); ?>"></script>
	<script>
		function recaptchaCallback() {
			$('#submit-btn').removeAttr('disabled');
		};
		const flasherror = $('.flash_error').data('flasherr');
		if (flasherror) {
			swal.fire({
				title: 'Failed',
				text: flasherror,
				type: 'error'
			})
		}
		const flashData = $('.flash_data').data('flashdata');
		if (flashData) {
			swal.fire({
				title: 'Berhasil',
				text: flashData,
				type: 'success'
			})
		}

	</script>
</body>

</html>
