<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
	<title>Dashboard Admin</title>
</head>

<body id="page-top">
	<?php $this->load->view('admin/_partials/nav.php') ?>
	<?php $this->load->view('admin/_partials/sidebar.php') ?>
	<div id="wrapper">
		<div id="content-wrapper">
			<div class="container-fluid">
				<center>
					<h2>SELAMAT DATANG ANDA TELAH BERHASIL LOGIN SEBAGAI Admin</h2>
					<h3> Username Anda Adalah <?php echo $this->session->userdata('username'); ?></h3><br /><br />
					<a href="<?php echo site_url('authentication/auth/logout'); ?>">Keluar</a>
				</center>
			</div>
		</div>
	</div>
	<?php $this->load->view("admin/_partials/js.php") ?>
</body>

</html>
