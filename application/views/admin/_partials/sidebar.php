<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav" class="p-t-30">
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
						href="<?= base_url('admin/admin') ?>" aria-expanded="false"><i
							class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
				</li>
				<li class="sidebar-item">
					<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
						aria-expanded="false">
						<i class="mdi mdi-bulletin-board"></i>
						<span class="hide-menu">Data </span>
					</a>
					<ul aria-expanded="false" class="collapse  first-level">
						<li class="sidebar-item"> <a class="sidebar-link waves-effect "
								href="<?= base_url('admin/subunit/index'); ?>" aria-expanded="false"><i
									class="mdi mdi-chart-bar"></i><span class="hide-menu">Data Jenis Pekerjaan</span></a>
						</li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect "
								href="<?= base_url('admin/pegawai/index'); ?>" aria-expanded="false"><i
									class="mdi mdi-face"></i><span class="hide-menu">Data Pegawai</span></a>
						</li>
					</ul>
				</li>
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
						href="<?= base_url('admin/form/index'); ?>" aria-expanded="false"><i
							class="mdi mdi-receipt"></i><span class="hide-menu">Ajuan Lembur</span></a>
				</li>
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
						href="<?= base_url('admin/absen/index');?>" aria-expanded="false"><i
							class="mdi mdi-calendar-check"></i><span class="hide-menu">Absen Lembur</span></a>
				</li>
				<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
						href="<?= base_url('admin/honor/index');?>" aria-expanded="false"><i
							class="mdi mdi-relative-scale"></i><span class="hide-menu">Daftar Honor</span></a>
				</li>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
