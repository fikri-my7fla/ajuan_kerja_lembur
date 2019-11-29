


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a><i class="rounded-circle icon-user"></i></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold"><?= $this->session->userdata('nickname'); ?></div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm"></i> &nbsp;Indonesia
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item">
							<a href="<?= site_url('member/member'); ?>" data-toggle="tooltip" title="Dashboard"
							data-placement="right" 
							<?php if($title == "Beranda") { echo "class='nav-link active'"; 
							} else { echo "class='nav-link'"; } ?>>
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						
						<li <?php if($title == "Sub Unit") { echo "class='nav-item nav-item-submenu nav-item-expanded nav-item-open'"; 
						} elseif ($title == "Detail Unit Kerja") { echo "class='nav-item nav-item-submenu nav-item-expanded nav-item-open'"; 
						} elseif ($title == "Data Pegawai") { echo "class='nav-item nav-item-submenu nav-item-expanded nav-item-open'"; 
						} else { echo "class='nav-item nav-item-submenu'"; } ?>>
							<a href="#" class="nav-link"><i class="icon-book3"></i> <span>Data</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Data">
								<li class="nav-item"><a href="<?= site_url('member/sub_unit'); ?>"
								<?php if($title == "Sub Unit") { echo "class='nav-link active'"; 
								} elseif($title == "Detail Unit Kerja") { echo "class='nav-link active'"; 
								} else { echo "class='nav-link'"; } ?>>
								<i class="icon-book mr-1"></i>
									Data Sub Unit<?php if($title == "Detail Unit Kerja") { echo 
									"<font class='ml-auto text-primary' size='1'>( Detail )</font>"; } else {} ?>
								</a></li>
								<li class="nav-item"><a href="<?= site_url('member/pegawai'); ?>"
								<?php if($title == "Data Pegawai") { echo "class='nav-link active'"; 
								} else { echo "class='nav-link'"; } ?>>
								<i class="icon-users4 mr-1"></i>
									Data Pegawai
								</a></li>
							</ul>
						</li>

						<li <?php if($title == "Ajuan Lembur") { echo "class='nav-item nav-item-submenu nav-item-expanded nav-item-open'"; 
						} elseif ($title == "Detail Ajuan") { echo "class='nav-item nav-item-submenu nav-item-expanded nav-item-open'"; 
						} elseif ($title == "Tambah Ajuan Lembur") { echo "class='nav-item nav-item-submenu nav-item-expanded nav-item-open'"; 
						} else { echo "class='nav-item nav-item-submenu'"; } ?>>
							<a href="#" class="nav-link"><i class="icon-clipboard3"></i> <span>Ajuan Lembur</span></a>
							
							<ul class="nav nav-group-sub" data-submenu-title="Ajuan Lembur">
							<li class="nav-item"><a href="<?= site_url('member/form/tambah'); ?>"
							<?php if($title == "Tambah Ajuan Lembur") { echo "class='nav-link active'"; 
							} else { echo "class='nav-link'"; } ?>>
							<i class="icon-quill4 mr-1"></i>
									Tambah Ajuan Lembur
								</a></li>
							<li class="nav-item"><a href="<?= site_url('member/form'); ?>"
							<?php if($title == "Ajuan Lembur") { echo "class='nav-link active'"; 
							} elseif ($title == "Detail Ajuan") { echo "class='nav-link active'"; 
							} else { echo "class='nav-link'"; } ?>>
							<i class="icon-list2 mr-1"></i>
									Daftar Ajuan Lembur<?php if($title == "Detail Ajuan") { echo 
									"<font class='ml-auto text-primary' size='1'>( Detail )</font>"; } else {} ?>
								</a></li>
							</ul>
						</li>

						<li class="nav-item" data-toggle="tooltip" title="Absen Lembur" data-placement="right">
							<a href="<?= site_url('member/absen'); ?>" <?php if($title == "Absen Lembur") 
							{ echo "class='nav-link active'"; } else { echo "class='nav-link'"; } ?>>
								<i class="icon-spell-check"></i>
								<span>
									Absen Lembur
								</span>
							</a>
						</li>

						<li class="nav-item" data-toggle="tooltip" title="Daftar Honor" data-placement="right">
							<a href="<?= site_url('member/honor'); ?>" <?php if($title == "Daftar Honor") 
							{ echo "class='nav-link active'"; } else { echo "class='nav-link'"; } ?>>
								<i class="icon-cash2"></i>
								<span>
									Daftar Honor
								</span>
							</a>
						</li>
            
						<li class="nav-item-divider"></li>

						<li class="nav-item">
							<a href="<?= site_url('authentication/auth/logout'); ?>" class="tombol-logout nav-link"
							data-toggle="tooltip" title="Logout"
							data-placement="right">
								<i class="icon-switch2"></i>
								<span>
									Logout
								</span>
							</a>
						</li>

						

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->
