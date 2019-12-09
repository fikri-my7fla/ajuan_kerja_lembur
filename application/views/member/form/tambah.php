<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><a class="text-dark" href="<?= site_url('member/form'); ?>" data-toggle="tooltip" title="Ajuan Lembur"><i class="icon-arrow-left52 mr-2"></i></a> 
                <span class="font-weight-semibold">
                Tambah</span> - Ajuan Lembur</h4>
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
                                <a class="dropdown-item active"><i class="icon-quill4"></i> Tambah Ajuan Lembur</a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= site_url('member/form'); ?>" class="dropdown-item"><i class="icon-list2"></i> Daftar Ajuan Lembur</a>
                            </div>
                        </div>
                        <span class="breadcrumb-item active">Tambah Ajuan Lembur</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Form Tambah Ajuan Lembur -->
    <form action="<?= site_url('member/form/create'); ?>" method="POST">
        <div class="row">
            <div class="col-lg-6">
                <label><b>Tanggal:</b></label>
                <input type="date" class="form-control mb-3" name="tanggal" id="tanggal" required
                oninvalid="this.setCustomValidity('Please Input the Date')" oninput="setCustomValidity('')">

                <label><b>Unit Kerja:</b></label>
                <input type="text" class="form-control mb-3" name="unit_kerja" id="unit_kerja" 
                placeholder="Masukkan Unit Kerja.." required
                oninvalid="this.setCustomValidity('Please Input Field Unit Kerja')" oninput="setCustomValidity('')"
                autocomplete="off">
                
                <label><b>Hasil:</b></label>
                <input type="text" class="form-control mb-3" name="hasil" id="hasil" 
                placeholder="Masukkan Hasil.." required
                oninvalid="this.setCustomValidity('Please Input Field Hasil')" oninput="setCustomValidity('')"
                autocomplete="off">

                <label><b>Alasan:</b></label>
                <input type="text" class="form-control mb-3" name="alasan" id="alasan" 
                placeholder="Masukkan Alasan.." required
                oninvalid="this.setCustomValidity('Please Input Field Alasan')" oninput="setCustomValidity('')"
                autocomplete="off">
            </div>
            <div class="col-lg-6">
                <label><b>Sub Unit:</b></label>
                <select name="jenis_id" id="sub_unit" class="bootstrap-select form-control mb-3" 
                data-live-search="true" required>
                    <option value=""></option>
                <?php foreach
                    ($sub_unit as $row) : ?>
                        <option value="<?= $row->id_jenis; ?>"><?= $row->sub_unit; ?></option>
                <?php endforeach; ?>
                    </select>
                    
                <label><b>Pegawai:</b></label>
                <select name="pegawai[]" id="pegawai" class="bootstrap-select form-control mb-3" data-live-search="true" 
                multiple required>
                    <?php foreach($pegawai as $pgw) : ?>
                        <option value="<?= $pgw->nip; ?>"><?= $pgw->nama_pegawai; ?></option>
                    <?php endforeach; ?>
                </select>

                <?php foreach($pengusul as $usul) { ?>
                <label for="pengusul"><b>Pengusul:</b></label>
                <input type="text" readonly="readonly" class="form-control" name="pengusul" id="pengusul"
                value="<?= $usul->nama_pegawai; ?>">
                <?php } ?>

            </div>
            <button type="submit" class="btn btn-dark mt-3 ml-auto mr-3">
            Tambah <i class="icon-quill4"></i></button>
        </div>
    </form>

    </div>
    <!-- /content area -->


    