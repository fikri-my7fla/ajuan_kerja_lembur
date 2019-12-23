<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="<?= site_url('member/member'); ?>" class="d-inline-block">
				<img src="<?= base_url('assets/members/'); ?>global_assets/images/logo_brand.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">

			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
				
			</ul>

			<ul class="navbar-nav ml-auto">

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<span><?= $this->session->userdata('username'); ?> | <i><?= $this->session->userdata('type'); ?></i></span>
					</a>

					<?php date_default_timezone_set("Asia/Jakarta");
	
					function tglIndonesia($str){
						$tr   = trim($str);
						$str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 
						'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 
						'November', 'December'), 
						array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 
						'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), 
						$tr);
						return $str;
					} ?>

					<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item"><i class="icon-calendar"></i> <?= tglIndonesia(date('D, d F Y')); ?></a>
					<div class="dropdown-divider"></div>
					<a href="<?= base_url('authentication/auth/changePassword')?>" class="dropdown-item"><i class="icon-switch2">Change Pass</i></a>
            <a href="<?= site_url('authentication/auth/logout'); ?>" class="dropdown-item tombol-logout">
            <i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->