<header class="topbar" data-navbarbg="skin5">
	<nav class="navbar top-navbar navbar-expand-md navbar-dark">
		<div class="navbar-header" data-logobg="skin5">
			<!-- This is for the sidebar toggle which is visible on mobile only -->
			<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
					class="ti-menu ti-close"></i></a>
			<!-- ============================================================== -->
			<!-- Logo -->
			<!-- ============================================================== -->
			<a class="navbar-brand" id="navbar-brand" href="<?= base_url(); ?>">
				<b class="logo-icon p-l-10">
					<img src="<?= base_url('assets/Logo.png') ?>" width="30" alt="homepage" class="light-logo" />
				</b>
				<span class="logo-text">
					<h4 class="text-info p-t-10">AJUAN LEMBUR </h4>
				</span>
			</a>
			<!-- ============================================================== -->
			<!-- End Logo -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Toggle which is visible on mobile only -->
			<!-- ============================================================== -->
			<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
				data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
		</div>
		<!-- ============================================================== -->
		<!-- End Logo -->
		<!-- ============================================================== -->
		<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
			<!-- ============================================================== -->
			<!-- toggle and nav items -->
			<!-- ============================================================== -->
			<ul class="navbar-nav float-left mr-auto">
				<li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light"
						href="javascript:void(0)" data-sidebartype="mini-sidebar"><i
							class="mdi mdi-menu font-24"></i></a></li>
				<!-- ============================================================== -->
				<!-- Search -->
				<!-- ============================================================== -->
				<li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
						href="javascript:void(0)"><i class="ti-search"></i></a>
					<form class="app-search position-absolute">
						<input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i
								class="ti-close"></i></a>
					</form>
				</li>
			</ul>
			<!-- ============================================================== -->
			<!-- Right side toggle and nav items -->
			<!-- ============================================================== -->
			<ul class="navbar-nav float-right">
				<!-- ============================================================== -->
				<!-- User profile and search -->
				<!-- ============================================================== -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
							src="<?= base_url('assets/img/mtrx/users/1.jpg');?>" alt="user" class="rounded-circle"
							width="31"></a>
					<div class="dropdown-menu dropdown-menu-right user-dd animated">
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" data-toggle="modal" data-target="#profilModalCenter"><i
								class="ti-user m-r-5 m-l-5"></i> My
							Profile</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?= base_url('authentication/auth/changePassword')?>"><i
								class="ti-settings m-r-5 m-l-5"></i>
							Account Setting</a>
						<!-- <div class="dropdown-divider"></div> -->
						
						<form action="<?= base_url('authentication/auth/logout')?>" method="post" id="logoutform">
							<input type="hidden" name="form_name" value="logoutform">
							<a class="logoutform_button dropdown-item text-dark" name="logout" value="Logga ut"
								id="logout" /><i class="fa fa-power-off m-r-5 m-l-5"></i>
							Logout</a>
						</form>
						<div class="dropdown-divider"></div>
						<div>
							<footer class="footer text-right">Project By Me :)</footer>
						</div>
					</div>
				</li>
				<!-- ============================================================== -->
				<!-- User profile and search -->
				<!-- ============================================================== -->
			</ul>
		</div>
	</nav>

</header>
<style>
	.close {
		position: absolute;
		top: 15px;
		right: 35px;
		color: #f1f1f1;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}

	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}

</style>
<div class="modal fade" id="profilModalCenter" tabindex="-1" role="dialog" aria-labelledby="profilModalCenterTitle"
	aria-hidden="true">
	<span class="fa fa-times close" data-dismiss="modal"></span>
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<img src="<?= base_url('assets/img/mtrx/users/1.jpg');?>" alt="user" class="img-responsive img-fluid"
				width="">
			<div class="modal-body">

				<div class="">
					<h5 class="card-title" id="profilModalLongTitle">Profil Anda #</h5>
					<div class="clearfix">
						<div class="float-left">
							<div>
								<p class="card-text">
									<i class="far fa-id-badge mr-1"></i>
									Yourname
								</p>
							</div>
							<div>
								<p class="card-text">
									<i class="far fa-user mr-1"></i>
									Username
								</p>
							</div>
							<div>
								<p class="card-text">
									<i class="fas fa-book mr-1"></i>
									Login-by
								</p>
							</div>
						</div>
						<div class="float-right">
							<div>: <?php echo $this->session->userdata('nickname');?></div>
							<div>: <?php echo $this->session->userdata('username');?></div>
							<div>: <?php echo $this->session->userdata('type');?></div>
						</div>
					</div>
				</div>
				<footer class="blockquote-footer mt-3 text-right">
					<a class="" data-dismiss="modal"><i class="fa fa-reply"></i></a>
					<small><cite title="Source Title">Thank's : ) </cite></small>
				</footer>
			</div>
		</div>
	</div>
</div>

<div id="profilEdit" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Modal Header</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
