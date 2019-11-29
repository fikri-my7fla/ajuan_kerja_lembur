<!-- Main content -->
<div class="content-wrapper">
    
    <?php foreach ($detail_sub as $dtl) { ?>
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4 class="mr-1"><a data-toggle="tooltip" title="Data Sub Unit" class="text-dark" href="<?= site_url('member/sub_unit'); ?>"><i class="icon-arrow-left52 mr-2"></i></a> 
                <span class="font-weight-semibold">
                Data</span> - Data Sub Unit</h4><span class="text-black-50 ml-1 ml-md-0"> (Detail)</span>
                <a href="#" class="header-elements-toggle text-default d-md-none">
            </div>

            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb ml-auto">
                        <a href="<?= site_url('member/member'); ?>" class="breadcrumb-item mr-2" data-toggle="tooltip"
                        title="Dashboard" data-placement="bottom"><i class="icon-home2 mr-2"></i> Home</a>
                        <div class="breadcrumb-item dropdown no-arrow p-0">
                            <a href="#" class="breadcrumb-item dropdown-toggle" data-toggle="dropdown">
                                Data
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="<?= site_url('member/sub_unit'); ?>" class="dropdown-item"><i class="icon-book"></i> Data Sub Unit</a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= site_url('member/pegawai'); ?>" class="dropdown-item"><i class="icon-users4"></i> Data Pegawai</a>
                            </div>
                        </div>
                        <a href="<?= site_url('member/sub_unit'); ?>" class="breadcrumb-item" data-toggle="tooltip"
                        title="Data Sub Unit" data-placement="bottom">Data Sub Unit</a>
                        <span class="breadcrumb-item active text-capitalize">Detail Subbagian <?= $dtl->sub_unit; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

    <!-- Collapsable Card Pegawai -->
    <div class="card mt-3 mr-3">
        <!-- Collapse Card Header - Pegawai Subbagian ... -->
        <a href="#detailsubbagian" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="detailsubbagian">
            <h6 class="m-0 font-weight-bold text-dark text-uppercase">Pegawai Subbagian <?= $dtl->sub_unit; ?></h6>
        </a>
        <?php } ?>
        <!-- Collapse Card Content - Daftar Pegawai -->
        <div class="collapse show" id="detailsubbagian">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col">
                        <strong>Nip</strong>
                    </div>
                    <div class="col">
                        <strong>Nama Pegawai</strong>
                    </div>
                </div>

            <?php foreach ($detail_pegawai as $dtl_pgw) : ?>
                <div class="row">
                    <div class="col">
                        <?= $dtl_pgw->nip; ?>
                    </div>
                    <div class="col">
                        <?= $dtl_pgw->nama_pegawai; ?>
                    </div>
                </div>
                <hr>
            <?php endforeach ; ?>
            </div>

    <div class="text-center mb-3">
    <a href="<?= base_url('member/sub_unit'); ?>" class="btn btn-circle btn-outline-dark" data-toggle="tooltip" 
    title="Kembali" data-placement="bottom"><i class="text-right icon-undo2"></i></a>
    </div>

    </div>

    </div>

    </div>
    <!-- /content area -->


			