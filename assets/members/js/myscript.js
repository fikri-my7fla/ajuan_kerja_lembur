//SweetAlert Notification on CRUD Ajuan lembur
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: 'Berhasil!',
        text: 'Data ajuan lembur berhasil ' + flashData,
        icon: 'success'
    });
}

//SweetAlert Logout
$('.tombol-logout').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Anda harus login kembali nanti!",
        icon: '',
        position: 'center',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Logout!',
        cancelButtonText: 'Batal!',
        focusConfirm: false,
        focusCancel: true,
      }).then((result) => {
        if (result.value) {
            
            Swal.fire({
                title: 'Berhasil Logout! ',
                text: 'Silahkan login kembali...',
                icon: 'success',
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
              icon: 'error',
              showConfirmButton: false,
              timer:2000
            });
          }
      });

});

//----------------------------------------
// Breadcrumbs
//----------------------------------------


$('.breadcrumbs li a').each(function(){

    var breadWidth = $(this).width();

    if($(this).parent('li').hasClass('active') || $(this).parent('li').hasClass('first')){

    

    } else {

        $(this).css('width', 70 + 'px');

        $(this).mouseover(function(){
            $(this).css('width', 97 + 'px');
        });

        $(this).mouseout(function(){
            $(this).css('width', 70 + 'px');
        });
    }

        
});