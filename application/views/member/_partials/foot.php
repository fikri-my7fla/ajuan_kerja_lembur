<!-- Footer -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
    <footer class="sticky-footer">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website <?= date('Y'); ?></span>
              </div>
            </div>
          </footer>

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Modal Edit Di Halaman Daftar Ajuan -->
<form action="<?= site_url('member/form/update'); ?>" method="POST">
    <div class="modal zoomIn animated" id="updateModal">
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-capitalize" id="exampleModalLabel">
            <b><?= $this->session->userdata('username'); ?>,</b> Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika anda keluar, maka anda harus login kembali nanti</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
          Cancel <i class="fas fa-times-circle"></i></button>
          <a class="btn btn-dark" href="<?php echo site_url('authentication/auth/logout'); ?>">
          Logout <i class="fas fa-fw fa-sign-out-alt"></i></a>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url()?>assets/jquery/jquery-3.4.1.js"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <script src="<?= base_url('assets/members/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/members/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/members/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/members/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="< ?= base_url('assets/members/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="< ?= base_url('assets/members/'); ?>js/demo/chart-pie-demo.js"></script> -->

  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/members/'); ?>js/bootstrap-select.js"></script>
  <script src="<?= base_url('assets/members/'); ?>js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('assets/members/'); ?>js/myscript.js"></script>

  <script src="<?= base_url('assets/members/'); ?>js/numeric-1.2.6.min.js"></script> 
		<script src="<?= base_url('assets/members/'); ?>js/bezier.js"></script>
		<script src="<?= base_url('assets/members/'); ?>js/jquery.signaturepad.js"></script> 
		
		<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
		<script src="<?= base_url('assets/members/'); ?>js/json2.min.js"></script>
  
  <!-- UNTUK MENAMPILKAN PRELOADER -->
  <script>
   (function( $ ) {   
     $(window).on('load', function(){
      $('#preloader').fadeOut('slow',function(){
             $(this).hide();
         });
     });

    })(jQuery);
  </script>

  <!-- UNTUK MEMANGGIL DATATABLE -->
  <script type="text/javascript">
  $(document).ready(function() {
      $('#tabelpegawai').DataTable();
      $('.form').DataTable();
  });
  </script>

  <!-- UBAH DATA AJUAN DI HALAMAN DAFTAR AJUAN -->
  <script type="text/javascript">
  $(document).ready(function() {
    $('.bootstrap-select').selectpicker();

    $('.update-record').on('click', function(){
      var id_form_ajuan = $(this).data('id_form_ajuan');
      $(".strings").val('');
      $('#updateModal').modal('show');
      $('[name="edit_id"]').val(id_form_ajuan);

      $.ajax({
        url: "<?php echo site_url('member/form/getpegawai_by_form'); ?>",
        method: "POST",
        data : {id_form_ajuan:id_form_ajuan},
        cache:false,
        success : function(data){
          var item=data;
          var val1=item.replace("[","");
          var val2=val1.replace("]","");
          var values=val2;
          $.each(values.split(","), function(i, e) {
            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
            $(".strings").selectpicker('refresh');
          });
        }
      });
      return false;
    });
  });
  </script>

  <!-- UBAH DATA AJUAN DI HALAMAN DETAIL -->
  <script type="text/javascript">
  $(document).ready(function() {
    $('.bootstrap-select').selectpicker();

    $('.ubah-record').on('click', function(){
      var id_form_ajuan = $(this).data('id_form_ajuan');
      $(".strings").val('');
      $('#ubahModal').modal('show');
      $('[name="edit_id"]').val(id_form_ajuan);

      $.ajax({
        url: "<?php echo site_url('member/form/getpegawai_by_form'); ?>",
        method: "POST",
        data : {id_form_ajuan:id_form_ajuan},
        cache:false,
        success : function(data){
          var item=data;
          var val1=item.replace("[","");
          var val2=val1.replace("]","");
          var values=val2;
          $.each(values.split(","), function(i, e) {
            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
            $(".strings").selectpicker('refresh');
          });
        }
      });
      return false;
    });
  });
  </script>

<script>
  $(document).ready(function() {
    $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90}).jSignature({'UndoButton':true});
  });
  
  $("#btnSaveSign").click(function(e){
    html2canvas([document.getElementById('sign-pad')], {
      onrendered: function (canvas) {
        var canvas_img_data = canvas.toDataURL('image/png');
        var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
        //ajax call to save image inside folder
        $.ajax({
          url: 'save_sign.php',
          data: { img_data:img_data },
          type: 'post',
          dataType: 'json',
          success: function (response) {
              window.location.reload();
          }
        });
      }
    });
  });
</script> 

</body>

</html>