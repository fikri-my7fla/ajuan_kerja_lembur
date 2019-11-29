<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><a class="text-dark" href="<?= site_url('member/member'); ?>">
			<i class="icon-arrow-left52 mr-2" data-toggle="tooltip" title="Dashboard"></i></a> 
			<span class="font-weight-semibold">Data</span> - Data Pegawai</h4>
			<a href="#" class="header-elements-toggle text-default d-md-none">
		</div>

		<!-- Breadcrumbs -->
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb ml-auto">
					<a data-toggle="tooltip" title="Dashboard" data-placement="bottom" 
					href="<?= site_url('member/member') ?>" class="breadcrumb-item mr-2">
					<i class="icon-home2 mr-2"></i> Home</a>
					<div class="breadcrumb-item dropdown no-arrow p-0">
						<a href="#" class="breadcrumb-item dropdown-toggle" data-toggle="dropdown">
							Data
						</a>

						<div class="dropdown-menu dropdown-menu-right">
							<a href="<?= site_url('member/sub_unit'); ?>" class="dropdown-item">
							<i class="icon-book"></i> Data Sub Unit</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item active"><i class="icon-users4"></i> Data Pegawai</a>
						</div>
					</div>
					<span class="breadcrumb-item active">Data Pegawai</span>
				</div>
			</div>
		</div>
		<!-- /Breadcrumbs -->
	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

	<!-- Table - Pegawai -->
	<div class="table-responsive">
		<table class="table table-hover nowrap compact" id="Table" style="width:100%">
			<thead>
				<tr>
					<th data-toggle="tooltip" title="Drag this column">No</th>
					<th>Nip</th>
					<th>Nama Pegawai</th>
					<th>Sub Unit</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; 
				foreach($unit as $row) { ?>
				<tr class="text-capitalize">
					<td><?= $no++ ?></td>
					<td><?= $row->nip; ?></td>
					<td><?= $row->nama_pegawai; ?></td>
					<td><?= $row->sub_unit; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<!-- /Table - Pegawai -->

</div>
<!-- /content area -->