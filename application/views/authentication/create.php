<!DOCTYPE Html>
<html lang="en">

<head>
	<?php $this->load->view('authentication/_partials/head.php') ?>
	<link rel="stylesheet" href="<?= base_url('assets/bs-select/semantic.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/bs-select/dropdown.min.css')?>">
	<style>
		.dropdown-item.active,
		.dropdown-item:active {
			color: #fff;
			text-decoration: none;
			background-color: #AEB6BF !important;
		}

	</style>
	<title>Tambah Data</title>
</head>

<body>
	<div id="main-wrapper">
		<div class="container">

			<div class="card">
				<div class="card-body">
					<form action="<?php echo site_url('authentication/direct_form/create');?>" id="formDirect"
						method="post">
						<h2 class="card-title">Form Ajuan Lembur</h2>

						<div class="row">
							<div class="col">
								<br>
								<div class="form-group">
									<label for="">Tanggal #</label>
									<input class="form-control bg-light" type="date" name="tanggal" id="tanggal"
										required>
								</div>
								<div class="form-group">
									<label for="">Unit Kerja #</label>
									<input class="form-control bg-light" type="text" name="unit_kerja" id="unit_kerja"
										placeholder="Masukkan Unit Kerja" required>
								</div>
								<div class="form-group">
									<label for="">Sub Unit #</label>
									<select class="sub_unit show-tick" data-live-search="true" data-width="100%"
										data-width="100%" name="jenis_id" id="jenis_id" title="Pilih Jenis Pekerjaan"
										required>
										<?php foreach ($subunit->result() as $sub) { ?>
										<option value="<?= $sub->id_jenis;?>"><?= $sub->sub_unit ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="">Hasil #</label>
									<input class="form-control bg-light" type="text" name="hasil" id="hasil"
										placeholder="Masukkan Hasil Pekerjaan" required>
								</div>
								<div class="form-group">
									<label for="">Alasan #</label>
									<textarea class="form-control bg-light" type="" name="alasan" id="alasan"
										placeholder="Masukkan Alasan Lembur" required></textarea>
								</div>
							</div>
							<div class="col">
								<br>
								<div class="form-group">
									<label for="">Pengusul</label>
									<select class="pengusul" name="pengusul" id="pengusul" data-width="100%"
										data-live-search="true" title="Pilih Pengusul" required>
										<?php foreach ($pegawai->result() as $row) { ?>
										<option value="<?=$row->nama_pegawai?>"><?=$row->nama_pegawai?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="">Pegawai yang akan Lembur #</label>
									<select name="pegawai[]" id="pegawai" class="ui fluid search dropdown pegawai"
										multiple="" required>
										<?php foreach ($pegawai->result() as $row) :?>
										<option value="<?php echo $row->nip?>">
											<?php echo $row->nama_pegawai;?>
										</option>
										<?php endforeach;?>
									</select>
									<!-- data-subtext="<?= $row->sub_unit ?>" -->
									<!-- <i class="form-control div_tex"></i> -->
									<!-- <div class="div_tex">
                                </div> -->
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<a href="<?= base_url('authentication/auth/login'); ?>" class="btn btn-secondary">
										<i class="mdi mdi-arrow-left"></i>
										Back
									</a>
									<button class="btn btn-success review_form" type="button" type="#">View</button>

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="ui mini modal" id="test">
		<i class="close icon"></i>
		<div class="header">
			Apakah data ini Sudah Valid?
		</div>
		<div class="content">
			<div>
				<div>
					<label for="">Tanggal :</label>
					<code class="text-dark tanggal_view"></code>
				</div>
				<div>
					<label for="">Unit Kerja :</label>
					<u class="unit_kerja_view"></u>
				</div>
				<div>
					<label for="">Sub Unit :</label>
					<u class="sub_unit_view"></u>
				</div>
				<div>
					<label for="">Hasil Pekerjaan :</label>
					<div>
						<i class="form-control hasil_view float-right"></i>
					</div>
				</div>
				<div>
					<label for="">Alasan Lembur :</label>
					<div class="card card-body bg-light">
						<i class="alasan_view"></i>
					</div>
				</div>
				<div>
					<label for="">Pengusul :</label>
					<u class="pengusul_view"></u>
				</div>
				<div>
					<label for="">Nama Pegawai :</label>
					<div>
						<i class="form-control pegawai_view"></i>

					</div>
				</div>
			</div>
		</div>
		<div class="actions">
			<div class="ui blue button" name="submit" id="submit_modal" value="Send"></div>
		</div>
	</div>
	<?php $this->load->view('authentication/_partials/js.php'); ?>
	<script src="<?= base_url('assets/bs-select/semantic.min.js')?>"></script>
	<script src="<?= base_url('assets/bs-select/dropdown.min.js')?>"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.sub_unit').selectpicker();
			$('.pengusul').selectpicker();
			$('.pegawai').dropdown();
		});

	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			//GET UPDATE
			$('.review_form').on('click', function () {
				var tanggal = $('#tanggal').val();
				var unit_kerja = $('#unit_kerja').val();
				var sub_unit = $('#jenis_id').val();
				var hasil = $('#hasil').val();
				var alasan = $('#alasan').val();
				var pengusul = $('#pengusul').val();
				var pegawai = $('#pegawai').val();
				var selectedText = $("#jenis_id option:selected").html();
				$('.pegawai').change(function () {
						var str = [""];
						$(".pegawai option:selected").each(function (i) {
							str += $(this).text() + " ";
							$('#opt' + (i + 1)).val($(this).text());
						});
						$('.pegawai_view').text(str);
					})
					.trigger("change");
				$('#test').modal('show');
				$('.bs-select').selectpicker();
				$('.tanggal_view').text(tanggal);
				$('.unit_kerja_view').text(unit_kerja);
				$('.sub_unit_view').text(selectedText);
				$('.hasil_view').text(hasil);
				$('.alasan_view').text(alasan);
				$('.pengusul_view').text(pengusul);
				$('#submit_modal').on('click', function () {
					$('#formDirect').submit();
				});
				$(".test").modal({
					closable: true
				});

			});
		});

	</script>
</body>

</html>
