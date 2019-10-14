<html>

<head>
	<title>Dashboard</title>
</head>

<body>
	<center>
		<h2>SELAMAT DATANG ANDA TELAH BERHASIL LOGIN SEBAGAI MEMBER</h2>
		<h3> Username Anda Adalah <?php echo $this->session->userdata('username'); ?></h3><br /><br />
		<a href="<?php echo site_url('authentication/auth/logout'); ?>">Keluar</a>
	</center>
</body>

</html>
