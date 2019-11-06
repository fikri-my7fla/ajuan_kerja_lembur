<html>

<head>
	<title></title>
</head>

<!-- /.container-fluid -->
<div class="container-fluid my-5">
	<br/><br/>
	<br/><br/>
	
	<?php
	
	$user = $this->session->userdata('username');

		date_default_timezone_set("Asia/Jakarta");

		$b = time();
		$hour = date("G",$b);
		
		if ($hour >=0 &&  $hour<=3)
		{
			echo '<h2 class="card-body text-capitalize"><b>selamat malam '.$user.' '.'<i class="fas fa-fw fa-lg fa-laugh-wink fa-flip-horizontal"></i>'.'</b></h2>';
		}
		elseif ($hour>=4 && $hour<=9)
		{
			echo '<h2 class="card-body text-capitalize"><b>selamat pagi '.$user.' '.'<i class="fas fa-fw fa-lg fa-laugh-wink fa-flip-horizontal"></i>'.'</b></h2>';
		}
		elseif ($hour >=10 && $hour<=14)
		{
			echo '<h2 class="card-body text-capitalize"><b>selamat siang '.$user.' '.'<i class="fas fa-fw fa-lg fa-laugh-wink fa-flip-horizontal"></i>'.'</b></h2>';
		}
		elseif ($hour >=15 && $hour<=16)
		{
			echo '<h2 class="card-body text-capitalize"><b>selamat sore '.$user.' '.'<i class="fas fa-fw fa-lg fa-laugh-wink fa-flip-horizontal"></i>'.'</b></h2>';
		}
		elseif ($hour >=17 && $hour<=18)
		{
			echo '<h2 class="card-body text-capitalize"><b>selamat petang '.$user.' '.'<i class="fas fa-fw fa-lg fa-laugh-wink fa-flip-horizontal"></i>'.'</b></h2>';
		}
		elseif ($hour >=19 && $hour<=23)
		{
			echo '<h2 class="card-body text-capitalize"><b>selamat malam '.$user.' '.'<i class="fas fa-fw fa-lg fa-laugh-wink fa-flip-horizontal"></i>'.'</b></h2>';
		}
		
		?>
<h3 class="mx-4">SELAMAT DATANG DI APLIKASI AJUAN KERJA LEMBUR</h3>
<h4 class="mx-4 text-gray-500 mb-5 text-capitalize">anda telah login sebagai <b><?= $this->session->userdata('type'); ?></b>, dengan username <b><?= $this->session->userdata('username'); ?></b></h4>
</div>
<!-- End of Main Content -->
