<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="page-header-content header-elements-md-inline">
			<div class="page-title d-flex">
				<h4><a class="text-dark" href="<?= site_url('member/member'); ?>" data-toggle="tooltip"
						title="Dashboard"><i class="icon-arrow-left52 mr-2"></i></a>
					<span class="font-weight-semibold">Absen</span> - Lembur</h4>
				<a href="#" class="header-elements-toggle text-default d-md-none">
			</div>

			<!-- Breadcrumbs -->
			<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
				<div class="d-flex">
					<div class="breadcrumb ml-auto">
						<a href="<?= site_url('member/member'); ?>" class="breadcrumb-item mr-2" data-toggle="tooltip"
							title="Dashboard" data-placement="bottom"><i class="icon-home2 mr-2"></i> Home</a>
						<span class="breadcrumb-item active">Absen Lembur</span>
					</div>
				</div>
			</div>
			<!-- /Breadcrumbs -->
		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content">
		<style>
			.previewsignx {
				height: 100px;
				width: 100px;
			}

			.previewsignx img {
				max-height: 100%;
			}

		</style>
		<table class="table table-hover" id="Table" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pegawai</th>
					<th>Jam Datang</th>
					<th>Jam Pulang</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
            foreach($absen_lembur->result() as $absen) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $absen->nama_pegawai; ?></td>
					<td><?= $absen->jam_datang; ?></td>
					<td><?= $absen->jam_pulang; ?></td>
					<?php if ($absen->id_sign == 0) { ?>
					<td>
						<?php if($absen->user_id == $this->session->userdata('id_user')){?>
						<a class="btn btn-secondary btn-rounded btn-sm text-light" type="" id="signabsen"
							data-absen_id="<?= $absen->id_absen?>" data-form_id="<?= $absen->form_id?>"><span
								class="fa fa-pencil-alt"></span>Ttd</a>
						<?php }?>
					</td>
					<?php } else {?>
					<td class="previewsignx">
						<img src="<?= $absen->sign?>" alt="">
						<i class="font-10">datetime: <?= $absen->waktu_sign_absen?></i>
					</td>
					<?php }?>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
    <!-- /content area -->
    
    <!-- modal ttd absen -->

    <div class="modal fade" id="sign-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<form action="" method="post" id="signature-pad">
			<div class="modal-dialog">
				<div class="modal-content" id="signature-pad">
					<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-pencil"></i> Add Signature</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div id="signature-pad" class="signature-pad">
							<div class="signature-pad--body">
								<canvas width="570" height="318"></canvas>
							</div>
							<div class="form-group">
								<?php foreach ($user->result() as $get) { ?>
								<input type="hidden" name="nip_pgw" id="nip_pgw" value="<?= $get->nip?>">
								<input type="hidden" name="jenis_honor" id="jenis_honor" value="<?= $get->id_jenis?>">
								<input type="hidden" name="absen_id" id="absen_id" required>
								<input type="hidden" name="form_honor" id="form_honor" required>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="signature-pad--footer">
							<div class="description">Sign above</div>
							<div class="signature-pad--actions">
								<div>
									<input type="hidden" name="id_sign" id="id_sign" value="">
									<button type="button" id="save2" class="button" data-action="save"
										id="save_upd">Save</button>
									<button type="button" class="button" data-action="clear">Clear</button>
									<button type="button" class="button" data-action="undo">Undo</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
