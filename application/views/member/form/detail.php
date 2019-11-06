<div class="container-fluid mt-4 mx-3">
    

<div class="container-fluid">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?php if( $this->session->flashdata('message') ) : ?>
        <!-- <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
            Data <strong>berhasil!</strong> <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->
    <?php endif; ?>

    <div class="card shadow">
    
    <?php foreach($form_ajuan_lembur as $form) : ?>
    <div class="card-header mt-2">
            <img src="<?= base_url('assets/members/img/'); ?>/logo.png" 
            alt="" srcset="" width="105" height="105" style="float:left">
            <h1><b style="padding-left: 10px">Lembaga Ilmu Pengetahuan Indonesia</b></h1>
            <hr width="78%">
            <h5><b style="padding-left: 10px">INDONESIAN INSTITUTE OF SCIENCE</b></h5>
    </div>

    <div class="card-body text-capitalize">
        <div class="container-fluid">
            <div class="text-center"><h4 class="mb-3"><u>Detail Ajuan Lembur</u></h4></div>
        <p class="card-text"><b>Tanggal </b><span style="padding-left:34px"><b> : </b></span>
            <span style="padding-left:20px"><?= $form->tanggal; ?></span></p>

        <p class="card-text"><b>Unit Kerja </b><span style="padding-left:20px"><b> : </b></span>
            <span style="padding-left:20px"><?= $form->unit_kerja; ?></span></p>

        <p class="card-text"><b>Sub Unit </b><span style="padding-left:29px"><b> : </b></span>
            <span style="padding-left:20px"> <?= $form->sub_unit; ?></span></p>

        <p class="card-text"><b>Hasil </b><span style="padding-left: 57px"><b> : </b></span>
            <span style="padding-left:20px"> <?= $form->hasil; ?></span></p>

        <p class="card-text"><b>Alasan </b><span style="padding-left: 44px"><b> : </b></span>
            <span style="padding-left:20px"> <?= $form->alasan; ?></span></p>

        <p class="card-text"><b>Status </b><span style="padding-left: 46px"><b> : </b></span>
            <?php if ($form->status == 0) { echo '<span style="padding-left:20px"> 
                Proses Persetujuan</span>';
            } elseif ($form->status == 1) { echo '<span style="padding-left:20px">
                Di Setujui</span>';
            } elseif ($form->status == 2) { echo '<span style="padding-left:20px">
                Di Tolak</span>';
            } elseif ($form->status == 3) { echo '<span style="padding-left:20px">
                Di Revisi</span>';
            } ?>
        </p>
    
        <p class="card-text"><b>Pegawai </b>
        <?php foreach($pgw as $pgw) : ?>
            <div class="row">
            <span style="padding-left:30px"><i class="fas fa-fw fa-hand-point-right"></i>
            <span style="padding-left:15px"><?= $pgw->nama_pegawai; ?></span></span></div></p>
        <?php endforeach ; ?>
        </div>
    </div>
    <?php endforeach ; ?>
        
        <div class="card-footer">
            <div class="text-right">
                <button type="button" class="btn col-3 btn-outline-info ubah-record" 
                        data-id_form_ajuan="<?= $form->id_form_ajuan; ?>">
                            Edit 
                        <i class="fas fa-fw fa-tools"></i></button>
                <a class="btn btn-outline-info col-3" href="<?= base_url('member/form') ?>">
                Kembali <i class="fas fa-fw fa-reply"></i></a>
            </div>
        </div>

    </div>

    </div>

    <div id="signArea" >
        <h2 class="tag-ingo">Put signature below,</h2>
        <div class="sig sigWrapper" style="height:auto;">
            <div class="typed"></div>
            <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
        </div>
    </div>

    <button id="btnSaveSign">Save Signature</button>
		
		<div class="sign-container">
		<?php
		$image_list = glob("./doc_signs/*.png");
		foreach($image_list as $image){
			//echo $image;
		?>
		<img src="<?php echo $image; ?>" class="sign-preview" />
		<?php
		
		}
		?>
    </div>

    <button id="removeSignature">Remove</button>

</div>

<!-- Modal Ubah Halaman Detail -->
<form action="<?= site_url('member/form/ubah'); ?>" method="POST">
    <div class="modal zoomInLeft animated" id="ubahModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Ajuan Lembur</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <label><b>Pegawai:</b></label>
            <select name="pegawai_edit[]" class="bootstrap-select strings form-control" data-live-search="true" 
            multiple required>
                <?php foreach($pegawai as $pgw) : ?>
                    <option value="<?= $pgw->id_data_pegawai?>"><?= $pgw->nama_pegawai; ?></option>
                <?php endforeach; ?>
            </select>
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