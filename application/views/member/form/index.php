<div class="container-fluid">
    <div class="table-responsive">
        <div class="text-center mt-3">
            <h1 class="mb-3"><b>Ajuan Lembur</b></h1>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

        <?php if( $this->session->flashdata('message') ) : ?>
        <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>berhasil!</strong> <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->
        <?php endif; ?>

        <div class="text-left">
            <a class="btn btn-outline-primary mb-4" href="<?= site_url('member/form/tambah'); ?>">
            <b>Tambah <i class="fas fa-fw fa-feather-alt"></i></b></a>
        </div>
        <table class="table table-hover form">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Unit Kerja</th>
                    <th>Sub Unit</th>
                    <th>Status</th>
                    <th>Pegawai</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; 
                foreach
                ($ajuan->result() as $lembur) { ?>
                <tr class="text-capitalize">
                    <td><?= $no++ ?></td>
                    <td><?= $lembur->tanggal ?></td>
                    <td><?= $lembur->unit_kerja ?></td>
                    <td><?= $lembur->sub_unit ?></td>
                    <td>
                    <?php if ($lembur->status == 0) { echo '<h5><i class="badge badge-primary col-10">
                        PROSES <i class="fas fa-fw fa-retweet"></i></i></h5>';
                    } elseif ($lembur->status == 1) { echo '<h5><i class="badge badge-success col-10">
                        DI SETUJUI <i class="fas fa-fw fa-user-check"></i></i></h5>';
                    } elseif ($lembur->status == 2) { echo '<h5><i class="badge badge-danger col-10">
                        DI TOLAK <i class="fas fa-fw fa-user-times"></i></i></h5>';
                    } elseif ($lembur->status == 3) { echo '<h5><i class="badge badge-secondary col-10">
                        DI REVISI <i class="fas fa-fw fa-cog"></i></i></h5>';
                    } ?>
                    </td>
                    <td><span><?= $lembur->pgw ?> 
                    Pegawai</span></td>
                    <td>
                        <div class="text-center">
                        <button type="button" class="btn col-5 btn-sm btn-info update-record" 
                        data-id_form_ajuan="<?= $lembur->id_form_ajuan; ?>">
                            Edit 
                        <i class="fas fa-fw fa-tools"></i></button>
                        <a href="<?= site_url('member/form/detail/'); ?><?= $lembur->id_form_ajuan; ?>" 
                        type="button" class="btn col-5 btn-sm btn-dark">Detail <i class="fas fa-fw fa-user-tag"></i></a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

