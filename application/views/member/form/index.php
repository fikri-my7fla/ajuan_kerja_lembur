<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a class="text-dark" href="<?= site_url('member/member'); ?>" data-toggle="tooltip" title="Dashboard">
            <i class="icon-arrow-left52 mr-2"></i></a> <span class="font-weight-semibold">
            Daftar</span> - Ajuan Lembur</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none">
        </div>

        <!-- Breadcrumbs -->
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
                            <a href="<?= site_url('member/form/tambah'); ?>" class="dropdown-item">
                            <i class="icon-quill4"></i> Tambah Ajuan Lembur</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item active"><i class="icon-list2"></i> Daftar Ajuan Lembur</a>
                        </div>
                    </div>
                    <span class="breadcrumb-item active">Daftar Ajuan Lembur</span>
                </div>
            </div>
        </div>
        <!-- /Breadcrumbs -->
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Flashdata SweetAlert -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- /Flashdata SweetAlert -->

    <!-- Button Insert -->
    <a href="<?= site_url('member/form/tambah'); ?>" class="btn btn-sm btn-dark mb-1" data-toggle="tooltip"
    title="Tambah Ajuan Lembur" data-placement="bottom">Tambah <i class="icon-quill4 ml-1"></i></a>
    <!-- /Button Insert -->

    <!-- Table - Ajuan Lembur -->
    <table class="table-hover nowrap" id="Table" style="width:100%">
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
                    <?php if ($lembur->status == 1) { echo '<h5><i class="badge badge-primary col-10">
                        PROSES <i class="icon-spinner ml-1"></i></i></h5>';
                    } elseif ($lembur->status == 2) { echo '<h5><i class="badge badge-success col-10">
                        DI SETUJUI <i class="icon-checkmark-circle2 ml-1"></i></i></h5>';
                    } elseif ($lembur->status == 3) { echo '<h5><i class="badge badge-danger col-10">
                        DI TOLAK <i class="icon-close2 ml-1"></i></i></h5>';
                    } elseif ($lembur->status == 4) { echo '<h5><i class="badge badge-secondary col-10">
                        DI REVISI <i class="icon-cog2 ml-1"></i></i></h5>';
                    } ?>
                </td>
                <td><span><?= $lembur->pgw ?> 
                Pegawai</span></td>
                <td>
                    <div class="text-center">
                    <a href="<?= site_url('member/form/detail/'); ?><?= $lembur->id_form_ajuan; ?>" 
                    type="button" class="btn col-8 btn-sm btn-dark">Detail <i class="icon-zoomin3"></i></a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- /Table - Ajuan Lembur -->

</div>
<!-- /content area -->


