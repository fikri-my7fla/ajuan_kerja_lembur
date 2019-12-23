<html>

<head>
	<title>Log in</title>
	<?php $this->load->view("authentication/_partials/head.php") ?>
	<link rel="stylesheet" href="<?= base_url('assets/package/dist/sweetalert2.min.css'); ?>" />
</head>

<body>
	<div class="main-wrapper">
		<div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
			<div class="container">

				<div class="row justify-content-center">
					<div class="col-6">
						<h1 class="text-light"><?php echo $title ?></h1>
						<?php echo form_open('authentication/auth/changePassword', array('id' => 'passwordForm'))?>
						<div class="form-group">
							<input type="password" name="oldpass" id="oldpass" class="form-control"
								placeholder="Old Password" />
							<?php echo form_error('oldpass', '<div class="error">', '</div>')?>
						</div>
						<div class="form-group">
							<input type="password" name="newpass" id="newpass" class="form-control"
								placeholder="New Password" />
							<?php echo form_error('newpass', '<div class="error">', '</div>')?>
						</div>
						<div class="form-group">
							<input type="password" name="passconf" id="passconf" class="form-control"
								placeholder="Confirm Password" />
							<?php echo form_error('passconf', '<div class="error">', '</div>')?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Change Password</button>
						</div>
						<?php echo form_close(); ?>
			<div class="close"><a class="text-warning" href="<?= base_url()?>">Back</a></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php $this->load->view("authentication/_partials/js.php") ?>
	<?= $this->recaptcha->getScriptTag();?>
	<script src="<?= base_url('assets/package/dist/sweetalert2.all.min.js'); ?>"></script>
</body>

</html>
