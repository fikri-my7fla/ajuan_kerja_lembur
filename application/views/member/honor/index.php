<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><a class="text-dark" href="<?= site_url('member/member'); ?>" data-toggle="tooltip"
            title="Dashboard"><i class="icon-arrow-left52 mr-2"></i></a> 
            <span class="font-weight-semibold">Daftar</span> - Honor</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none">
        </div>

        <!-- Breadcrumbs -->
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb ml-auto">
                    <a href="<?= site_url('member/member'); ?>" class="breadcrumb-item mr-2" data-toggle="tooltip"
                    title="Dashboard" data-placement="bottom"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Daftar Honor</span>
                </div>
            </div>
        </div>
        <!-- /Breadcrumbs -->
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <table class="table-hover" id="Table" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Sub Unit</th>
                <th>Jumlah Honor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1;
        foreach($honor as $hnr) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $hnr->nama_pegawai; ?></td>
                <td><?= $hnr->sub_unit; ?></td>
                <td><?= $hnr->tarif_jumlah; ?></td>
                <td></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
<!-- /content area -->


