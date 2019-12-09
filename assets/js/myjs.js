const flashData = $('.flash_data').data('flashdata');
if (flashData) {
	swal.fire({
		title: 'Berhasil',
		text: flashData,
		type: 'success'
	})
}
const flasherror = $('.flash_error').data('flasherr');
if (flasherror) {
	swal.fire({
		title: 'Ditolak',
		text: flasherror,
		type: 'error'
	})
}

const flashrevs = $('.flash_revs').data('flashrev');
if (flashrevs) {
	swal.fire({
		title: 'Direvisi',
		text: flashrevs,
		type: 'info'
	})
}

function archiveFunction() {
	event.preventDefault(); // prevent form submit
	var form = event.target.form; // storing the form
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success ml-2',
			cancelButton: 'btn btn-danger mr-2'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, cancel!',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			form.submit();
		} else if (
			result.dismiss === Swal.DismissReason.cancel
		) {
			swalWithBootstrapButtons.fire(
				'Cancelled',
				'Your imaginary file is safe :)',
				'error'
			)
		}
	});
}
$("#logout").on("click", function () {
	swal.fire({
		title: 'Log out?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'OK',
		closeOnConfirm: true,
		closeOnCancel: true
	}).then((result) => {
		if (result.value === true) {
			swal.fire("berhasil", "logout nya sukses cie", "success")
			$('#logoutform').submit() // this submits the form 
		} else {
			swal.fire("Gk jadi", "log out nya gk jadi", "error")
		}
	})
})
