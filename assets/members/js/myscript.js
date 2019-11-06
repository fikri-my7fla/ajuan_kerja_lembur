//SweetAlert Notification on CRUD Ajuan lembur
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: 'Berhasil!',
        text: 'Data ajuan lembur berhasil ' + flashData,
        type: 'success'
    });
}

//Logout
$('.tombol-logout').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda harus login kembali nanti!",
        type: 'warning',
        animation: 'zoomIn animated',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Logout!',
        cancelButtonText: 'Batal!'
      }).then((result) => {
        if (result.value) {
            
            Swal.fire({
                title: 'Berhasil Logout! ',
                text: 'Silahkan login kembali...',
                type: 'success',
                showConfirmButton: false,
                timer: 5000
            });
            document.location.href = href;

        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire({
              title: 'Dibatalkan...',
              text: 'Anda tidak akan logout :)',
              type: 'error',
              showConfirmButton: false,
              timer:2000
            })
          }
      })

});