$(document).ready(function () {
	tampil_data_jenis(); //pemanggilan fungsi tampil barang.

	$('#mydata').dataTable();

	//fungsi tampil
	function tampil_data_jenis() {
		$.ajax({
			type: 'GET',
			url: site_url + 'admin/subunit/data_jenis',
			async: true,
			dataType: 'json',
			success: function (data) {
				var html = '';
				var i;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td>' + data[i].sub_unit + '</td>' +
						'<td style="text-align:right;">' +
						'<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].id_jenis + '">Edit</a>' + ' ' +
						'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].id_jenis + '">Hapus</a>' +
						'</td>' +
						'</tr>';
				}
				$('#show_data').html(html);
			}

		});
	}

	//GET UPDATE
	$('#show_data').on('click', '.item_edit', function () {
		var id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: site_url+'admin/subunit/get_jenis',
			dataType: "JSON",
			data: {
				id: id
			},
			success: function (data) {
				$.each(data, function (id_jenis, sub_unit) {
					$('#ModalaEdit').modal('show');
					$('[name="id_jenis_edit"]').val(data.id_jenis);
					$('[name="sub_unit_edit"]').val(data.sub_unit);
				});
			}
		});
		return false;
	});


	//GET HAPUS
	$('#show_data').on('click', '.item_hapus', function () {
		var id_jenis = $(this).attr('data');
		$('#ModalHapus').modal('show');
		$('[name="id_jenis_hapus"]').val(id_jenis);
	});

	//Simpan
	$('#btn_simpan').on('click', function () {
		var id_jenis = $('#unit_sub').val();
		$.ajax({
			type: "POST",
			url: site_url+'admin/sub_unit/simpan_jenis',
			dataType: "JSON",
			data: {
				id_jenis:id_jenis,
				sub_unit:sub_unit
			},
			success: function (data) {
				$('[name="id_jenis_tambah"]').val("");
				$('[name="sub_unit_tambah"]').val("");
				$('#ModalaAdd').modal('hide');
				tampil_data_jenis();
			}
		});
		return false;
	});

	//Update
	$('#btn_update').on('click', function () {
		var sub_unit = $('#sub_unit2').val();
		$.ajax({
			type: "POST",
			url: site_url+'admin/subunit/update_jenis',
			dataType: "JSON",
			data: {
				sub_unit: sub_unit
			},
			success: function (data) {
				$('[name="sub_unit_edit"]').val("");
				$('#ModalaEdit').modal('hide');
				tampil_data_jenis();
			}
		});
		return false;
	});

	//Hapus
	$('#btn_hapus').on('click', function () {
		var id_jenis_hapus = $('#textid_jenis').val();
		$.ajax({
			type: "POST",
			url: site_url+'admin/subunit/hapus_jenis',
			dataType: "JSON",
			data: {
				id_jenis_hapus: id_jenis_hapus
			},
			success: function (data) {
				$('#ModalHapus').modal('hide');
				tampil_data_jenis();
			}
		});
		return false;
	});

});
