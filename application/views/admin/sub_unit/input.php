<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<center>
		<h3>Tambah data baru</h3>
	</center>
	<form action="<?php echo base_url(). 'admin/subunit/tambah_aksi'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<label for="sub_unit">Jenis Pekerjaan</label>
				<td><input type="text" name="Sub_unit"></td>
			</tr>
		</table>
	</form>	
</body>
</html>