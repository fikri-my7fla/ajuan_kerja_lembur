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

<!-- UBAH DATA AJUAN DI HALAMAN DETAIL AJUAN LEMBUR -->
<script type="text/javascript">
	$(document).ready(function () {
		$('.bootstrap-select').selectpicker();

		$('.ubah-record').on('click', function () {
			var id_form_ajuan = $(this).data('id_form_ajuan');
			var tanggal = $(this).data('tanggal');
			$(".strings").val('');
			$('#ubahModal').modal('show');
			$('[name="edit_id"]').val(id_form_ajuan);

			$.ajax({
				url: "<?php echo site_url('member/form/getpegawai_by_form'); ?>",
				method: "POST",
				data: {
					id_form_ajuan: id_form_ajuan
				},
				cache: false,
				success: function (data) {
					var item = data;
					var val1 = item.replace("[", "");
					var val2 = val1.replace("]", "");
					var values = val2;
					$.each(values.split(","), function (i, e) {
						$(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
						$(".strings").selectpicker('refresh');
					});
				}
			});
			return false;
		});
	});

</script>


<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature-pad.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery/sign/js/signature_pad.umd.js');?>">
</script>
<!-- ttd absen   -->
<script>
	$(document).ready(function () {
		$("#signabsen").on("click", function () {
			var absen_id = $(this).data('absen_id');
			var form_id = $(this).data('form_id');
			$('#sign-modal').modal('show');
			$('#absen_id').val(absen_id);
			$('#form_honor').val(form_id);
		});
	});
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
	var saveButton = wrapper.querySelector("[data-action=save]");
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
	saveButton.addEventListener("click", function (event) {
		if (signaturePad.isEmpty()) {
			$('#sign-modal').modal('show');
		} else {
			var url = "<?php echo base_url();?>member/absen/tambah";
			$('#sign-modal').modal('hide');
      
			$.ajax({
				type: 'POST',
				url: url,
				data: {
					'id_sign': $('#id_sign').val(),
					'sign': signaturePad.toDataURL('image/svg+xml'),
					'nip_pgw': $('#nip_pgw').val(),
					'absen_id': $('#absen_id').val(),
					'form_honor': $('#form_honor').val(),
					'jenis_honor': $('#jenis_honor').val()
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
