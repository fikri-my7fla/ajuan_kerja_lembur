<div class="container-fluid mt-4">
    <div class="text-center">
        <h1 class="my-3"><b>Tambah Ajuan Lembur</b></h1>
    </div>
    
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
                <select name="jenis_id" id="sub_unit" class="bootstrap-select form-control mb-4" 
                data-live-search="true" required>
                    <option value=""></option>
                <?php foreach
                    ($sub_unit as $row) : ?>
                        <option value="<?= $row->id_jenis; ?>"><?= $row->sub_unit; ?></option>
                <?php endforeach; ?>
                    </select>
                    
                <label><b>Pegawai:</b></label>
                <select name="pegawai[]" id="pegawai" class="bootstrap-select form-control" name="" data-live-search="true" 
                multiple required>
                    <?php foreach($pegawai as $pgw) : ?>
                        <option value="<?= $pgw->id_data_pegawai?>"><?= $pgw->nama_pegawai; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <a class="btn btn-outline-primary mt-3 ml-3" href="<?= base_url('member/form') ?>">
            Kembali <i class="fas fa-fw fa-reply"></i></a>
            <button type="submit" class="btn btn-primary mt-3 ml-auto mr-3">
            Tambah <i class="fas fa-fw fa-feather-alt"></i></button>
        </div>
    </form>
</div>