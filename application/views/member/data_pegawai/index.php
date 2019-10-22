<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<div class="container my-3">
    <center>
        <h2>Data Pegawai</h2>
        <table id="tabelpegawai" >
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
                        <?= $no++;?>
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
    </center>
</div>

<script>
$(document).ready(function() {
    $('#tabelpegawai').DataTable();
} );
</script>