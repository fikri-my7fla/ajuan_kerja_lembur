<div class="container-fluid">
<center>
<div class="table-responsive">
        <h1 class="mt-3"><b>Data Pegawai</b></h1>
        <br/>
        <table class="table table-hover" id="tabelpegawai" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nip</th>
                    <th>Nama pegawai</th>
                    <th>Sub Unit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($unit as $row) { ?>
                <tr>
                    <td>
                        <?= $row->id_data_pegawai;?>
                    </td>
                    <td>
                        <?= $row->nip; ?>
                    </td>
                    <td>
                        <?= $row->nama_pegawai; ?>
                    </td>
                    <td>
                        <?= $row->sub_unit; ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</center>
</div>