<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a class="text-dark" href="<?= site_url('member/form'); ?>" data-toggle="tooltip" 
            title="Ajuan Lembur">
            <i class="icon-arrow-left52 mr-2"></i></a> <span class="font-weight-semibold">
            Detail</span> - Ajuan Lembur</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none">
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb ml-auto">
                    <a href="<?= site_url('member/member'); ?>" class="breadcrumb-item mr-2" data-toggle="tooltip"
                    title="Dashboard" data-placement="bottom">
                    <i class="icon-home2 mr-2"></i> Home</a>
                    <div class="breadcrumb-item dropdown no-arrow p-0">
                        <a href="#" class="breadcrumb-item dropdown-toggle" data-toggle="dropdown">
                            Ajuan Lembur
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= site_url('member/form/tambah'); ?>" class="dropdown-item"><i class="icon-quill4"></i> Tambah Ajuan Lembur</a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('member/form') ?>" class="dropdown-item"><i class="icon-list2"></i> Daftar Ajuan Lembur</a>
                        </div>
                    </div>
                    <a href="<?= site_url('member/form'); ?>" class="breadcrumb-item" data-toggle="tooltip"
                    title="Daftar Ajuan Lembur" data-placement="bottom">Daftar Ajuan Lembur</a>
                    <span class="breadcrumb-item active">Detail Ajuan Lembur</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->


    <!-- Content area -->
    <div class="content">

    <!-- Untuk Memanggil Flashdata SweetAlert -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="text-right">
    <a href="<?= base_url('member/form'); ?>"><i class="text-dark icon-undo2" data-toggle="tooltip"
    title="Kembali" data-placement="bottom"></i></a>
    </div>

    <!-- Card - Detail Ajuan Lembur -->
    <div class="card mt-4 shadow">
    
    <!-- Card Header - Detail Ajuan Lembur -->
    <?php foreach($form_ajuan_lembur as $form) : ?>
    <div class="card-header mt-2">
            
        <img src="<?= base_url('assets/members/img/'); ?>/logo.png" alt="" srcset="" width="100" height="100" 
            style="float:left">
        <h2 class="mt-2">
            <b><u>Lembaga Ilmu Pengetahuan Indonesia</u></b>
        </h2>

        <h5><b>INDONESIAN INSTITUTE OF SCIENCE</b></h5>
    </div>

    <hr>

    <!-- Card Body - Detail Ajuan Lembur -->
    <div class="card-body text-capitalize">
        <div class="container-fluid">
        
        <div class="row mb-1">
            <div class="col">
                <p class="card-text"><b>Tanggal</b></p>
            </div>

            <div class="col">
                <p class="card-text"><?= $form->tanggal; ?></p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <p class="card-text"><b>Unit Pekerjaan</b></p>
            </div>

            <div class="col">
                <p class="card-text"><?= $form->unit_kerja; ?></p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <p class="card-text"><b>Sub Unit</b></p>
            </div>

            <div class="col">
                <p class="card-text"><?= $form->sub_unit; ?></p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <p class="card-text"><b>Hasil Pekerjaan</b></p>
            </div>

            <div class="col">
                <p class="card-text"><?= $form->hasil; ?></p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <p class="card-text"><b>Alasan Dikerjakan Lembur</b></p>
            </div>

            <div class="col">
                <p class="card-text"><?= $form->alasan; ?></p>
            </div>
        </div>
    
        <div class="row mb-1">
            <div class="col">
                <p class="card-text"><b>Pengusul Ajuan Lembur</b></p>
            </div>

            <div class="col">
                <p class="card-text"><?= $form->pengusul; ?></p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <p class="card-text"><b>Status Pengajuan Lembur</b></p>
            </div>
            <div class="col mb-2">
                <?php if ($form->status == 1) { echo '<i>Proses Persetujuan
                    <i class="icon-spinner"></i></i>';
                } elseif ($form->status == 2) { echo '<i>Di Setujui 
                    <i class="icon-checkmark-circle2 ml-1"></i></i>';
                } elseif ($form->status == 3) { echo '<i>Di Tolak 
                    <i class="icon-close2 ml-1"></i></i>';
                } elseif ($form->status == 4) { echo '<i>Di Revisi 
                    <i class="icon-cog2 ml-1"></i></i>';
                } ?>
            </div>
        </div>

        <!-- Collapsable Card Pegawai Ajuan Lembur -->
        <div class="card mb-4">

            <!-- Collapse Card Header - Pegawai Yang Lembur -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" 
            aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-gray-600">Pegawai Yang Lembur</h6>
            </a>

            <!-- Collapse Card Content - Collapse Nama Pegawai -->
            <div class="collapse show" id="collapseCardExample">
            <?php foreach($pgw as $pgw) { ?>
                <div class="card-body">
                <span><strong><i class="fas fa-fw fa-arrow-alt-circle-right"></i> <?= $pgw->nama_pegawai; ?></strong>
                <a class="float-right text-black-50"><i><?= $pgw->sub_unit; ?></i></a></span>
                </div>
            <?php } ?>
            </div>
            <?php endforeach ; ?>

        </div>

        <br/>

        <!-- signature -->
        <div>
            <div class="row">

                <div class="col">
                    <div class="text-center">
                        <h6>Pejabat Pembuat Komitmen</h6>
                        <!-- signature 1 -->
                        <div>
                            <?php foreach ($sign1->result() as $view) { ?>
                            <div class="previewsign">
                                <img src="<?= $view->sign; ?>" alt="">
                            </div>
                            <div>
                                <div class="typed"><i><?= $view->nama_pegawai;?></i></div>
                            </div>
                            <?php }?>
                        </div>
                        <!-- end sign1 -->
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($form_ajuan_lembur as $ajuan) { ?>
        <?php if( $ajuan->status == 4) {
        echo "<hr><div class='text-right'>
              <button type='button' class='btn btn-primary ubah-record' data-id_form_ajuan='". $ajuan->id_form_ajuan ."'>
              Edit Ajuan Lembur<i class='fas fa-fw fa-tools'></i></button>
              </div>"; } ?>
        <?php } ?>

    </div>

        </div>
        </div>

			</div>
            <!-- /content area -->
            
<!-- Modal Ubah Halaman Detail -->
<form action="<?= site_url('member/form/ubah'); ?>" method="POST">
    <div class="modal bounceIn animated" id="ubahModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Ajuan Lembur</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

        <?php foreach($form_ajuan_lembur as $form) : ?>

        <div class="form-group row">
        <label class="col-4 col-form-label"><b>Tanggal</b></label>
            <div class="col-sm">
            <input type="text" class="form-control" placeholder="<?= $form->tanggal; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-4 col-form-label"><b>Unit Pekerjaan</b></label>
            <div class="col-sm">
            <input type="text" class="form-control" placeholder="<?= $form->unit_kerja; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-4 col-form-label"><b>Sub Unit</b></label>
            <div class="col-sm">
            <input type="text" class="form-control" placeholder="<?= $form->sub_unit; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-4 col-form-label"><b>Hasil Pekerjaan</b></label>
            <div class="col-sm">
            <input type="text" class="form-control" placeholder="<?= $form->hasil; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-4 col-form-label"><b>Alasan Lembur</b></label>
            <div class="col-sm">
            <input type="text" class="form-control" placeholder="<?= $form->alasan; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
        <label class="col-4 col-form-label"><b>Pengusul</b></label>
            <div class="col-sm">
            <input type="text" class="form-control" placeholder="<?= $form->pengusul; ?>" readonly>
            </div>
        </div>

        <?php endforeach ; ?>
            
        <div class="form-group row">
        <label class="col-4 col-form-label"><b>Pegawai Lembur</b></label>
            <div class="col-sm-8">
            <select name="pegawai_edit[]" class="bootstrap-select strings form-control" data-live-search="true"
            multiple required>
                <?php foreach($pegawai as $pgw) : ?>
                    <option value="<?= $pgw->id_data_pegawai; ?>"><?= $pgw->nama_pegawai; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>

        <!-- Order options -->
        <!-- <div class="mb-4">
            <div class="input-group">
                <select name="pegawai_edit[]" class="form-control multiselect-order-options" multiple="multiple" data-fouc>
                    <option value="kejo">Cheese</option>
                    <option value="tomatoes">Tomatoes</option>
                    <option value="mozarella">Mozzarella</option>
                    <option value="mushrooms">Mushrooms</option>
                    <option value="pepperoni">Pepperoni</option>
                    <option value="onions">Onions</option>
                </select>
                <div class="input-group-append">
                    <button type="button" class="btn bg-blue multiselect-order-options-button">Order</button>
                </div>
            </div>
        </div> -->
        <!-- /order options -->

        <font size="3" face="Times New Roman"><b><i class="icon-warning22"></i> 
        </b><u>Karena anda adalah member anda hanya mempunyai akses untuk mengubah pegawai yang lembur</u></font>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <input type="hidden" name="edit_id" id="edit_id" required>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close 
            <i class="fas fa-times-circle"></i></button>
            <button type="submit" class="btn btn-success">Update <i class="fas fa-fw fa-check-circle"></i></button>
        </div>

        </div>
    </div>
    </div>
</form>

<!-- modal signature -->
<form class="was-validated" action="" method="post" id="signature-pad">
    <div class="modal zoomIn animated" id="sign-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" id="signature-pad">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fa fa-pencil"></i> Add Signature</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div id="signature-pad" class="signature-pad">
						<div class="signature-pad--body">
							<canvas id="canvas" width="470" height="318"></canvas>
						</div>
                        
                        <label><b>Nama :</b></label>
                        <input type="text" class="form-control" name="signname" id="signname" value=""
                        placeholder="Masukkan Nama..." required autocomplete="off">
                        <!--Signature Values-->
                        <input type="hidden" id="rowno" name="rowno" value="<?php echo rand();?>">

                        <?php foreach($form_ajuan_lembur as $form) : ?>
                        <input type="hidden" id="form_id" name="form_id" value="<?= $form->id_form_ajuan; ?>">
                        <?php endforeach ; ?>

                        <input type="hidden" id="append" name="append" value="">
					</div>

					<div class="modal-footer">
						<div class="signature-pad--footer">
							<div class="description"></div>
							<div class="signature-pad--actions">

								<div>
									<button type="button" id="save2" class="button" data-action="save">
										<!-- <i class="fa fa-check"></i> -->
										Save</button>
									<button type="button" class="button" data-action="clear">Clear</button>
									<button type="button" class="button" data-action="undo">Undo</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
    </div>
</form>