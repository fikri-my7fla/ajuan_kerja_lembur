<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><a class="text-dark" href="<?= site_url('member/member'); ?>" data-toggle="tooltip" title="Dashboard"><i class="icon-arrow-left52 mr-2"></i></a> 
                <span class="font-weight-semibold">
                Data</span> - Sub Unit</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none">
            </div>

            <!-- Breadcrumbs -->
            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb ml-auto">
                        <a href="<?= site_url('member/member') ?>" class="breadcrumb-item mr-2" data-toggle="tooltip" 
                        title="Dashboard" data-placement="bottom"><i class="icon-home2 mr-2"></i> Home</a>
                        <div class="breadcrumb-item dropdown no-arrow p-0">
                            <a href="#" class="breadcrumb-item dropdown-toggle" data-toggle="dropdown">
                                Data
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item active"><i class="icon-book"></i> Data Sub Unit</a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= site_url('member/pegawai'); ?>" class="dropdown-item"><i class="icon-users4"></i> Data Pegawai</a>
                            </div>
                        </div>
                        <span class="breadcrumb-item active">Data Sub Unit</span>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumbs -->
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Table - Sub Unit -->
        <table class="table table-hover nowrap compact" id="Table" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Sub Unit</th>
                    <th>Pegawai</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  $no=1;
                foreach ($sub_unit as $sub) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $sub->sub_unit; ?></td>
                    <td><?= $sub->jenis; ?> Pegawai</td>
                    <td class="text-center">
                        <a href="<?= site_url('member/sub_unit/detail/'); ?><?= $sub->id_jenis; ?>"
                        class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Detail Pegawai" 
                        data-placement="bottom">Detail <i class="icon-users4"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <!-- /content area -->


    