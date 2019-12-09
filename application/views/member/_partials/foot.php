<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text mx-auto">
						&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</span>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
  <!-- /page content -->

  <script src="<?= base_url('assets/jquery/jquery-3.4.1.js');?>"></script>
  <script src="<?= base_url('assets/members/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/members/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script src="<?= base_url('assets/members/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  
  <script src="<?= base_url('assets/members/'); ?>swal2/sweetalert2.all.min.js"></script>


  <!-- Core JS files -->

  <!-- /core JS files -->

	<!-- Theme JS files -->

	<script src="<?= base_url('assets/members/source/'); ?>assets/js/app.js"></script>
  
  <script src="<?= base_url('assets/members/'); ?>global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
  
  <script src="<?= base_url('assets/members/'); ?>global_assets/js/demo_pages/form_multiselect.js"></script>


  <script src="<?= base_url('assets/members/'); ?>global_assets/js/plugins/forms/selects/select2.min.js"></script>

  <script src="<?= base_url('assets/members/'); ?>global_assets/js/plugins/forms/styling/uniform.min.js"></script>
  <!-- /theme JS files -->
  
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/members/') ?>js/dataTables.bootstrap4.min.js"></script>

  <script src="<?= base_url('assets/members/') ?>js/datatables-demo.js"></script>
  
  <script src="<?= base_url('assets/members/'); ?>js/bootstrap-select.js"></script>
  <script src="<?= base_url('assets/members/'); ?>js/myscript.js"></script>
  
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

  <!-- Untuk Membuat Tooltip -->
  <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>

  <script>
    $(document).ready(function() {
    var table = $('#Table').DataTable( {
        // rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        responsive: true
    } );
} );
  </script>

  <!-- UBAH DATA AJUAN DI HALAMAN DETAIL AJUAN LEMBUR -->
  <script type="text/javascript">
  $(document).ready(function() {
    $('.bootstrap-select').selectpicker();

    $('.ubah-record').on('click', function(){
      var id_form_ajuan = $(this).data('id_form_ajuan');
      var tanggal = $(this).data('tanggal');
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

</body>
</html>
