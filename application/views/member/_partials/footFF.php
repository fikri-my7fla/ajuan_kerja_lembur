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
			&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov"
				target="_blank">Eugene Kopyov</a>
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

<script src="<?= base_url('assets/members/'); ?>global_assets/js/plugins/forms/selects/bootstrap_multiselect.js">
</script>

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
	(function ($) {
		$(window).on('load', function () {
			$('#preloader').fadeOut('slow', function () {
				$(this).hide();
			});
		});

	})(jQuery);

</script>

<!-- Untuk Membuat Tooltip -->
<script>
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});

</script>

<script>
	$(document).ready(function () {
		var table = $('#Table').DataTable({
			// rowReorder: {
			//     selector: 'td:nth-child(2)'
			// },
			responsive: true
		});
	});

</script>

<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature-pad.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature_pad.umd.js');?>">
</script>
<!-- ttd absen   -->
<script>
	$("#signhonor").on("click", function () {
		var id_honor = $(this).data('id_honor');
		$('#sign-honor').modal('show');
		$('#honor_id').val(id_honor);
	});

</script>
<script>
	var wrapper = document.getElementById("signature-pad");
	var clearButton = wrapper.querySelector("[data-action=clear]");
	var undoButton = wrapper.querySelector("[data-action=undo]");
	var simpanButton = wrapper.querySelector("[data-action=simpan]");
	var signaturePad;
	var canvas = wrapper.querySelector("canvas");
	var signaturePad = new SignaturePad(canvas);

	function resizeCanvas() {
		var ratio = window.devicePixelRatio || 1;
		canvas.width = canvas.offsetWidth * ratio;
		canvas.height = canvas.offsetHeight * ratio;
		canvas.getContext("2d").scale(ratio, ratio);
		signaturePad.clear();
	}
	clearButton.addEventListener("click", function (event) {
		signaturePad.clear();
	});

	undoButton.addEventListener("click", function (event) {
		var data = signaturePad.toData();

		if (data) {
			data.pop(); // remove the last dot or line
			signaturePad.fromData(data);
		}
	});
  simpanButton.addEventListener("click", function (event) {
    if (signaturePad.isEmpty()) {
      $('sign-honor').modal('show');
    } else {
      var url = "<?php echo base_url();?>member/honor/tambah";
      $('sign-honor').modal('hide');

      $.ajax({
        type: 'POST',
        url: url,
        data: {
          'id_sign': $('#id_sign').val(),
          'sign': signaturePad.toDataURL('image/svg+xml'),
          'nip_pgw': $('#nip_pgw').val(),
          'honor_id': $('#honor_id').val(),
        },

        // dataType: 'JSON',
        success: function (data) {
          document.getElementById("signature-pad").submit();
          $('#previewsign').html(data);
        }
      });
      signaturePad.clear();
    }
  });

</script>
</body>

</html>
